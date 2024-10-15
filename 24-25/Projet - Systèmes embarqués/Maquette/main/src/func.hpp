#ifndef FUNC_HPP
#define FUNC_HPP

/*----------- Library -------------*/

#include "imported_libs/ChainableLED/ChainableLED.h" // Led RGB
#include "imported_libs/BME280/BME280I2C.h"          // Capteur de température
#include "imported_libs/EEPROM/EEPROM.h"             // EEPROM
#include "imported_libs/DS1307.h"                    // Horloge
#include <math.h>                                    // Mathématiques
#include <Wire.h>                                    // Communication I2C
#include <SPI.h>                                     // Communication SPI
#include "SdFat.h"                                   // Carte SD
#include <Arduino.h>

/*------------------------------------------------------*/

extern SdFat SD;
extern DS1307 clock;
extern BME280I2C bme;
extern const int NUM_LEDS;
extern ChainableLED leds;

extern volatile int logInterval;
// extern volatile int filemaxsize;
// extern volatile int version;
// extern volatile int timeout;

struct Sensor
{
    char id;
    String name;
    float value;
};

/*----------- Fonctions -------------*/

void readData(Stream *client);

void displayData(Stream *client);

void writeData(bool SD, Stream *client);

// Variables

#endif