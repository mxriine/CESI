#ifndef FUNC_HPP
#define FUNC_HPP

/*----------- Bibliothèques -------------*/
#include "imported_libs/ChainableLED/ChainableLED.h" // Led RGB
#include "imported_libs/BME280/BME280I2C.h"          // Capteur de température
#include "imported_libs/TinyGPS/TinyGPS.h"           // Capteur GPS
#include <SoftwareSerial.h>                          // Initialisation GPS
#include <RTClib.h>                                  // Horloge
#include <SdFat.h>                                   // Carte SD
#include <Wire.h>                                    // Communication I2C
#include <SPI.h>                                     // Communication SPI
// #include <EEPROM.h>                                  // Stockage des données dans l'EEPROM (mode config)

/*----------- Declaration -------------*/

// LED
extern const int NUM_LEDS;
extern ChainableLED leds;

extern BME280I2C bme;

// Variables gérant l'interruption
extern volatile bool interruptFlagR;
extern volatile bool interruptFlagG;

// Variables GPS
extern float latitude, longitude, altitude;
extern SoftwareSerial gps;
extern TinyGPS GPS;
extern float flat, flon;

// Carte SD
extern SdFat SD;

// Horloge
extern RTC_DS1307 rtc;

// Variables d'erreurs des capteurs
extern bool err_capt_bme;
extern bool err_capt_lum;
/*----------- Structure -------------*/
struct Sensor
{
    char id;
    char name[18];
    float value;
};

/*----------- Fonctions -------------*/

bool are_bme_data_nan();
void checkSdFull(SdFat *SD);

void readData();
void readGPS();

void displayData(Stream *client);

void displaySensorData(Stream *client);
void displayGPSData(Stream *client);
void saveData(Stream *client);
void saveSensorData(File &dataFile);
void saveGPSData(File &dataFile);

#endif