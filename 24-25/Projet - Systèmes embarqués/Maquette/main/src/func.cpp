#include "func.hpp"

/*----------- MODE CONFIG -------------*/

// FILE_MAX_SIZE --> Taille maximale (en octets) de chacun des fichiers logs
#define FILE_MAX_SIZE 4096

// LUMIN --> active(1) / désactive(0) la captation de luminosité
#define LUMIN 1

// LUMIN_LOW --> Si luminosité en dessous, alors mettre luminosité en "basse"
#define LUMIN_LOW 255

// LUMIN_HIGH --> Si luminosité au dessus, alors mettre luminosité en "haute"
#define LUMIN_HIGH 768

// TEMP_AIR --> active(1) / désactive(0) la captation de température de l'air
#define TEMP_AIR 1

// MIN_TEMP_AIR --> Si température de l'air en dessous, alors mettre capteur en "erreur"
#define MIN_TEMP_AIR -10

// MAX_TEMP_AIR --> Si température de l'air au dessus, alors mettre capteur en "erreur"
#define MAX_TEMP_AIR 30

// HYGR --> active(1) / désactive(0) la captation d'humidité
#define HYGR 0

// HYGR_MINT --> Si humidité en dessous, alors mettre capteur en "erreur"
#define HYGR_MINT 0

// HYGR_MAXT --> Si humidité au dessus, alors mettre capteur en "erreur"
#define HYGR_MAXT 50

// PRESSURE --> active(1) / désactive(0) la captation de pression
#define PRESSURE 1

// PRESSURE_MIN --> Si pression en dessous, alors mettre capteur en "erreur"
#define PRESSURE_MIN 850

// PRESSURE_MAX --> Si pression au dessus, alors mettre capteur en "erreur"
#define PRESSURE_MAX 1080

/*----------- VARIABLES -------------*/

// Pin du capteur de luminosité
#define LIGHT_PIN 0

// Variables GPS
float flat, flon;

// Captation erreur capteur
bool err_capt_bme = false;
bool err_capt_lum = false;

/*----------- STRUCTURE -------------*/

Sensor sensors[]{
    {'T', "Temperature (°C)", {}},
    {'H', "Hygrometry (%)", {}},
    {'P', "Pressure (HPa)", {}},
    {'L', "Luminosity (Lux)", {}}};

/*----------- CAPTEURS -------------*/

// Lecture des données du capteur BME280
void readData()
{
   float temp(NAN), hum(NAN), pres(NAN);

   BME280::TempUnit tempUnit(BME280::TempUnit_Celsius);
   BME280::PresUnit presUnit(BME280::PresUnit_Pa);

   bme.read(pres, temp, hum, tempUnit, presUnit);

   // Assignation (structure)
   sensors[0].value = temp;          // Temperature
   sensors[1].value = hum;           // Humidité
   sensors[2].value = pres / 100.0F; // Pressure en HPa

   sensors[3].value = analogRead(LIGHT_PIN); // Luminosité

   // Réinitialiser la variable inqiduant une erreur
   err_capt_bme = false;
   err_capt_lum = false;

   // Vérification erreurs capteurs
   // MIN_TEMP_AIR et MAX_TEMP_AIR
   if (TEMP_AIR == 1)
   {
      if (sensors[0].value < MIN_TEMP_AIR || sensors[0].value > MAX_TEMP_AIR)
      {
         sensors[0].value = NAN;
         err_capt_bme = true;
      }
   }
   // HYGR_MINT et HYGR_MAXT
   if (HYGR == 1)
   {
      if (sensors[1].value < HYGR_MINT || sensors[1].value > HYGR_MAXT)
      {
         sensors[1].value = NAN;
         err_capt_bme = true;
      }
   }
   // PRESSURE_MIN et PRESSURE_MAX
   if (PRESSURE == 1)
   {
      if (sensors[2].value < PRESSURE_MIN || sensors[2].value > PRESSURE_MAX)
      {
         sensors[2].value = NAN;
         err_capt_bme = true;
      }
   }
   // LUMIN_MOW et LUMIN_HIGH
   if (LUMIN == 1)
   {
      if (sensors[3].value < LUMIN_LOW || sensors[3].value > LUMIN_HIGH)
      {
         sensors[3].value = NAN;
         err_capt_lum = true;
      }
   }
}

// Lecture des données GPS
void readGPS()
{
   bool newData = false;

   // Lire les données GPS pendant 1 seconde
   for (unsigned long start = millis(); millis() - start < 1000;)
   {
      while (gps.available())
      {
         char c = gps.read();
         if (GPS.encode(c))
         {
            newData = true;
         }
      }
   }

   if (newData)
   {
      unsigned long age;
      GPS.f_get_position(&flat, &flon, &age);
   }
}

// Affichage de la date et des données des capteurs
void displayData(Stream *client)
{
   DateTime now = rtc.now();
   client->print('[');
   client->print(now.year(), DEC);
   client->print('/');
   client->print(now.month(), DEC);
   client->print('/');
   client->print(now.day(), DEC);
   client->print(' ');
   client->print(now.hour(), DEC);
   client->print(':');
   client->print(now.minute(), DEC);
   client->print(':');
   client->print(now.second(), DEC);
   client->print("] ");
   client->println();

   displaySensorData(client); // Affichage des données des capteurs
   displayGPSData(client);    // Affichage des données GPS
}

// Fonction pour afficher les données des capteurs
void displaySensorData(Stream *client)
{
   for (int i = 0; i < sizeof(sensors) / sizeof(Sensor); i++)
   {
      client->print(sensors[i].name);
      client->print(F(": "));
      client->println(sensors[i].value);
   }
}

// Fonction pour afficher les données GPS
void displayGPSData(Stream *client)
{
   client->print(F("Latitude :"));
   client->println(flat == TinyGPS::GPS_INVALID_F_ANGLE ? 0.0 : flat, 6);
   client->print(F("Longitude : "));
   client->println(flon == TinyGPS::GPS_INVALID_F_ANGLE ? 0.0 : flon, 6);
   client->print(F("Satellite : "));
   client->println(GPS.satellites() == TinyGPS::GPS_INVALID_SATELLITES ? 0 : GPS.satellites());
   client->print(F("Précision : "));
   client->println(GPS.hdop() == TinyGPS::GPS_INVALID_HDOP ? 0 : GPS.hdop());
   client->println();
}

/*----------- CARTE SD -------------*/

// Enregistrement des données des capteurs dans la carte SD
void saveData(Stream *client)
{
   // Vérifier taille ficher (FILE_MAX_SIZE)
   DateTime now = rtc.now();
   char filename[13];
   unsigned int i = 0;
   sprintf(filename, "%02d%02d%02d_%u.txt", now.year() % 100, now.month(), now.day(), i); // YYMMDD_{i}.txt

   for (i; i < 4294967295; i++) // Valeur maximale d'un unsigned int(eger), de 0 à 4,294,967,295
   {
      File dataFile = SD.open(filename, FILE_WRITE);
      if (dataFile && dataFile.size() >= FILE_MAX_SIZE)
      {
         dataFile.close();
         sprintf(filename, "%02d%02d%02d_%u.txt", now.year() % 100, now.month(), now.day(), i);
      }
      else
      {
         // Le fichier est inférieur à FILE_MAX_SIZE(4096 par défaut) octets, on peut écrire dedans
         dataFile.close();
         break;
      }
   }

   File dataFile = SD.open(filename, FILE_WRITE);

   if (dataFile)
   {
      DateTime now = rtc.now();
      dataFile.print(now.year(), DEC);
      dataFile.print('/');
      dataFile.print(now.month(), DEC);
      dataFile.print('/');
      dataFile.print(now.day(), DEC);
      dataFile.print(' ');
      dataFile.print(now.hour(), DEC);
      dataFile.print(':');
      dataFile.print(now.minute(), DEC);
      dataFile.print(':');
      dataFile.print(now.second(), DEC);
      dataFile.println();
      saveSensorData(dataFile);
      saveGPSData(dataFile);
      dataFile.println();
      dataFile.close();
   }
}

// Fonction pour sauvegarder les données des capteurs
void saveSensorData(File &dataFile)
{
   for (int i = 0; i < sizeof(sensors) / sizeof(Sensor); i++)
   {
      // Vérification LUMIN
      if (sensors[i].id == 'L' && LUMIN == 0)
      {
         continue;
      }
      // Vérification TEMP_AIR
      if (sensors[i].id == 'T' && TEMP_AIR == 0)
      {
         continue;
      }
      // Vérification HYGR
      if (sensors[i].id == 'H' && HYGR == 0)
      {
         continue;
      }
      // Vérification PRESSURE
      if (sensors[i].id == 'P' && PRESSURE == 0)
      {
         continue;
      }
      dataFile.print(sensors[i].name);
      dataFile.print(F(": "));
      dataFile.println(sensors[i].value);
   }
}

// Fonction pour sauvegarder les données GPS
void saveGPSData(File &dataFile)
{
   dataFile.print(F("Latitude :"));
   dataFile.println(flat == TinyGPS::GPS_INVALID_F_ANGLE ? 0.0 : flat, 6);
   dataFile.print(F("Longitude :"));
   dataFile.println(flon == TinyGPS::GPS_INVALID_F_ANGLE ? 0.0 : flon, 6);
   dataFile.print(F("Satellite :"));
   dataFile.println(GPS.satellites() == TinyGPS::GPS_INVALID_SATELLITES ? 0 : GPS.satellites());
   dataFile.print(F("Précision :"));
   dataFile.println(GPS.hdop() == TinyGPS::GPS_INVALID_HDOP ? 0 : GPS.hdop());
}

/*----------- ERREURS -------------*/

// Fonction qui retourne un booléen si au moins une des données du capteur BME280 est un NaN
bool are_bme_data_nan()
{
   // Mettre a jour les données
   readData();
   // Vérifier si une des données est un NaN
   while (isnan(sensors[0].value) || isnan(sensors[1].value) || isnan(sensors[2].value) && !err_capt_bme)
   /* "&& !err_capt_bme" permet de ne pas confondre un accès d'erreur au capteur (err_capt_bme = false)
      d'une donnée n'étant pas dans la plage des valeurs considérées comme "correctes" défini
      dans le mode config (sensors[1].value < HYGR_MINT par exemple) */
   {
      leds.setColorHSB(0, 0.0, 1.0, 0.05); // Rouge
      delay(500);
      leds.setColorHSB(0, 0.33, 1.0, 0.05); // Vert
      delay(500);
      readData();
   }
   return false;
}

// Fonction vérifiant si la carte SD est pleine (considérée pleine si moins de FILE_MAX_SIZE est disponible)
void checkSdFull(SdFat *SD)
{
   // Calcul de l'espace libre (prend ~37 secondes sur une carte de 8Go)
   // (cf: https://forum.arduino.cc/t/how-to-check-if-sd-card-is-full/317457)
   uint32_t freeClusters = SD->vol()->freeClusterCount();
   uint32_t freeSpace = freeClusters * SD->vol()->sectorsPerCluster() * 512;
   if (freeSpace < FILE_MAX_SIZE)
   {
      for (int i = 0; i < 5; i++) // On fait clignoter la led 5 fois, puis on revérifie
      {
         unsigned long duree = millis();
         while (millis() - duree < 1000)
         { // 1000(ms) --> 1Hz
            // Clignotement de leds
            if (millis() - duree < 500)
            {
               leds.setColorHSB(0, 0.0, 1.0, 0.05); // Rouge
            }
            else
            {
               leds.setColorHSB(0, 0.0, 0.0, 0.05); // Blanc
            }
         }
      }
   }
}
