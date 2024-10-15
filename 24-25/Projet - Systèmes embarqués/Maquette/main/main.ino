// Fonctions (disons une API pour avoir les infos des capteurs)
#include "src/func.hpp"

/*------------------------------------------------------*/
//           INITIALISATION DIVERS BROCHES              //
/*------------------------------------------------------*/

constexpr int NUM_LEDS = 5;

#define BUTTON_R 2
#define BUTTON_G 3

#define SD_CS_PIN 4

#define MODE_OFF 1
#define MODE_STANDARD 2
#define MODE_CONFIG 3
#define MODE_MAINT 4
#define MODE_ECO 5

#define interval 5000

byte mode = MODE_OFF;  // Mode par défaut
byte previousMode = 0; // Mode précédent

bool isOn = false;

SdFat SD;      // Carte SD
DS1307 clock;  // Horloge
BME280I2C bme; // Capteur de température

ChainableLED leds(7, 8, NUM_LEDS); // Led RGB

/*----------- Fonctions -------------*/

// Fonction pour changer de mode
void ChangeMode(int newMode, Stream *client)
{
  mode = newMode;

  const __FlashStringHelper *name = F(""); // Utiliser __FlashStringHelper pour indiquer que c'est en mémoire flash

  switch (newMode)
  {
  case MODE_STANDARD:
    name = F("Standard");
    leds.setColorHSB(0, 0.33, 1.0, 0.05); // Vert
    break;
  case MODE_ECO:
    name = F("Economique");
    leds.setColorHSB(0, 0.66, 1.0, 0.05); // Bleu
    break;
  case MODE_MAINT:
    name = F("Maintenance");
    leds.setColorHSB(0, 0.08, 1.0, 0.05); // Orange
    break;
  case MODE_CONFIG:
    name = F("Configuration");
    leds.setColorRGB(0, 15, 14, 0); // Jaune
    break;
  }

  client->print(F("Lancement du mode "));
  client->println(name);
  client->println(F("==========================="));
}

// Fonction pour le déclenchement des modes
void DefineMode()
{
  switch (mode)
  {
  case MODE_STANDARD:
    if (digitalRead(BUTTON_G) == LOW && !isOn)
    {
      unsigned long previousMillis = millis();

      while (!digitalRead(BUTTON_G))
      {
        if (millis() - previousMillis >= interval)
        {
          ChangeMode(MODE_ECO, &Serial);
          isOn = true;
          break;
        }
      }
    }
    else if (digitalRead(BUTTON_R) == LOW && !isOn)
    {
      unsigned long previousMillis = millis();

      while (!digitalRead(BUTTON_R))
      {
        if (millis() - previousMillis >= interval)
        {
          previousMode = MODE_STANDARD;
          ChangeMode(MODE_MAINT, &Serial);
          isOn = true;

          break;
        }
      }
    }
    break;

  case MODE_ECO:
    if (digitalRead(BUTTON_G) == LOW && !isOn)
    {
      unsigned long previousMillis = millis();

      while (!digitalRead(BUTTON_G))
      {
        if (millis() - previousMillis >= interval)
        {
          ChangeMode(MODE_STANDARD, &Serial);
          isOn = true;

          break;
        }
      }
    }
    else if (digitalRead(BUTTON_R) == LOW && !isOn)
    {
      unsigned long previousMillis = millis();

      while (!digitalRead(BUTTON_R))
      {
        if (millis() - previousMillis >= interval)
        {
          previousMode = MODE_ECO;
          ChangeMode(MODE_MAINT, &Serial);
          isOn = true;

          break;
        }
      }
    }
    break;

  case MODE_MAINT:
    if (digitalRead(BUTTON_R) == LOW && !isOn)
    {
      unsigned long previousMillis = millis();

      while (!digitalRead(BUTTON_R))
      {
        if (millis() - previousMillis >= interval)
        {
          ChangeMode(previousMode, &Serial);
          isOn = true;

          break;
        }
      }
    }
  }
  unsigned long previousMillis = 0;

  // Do not forget to reset isOn if the green button isn't pressed anymore
  if (digitalRead(BUTTON_G) && digitalRead(BUTTON_R))
  {
    isOn = false;
  }
}

// Fonction pour les erreurs
void error()
{
  // Erreur de la carte SD
  if (!SD.begin(SD_CS_PIN))
  {
    while (!SD.begin(SD_CS_PIN))
    {
      Serial.println(F("Erreur lors de l'initialisation de la carte SD"));
      leds.setColorHSB(0, 0.0, 1.0, 0.05); // Rouge
      delay(500);
      leds.setColorHSB(0, 0.0, 0.0, 0.05); // Blanc
      delay(1000);
    }
    ChangeMode(mode, &Serial);
  }

  // Erreur du capteur BME280
  if (!bme.begin())
  {
    while (!bme.begin())
    {
      Serial.println(F("Could not find BME280 sensor!"));
      leds.setColorHSB(0, 0.0, 1.0, 0.05); // Rouge
      delay(500);
      leds.setColorHSB(0, 0.33, 1.0, 0.05); // Vert
      delay(500);
    }
    ChangeMode(mode, &Serial);
  }
}

/*----------- Système -------------*/

void setup()
{
  Serial.begin(115200);

  Serial.println(F(" WORLDWIDE WEATHER WATCHER "));
  Serial.println(F("==========================="));

  pinMode(BUTTON_R, INPUT_PULLUP);
  pinMode(BUTTON_G, INPUT_PULLUP);

  unsigned long previousMillis = 0;

  // Mode config
  if (digitalRead(BUTTON_R) == LOW)
  {
    ChangeMode(MODE_CONFIG, &Serial);
    Serial.println(F("Configuration du système"));
    Serial.println(F("==========================="));
  }
  else
  {
    ChangeMode(MODE_STANDARD, &Serial);
  }

  /*------------------------------------------------------*/
  //           INITIALISATION DIVERS CAPTEURS             //
  /*------------------------------------------------------*/

  // Vérification BME280
  while (!Serial)
  {
  } // Wait

  Wire.begin();

  switch (bme.chipModel())
  {
  case BME280::ChipModel_BME280:
    Serial.println(F("Found BME280 sensor! Success."));
    break;
  case BME280::ChipModel_BMP280:
    Serial.println(F("Found BMP280 sensor! No Humidity available."));
    break;
  default:
    Serial.println(F("Found UNKNOWN sensor! Error!"));
  }

  // DEBUT SETUP CLOCK
  clock.begin();
  clock.fillByYMD(2024, 10, 9); // Jan 19,2013
  clock.fillByHMS(9, 28, 30);   // 15:28 30"
  clock.fillDayOfWeek(WED);     // Saturday
  clock.setTime();              // write time to the RTC chip
}

void loop()
{
  // if (1 == 2) // test ram
  // {
  //   printBME280Data(&Serial);
  // }
  error();
  DefineMode();

  if (mode == MODE_CONFIG)
  {
    configuration(&Serial);
  }
}