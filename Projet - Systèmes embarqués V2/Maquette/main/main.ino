#include "src/func.hpp"

constexpr int NUM_LEDS = 5;

// Pin des boutons rouge (R) et vert (G)
#define BUTTON_R 2
#define BUTTON_G 3

// Pin de la carte SD
#define SD_CS_PIN 4

// Identifiant des différents modes
#define MODE_OFF 1
#define MODE_STANDARD 2
#define MODE_CONFIG 3 // Comme expliqué, le mode CONFIG est dans un programme à part
#define MODE_MAINT 4
#define MODE_ECO 5

// MODE "CONFIG"
// LOG_INTERVALL --> Temps d'attente entre 2 relevés de mesure (défaut : 10 minutes) * 1000 pour avoir en s * 60 pour avoir en minutes
#define LOG_INTERVALL 600000 // 1 *1000*60

// Voir func.cpp pour le reste des paramètres
// FIN MODE CONFIG

// Temps qu'on doit appuyer sur un bouton pour changer de mode
#define interval 5000

byte mode = MODE_OFF;       // Mode par défaut
byte previousMode = 0;      // Mode précédent
volatile bool isOn = false; // Variable indiquant si l'on doit relacher un bouton

// Variables gérant les interruptions
volatile bool interruptFlagG = false;
volatile bool interruptFlagR = false;

// Instance permettant de gérer la LED
ChainableLED leds(7, 8, NUM_LEDS);

// Variables pour les capteurs BME280, Carte SD et horloge
BME280I2C bme;  // Capteur de température
SdFat SD;       // Carte SD
RTC_DS1307 rtc; // Horloge

// Instances/variables GPS
volatile bool GpsValue = false;
float latitude, longitude;
SoftwareSerial gps(3, 4);
TinyGPS GPS;

/*----------- SYSTEME -------------*/

void setup()
{
    // Démarre connexion série pour le GPS / Moniteur série
    gps.begin(9600);
    Serial.begin(115200);

    // Définition des pins des boutons
    pinMode(BUTTON_R, INPUT);
    pinMode(BUTTON_G, INPUT);

    // Ajout des interruptions lors d'un appui sur un des deux boutons
    attachInterrupt(digitalPinToInterrupt(BUTTON_G), interruptBtnG, FALLING);
    attachInterrupt(digitalPinToInterrupt(BUTTON_R), interruptBtnR, FALLING);
    // "Simulation" du mode config, même s'il n'est pas pris en charge dans ce programme
    if (digitalRead(BUTTON_R) == LOW)
    {
        ChangeMode(MODE_CONFIG, &Serial);
    }
    else
    {
        ChangeMode(MODE_STANDARD, &Serial);
    }
    // Attend une connexion du port série (horloge RTC). Voir doc RTCLib
    // (cf: https://github.com/adafruit/RTClib/blob/master/examples/ds1307/ds1307.ino#L11)
#ifndef ESP8266
    while (!Serial)
        ; // wait for serial port to connect. Needed for native USB
#endif
    // Initialisation du capteur BME280
    Wire.begin();
    bme.begin();

    // Initialisation de la carte SD
    SD.begin(SD_CS_PIN);

    // Initialisation de l'horloge
    rtc.begin();
    if (!rtc.isrunning()) // Enlever le "!" si vous vouler réinitialisér l'horloge a la prochaine compilation
    {
        // Cette ligne permet de définir l'heure et la date de l'horloge en fonction
        // de la date et l'heure de compilation (modifiable via le mode config)
        rtc.adjust(DateTime(F(__DATE__), F(__TIME__)));
    }

    uint32_t freeClusters = SD.vol()->freeClusterCount();
    uint32_t freeSpace = freeClusters * SD.vol()->sectorsPerCluster() * 512;
    // Vérification des erreurs
    error();
}

void loop()
{
    // Vérification d'un appui --> changement de mode
    if (interruptFlagG || interruptFlagR)
    {
        if (interruptFlagG)
        {
            checkButtonPress(BUTTON_G, MODE_STANDARD, MODE_ECO);
            interruptFlagG = false;
        }
        if (interruptFlagR)
        {
            checkButtonPress(BUTTON_R, MODE_STANDARD, MODE_MAINT);
            interruptFlagR = false;
        }
    }
    else
    // Chercher des erreurs uniquement APRES le traitement de l'interruption
    {
        error();
        // Vérification erreur bme280
        if (are_bme_data_nan())
        {
            return;
        }
        switch (mode)
        {
        case MODE_STANDARD:
            // Nécessaire pour la variable isOn
            check_release_button_needed();
            // Fonctionnalité mode STANDARD
            readData();
            readGPS();
            saveData(&Serial);
            {
                unsigned long startMillis = millis();
                while (millis() - startMillis < LOG_INTERVALL)
                {
                    if (interruptFlagG)
                    {
                        checkButtonPress(BUTTON_G, MODE_STANDARD, MODE_ECO);
                        interruptFlagG = false;
                    }
                    if (interruptFlagR)
                    {
                        checkButtonPress(BUTTON_R, MODE_STANDARD, MODE_MAINT);
                        interruptFlagR = false;
                    }

                    // Vérification de la carte SD
                    // A des fins d'optimisation, elle doit être vérifiée dans cette boucle
                    // Si LOG_INTERVALL est très petit, la vérification de la carte SD prolonge alors
                    // "artificiellement" le temps d'attente entre deux mesures
                    // (Pendant la vérification, l'appui sur un bouton est ignoré indépendamment du programme)
                    // Pour pallier à ce problème, la vérification de la carte SD n'est pas effectuée
                    // Il suffit d'enlever les commentaires de la ligne suivante pour activer la vérification
                    // checkSdFull(&SD);

                    // Vérification si une donnée n'est pas valide --> nécessite vérification matérielle
                    if (err_capt_bme || err_capt_lum)
                    {
                        unsigned long duree = millis();
                        while (millis() - duree < 1000)
                        { // 1000(ms) --> 1Hz
                            // Toujours vérifier les interrupts
                            if (interruptFlagG)
                            {
                                checkButtonPress(BUTTON_G, MODE_STANDARD, MODE_ECO);
                                interruptFlagG = false;
                            }
                            if (interruptFlagR)
                            {
                                checkButtonPress(BUTTON_R, MODE_STANDARD, MODE_MAINT);
                                interruptFlagR = false;
                            }
                            // Clignotement de leds
                            if (millis() - duree < 333)
                            {
                                leds.setColorHSB(0, 0.0, 1.0, 0.05); // Rouge
                            }
                            else
                            {
                                leds.setColorHSB(0, 0.33, 1.0, 0.05); // Vert
                            }
                        }
                    }
                }
            }
            break;
        case MODE_ECO:
            // Fonctionnalité mode ECO : PAS DE GPS, LOG_INTERVAL = 2*LOG_INTERVAL
            readData();
            saveData(&Serial);
            {
                unsigned long startMillis = millis();
                while (millis() - startMillis < (LOG_INTERVALL * 2))
                {
                    // Nécessaire pour la variable isOn
                    check_release_button_needed();
                    if (interruptFlagR)
                    {
                        checkButtonPress(BUTTON_R, MODE_ECO, previousMode);
                        interruptFlagR = false;
                    }

                    // Vérification de la carte SD
                    // A des fins d'optimisation, elle doit être vérifiée dans cette boucle
                    // Si LOG_INTERVALL est très petit, la vérification de la carte SD prolonge alors
                    // "artificiellement" le temps d'attente entre deux mesures
                    // (Pendant la vérification, l'appui sur un bouton est ignoré indépendamment du programme)
                    // Pour pallier à ce problème, la vérification de la carte SD n'est pas effectuée
                    // Il suffit d'enlever les commentaires de la ligne suivante pour activer la vérification
                    // checkSdFull(&SD);

                    // Vérification si une donnée n'est pas valide --> nécessite vérification matérielle
                    if (err_capt_bme || err_capt_lum)
                    {
                        unsigned long duree = millis();
                        while (millis() - duree < 1000)
                        { // 1000(ms) --> 1Hz
                            // Toujours vérifier les interrupts
                            if (interruptFlagR)
                            {
                                checkButtonPress(BUTTON_R, MODE_ECO, previousMode);
                                interruptFlagR = false;
                            }
                            // Clignotement de leds
                            if (millis() - duree < 333)
                            {
                                leds.setColorHSB(0, 0.0, 1.0, 0.05); // Rouge
                            }
                            else
                            {
                                leds.setColorHSB(0, 0.33, 1.0, 0.05); // Vert
                            }
                        }
                    }
                    else
                    {
                        leds.setColorHSB(0, 0.66, 1.0, 0.05);
                    } // Remettre la led en bleu s'il n'y a pas d'erreur
                }
            }
            break;
        case MODE_MAINT:
            // Fonctionnalité mode MAINTENANCE : PAS DE SAUVEGARDE, AFFICHAGE DES DONNÉES
            readData();
            readGPS();
            displayData(&Serial);
            {
                unsigned long startMillis = millis();
                while (millis() - startMillis < LOG_INTERVALL)
                {
                    // Nécessaire pour la variable isOn
                    check_release_button_needed();
                    if (interruptFlagG)
                    {
                        checkButtonPress(BUTTON_G, MODE_MAINT, MODE_ECO);
                        interruptFlagG = false;
                    }
                    if (interruptFlagR)
                    {
                        checkButtonPress(BUTTON_R, MODE_MAINT, MODE_STANDARD);
                        interruptFlagR = false;
                    }
                    // Vérification si une donnée n'est pas valide --> nécessite vérification matérielle
                    if (err_capt_bme || err_capt_lum)
                    {
                        unsigned long duree = millis();
                        while (millis() - duree < 1000)
                        { // 1000(ms) --> 1Hz
                            // Toujours vérifier les interrupts
                            if (interruptFlagG)
                            {
                                checkButtonPress(BUTTON_G, MODE_MAINT, MODE_ECO);
                                interruptFlagG = false;
                            }
                            if (interruptFlagR)
                            {
                                checkButtonPress(BUTTON_R, MODE_MAINT, MODE_STANDARD);
                                interruptFlagR = false;
                            }
                            // Clignotement de leds
                            if (millis() - duree < 333)
                            {
                                leds.setColorHSB(0, 0.0, 1.0, 0.05); // Rouge
                            }
                            else
                            {
                                leds.setColorHSB(0, 0.33, 1.0, 0.05); // Vert
                            }
                        }
                    }
                    else
                    {
                        leds.setColorHSB(0, 0.08, 1.0, 0.05);
                    } // Remettre la led en orange s'il n'y a pas d'erreur
                }
            }
            break;
        case MODE_CONFIG:
            // Fonctionnalité mode CONFIG :
            // Comme précisé, voir autre programme pour ce mode
            // (On va donc revenir au mode standard)
            checkButtonPress(BUTTON_R, MODE_CONFIG, MODE_STANDARD);
            break;
        default:
            break;
        }
    }
}

/*----------- CHANGEMENT DE MODE -------------*/

void ChangeMode(int newMode, Stream *client)
{
    previousMode = mode;
    mode = newMode;
    switch (newMode)
    {
    case MODE_STANDARD:
        leds.setColorHSB(0, 0.33, 1.0, 0.05); // Vert
        break;
    case MODE_ECO:
        leds.setColorHSB(0, 0.66, 1.0, 0.05); // Bleu
        break;
    case MODE_MAINT:
        leds.setColorHSB(0, 0.08, 1.0, 0.05); // Orange
        break;
    case MODE_CONFIG:
        leds.setColorRGB(0, 15, 14, 0); // Jaune
        break;
    }
}

// Fonction auxiliaire pour vérifier si les boutons sont appuyés
void check_release_button_needed()
{
    // Nécessaire pour la variable isOn
    if (digitalRead(BUTTON_G) && digitalRead(BUTTON_R))
    {
        isOn = false;
    }
}

// Fonction auxiliaire pour vérifier l'état des boutons et changer de mode
bool checkButtonPress(int buttonPin, int currentMode, int targetMode)
{
    if (digitalRead(buttonPin) == LOW && !isOn && mode == currentMode)
    {
        if (waitForInterval(buttonPin))
        {
            ChangeMode(targetMode, &Serial);
        };
        return true;
    }
    return false;
}

// Fonction auxiliaire pour gérer l'attente de l'intervalle
bool waitForInterval(int buttonPin)
{
    unsigned long int previousMillis = millis();
    while (!digitalRead(buttonPin))
    {
        if (millis() - previousMillis >= interval)
        {
            isOn = true;
            return true;
        }
    }
    // Vérifier que l'on s'est pas arreté avant
    if (millis() - previousMillis < interval)
    {
        isOn = false;
        return false;
    }
}

/*----------- ERREURS -------------*/

void error()
{
    // Erreur de la carte SD pleine déjà gérée dans la fonction checkSdFull (func.cpp)

    // Erreur de la carte SD (branché ou non) si l'on est pas en mode maintenance
    if (!SD.begin(SD_CS_PIN) && mode != MODE_MAINT)
    {
        while (!SD.begin(SD_CS_PIN))
        {
            leds.setColorHSB(0, 0.0, 1.0, 0.05); // Rouge
            delay(500);
            leds.setColorHSB(0, 0.0, 0.0, 0.05); // Blanc
            delay(1000);
            // Si on est en mode éco/standard, on veut peut-être passer en mode maintenance, où la carte sd n'est pas utile
            // Nécessaire pour la variable isOn
            check_release_button_needed();
            if (mode == MODE_STANDARD)
            {
                if (interruptFlagR)
                {
                    if (checkButtonPress(BUTTON_R, MODE_STANDARD, MODE_MAINT))
                    {
                        // On peut changer de mode et quitter cette erreur
                        interruptFlagR = false;
                        return;
                    }
                    interruptFlagR = false;
                }
            }
            else if (mode == MODE_ECO)
            {
                if (interruptFlagR)
                {
                    if (checkButtonPress(BUTTON_R, MODE_ECO, previousMode))
                    {
                        interruptFlagR = false;
                        return;
                    }
                    interruptFlagR = false;
                }
            }
        }
        ChangeMode(mode, &Serial);
    }

    // Erreur du capteur BME280 deja géré dans la fonction are_bme_data_nan (func.cpp)

    // Erreur GPS
    if (!gps)
    {
        while (!gps)
        {
            leds.setColorHSB(0, 0.0, 1.0, 0.05); // Rouge
            delay(500);
            leds.setColorHSB(0, 0.0, 0.0, 0.05); // Blanc
            delay(1000);
        }
        ChangeMode(mode, &Serial);
    }

    // Erreur de l'horloge
    if (!rtc.isrunning())
    {
        while (!rtc.isrunning())
        {
            leds.setColorHSB(0, 0.0, 1.0, 0.05); // Rouge
            delay(500);
            leds.setColorHSB(0, 0.66, 1.0, 0.05); // Bleu
            delay(1000);
        }
        ChangeMode(mode, &Serial);
    }
}

/*----------- INTERRUPTS -------------*/

void interruptBtnG()
{
    interruptFlagG = true;
}

void interruptBtnR()
{
    interruptFlagR = true;
}
