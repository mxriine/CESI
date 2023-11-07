//Bibliothèques
#include "src/imported_libs/ChainableLED/ChainableLED.h"
#include "src/imported_libs/TinyGPS/TinyGPS.h"
#include "src/imported_libs/EEPROM/EEPROM.h"
#include <SoftwareSerial.h>
#include <BME280I2C.h>
#include <RTClib.h>
#include <SdFat.h>
#include <Wire.h>

//Variables
#define SD_CS_PIN 4

#define LIGHT_PIN 0

#define GPS_PIN_1 4
#define GPS_PIN_2 5

#define BUTTON_R 2
#define BUTTON_G 3

#define MODE_OFF 0
#define MODE_STANDARD 1
#define MODE_CONFIG 2
#define MODE_MAINT 3
#define MODE_ECO 4

#define MAX_VALUE 5

//Constantes Leds / Bouton
const int NUM_LEDS PROGMEM = 5;
byte mode = MODE_OFF;

ChainableLED leds(7, 8, NUM_LEDS);

volatile bool bascule_red = false;
volatile bool bascule_green = false;
unsigned long freeze = 0;
unsigned long start = 0;

//Constantes Capteur
BME280I2C bme;
RTC_DS1307 rtc;

//Constante GPS
TinyGPS GPS;
SoftwareSerial gps(GPS_PIN_1, GPS_PIN_2);

float latitude, longitude;

//Constantes SD
SdFat SD;
File myFile;

//Structures
struct Sensor {
  char id;
  String name;
  float value[MAX_VALUE];
};

Sensor sensors[]{
  { 'T', "Temperature (°C)", {} },
  { 'H', "Hygrometry (%)", {} },
  { 'P', "Pressure (HPa)", {} },
  { 'L', "Luminosity (Lux)", {} }
};

//Initialisation
void setup() {
  Serial.begin(115200);

  Serial.println(F(" WORLDWIDE WEATHER WATCHER "));
  Serial.println(F("==========================="));

  pinMode(BUTTON_R, INPUT_PULLUP);
  pinMode(BUTTON_G, INPUT_PULLUP);

  attachInterrupt(digitalPinToInterrupt(BUTTON_R), RedEventF, FALLING);
  attachInterrupt(digitalPinToInterrupt(BUTTON_G), GreenEventF, FALLING);

  //SD
  if (!SD.begin(SD_CS_PIN)) {
    Serial.println(F("Impossible de trouver la carte SD !"));
    while (1);
  }
  Serial.println(F("Carte SD trouvée !"));
 
  //BME280
  Wire.begin();

  while (!bme.begin()) {
    Serial.println(F("Impossible de trouver le capteur BME280 !"));
    delay(1000);
  }

  switch (bme.chipModel()) {
    case BME280::ChipModel_BME280:
      Serial.println(F("Capteur BME280 trouvé ! Succès."));
      break;
    case BME280::ChipModel_BMP280:
      Serial.println(F("Capteur BMP280 trouvé ! Pas d'humidité disponible."));
      break;
    default:
      Serial.println(F("Capteur UNKNOWN détecté ! Erreur !"));
  }

  //Horloge 
  rtc.begin();
  //rtc.adjust(DateTime(23, 11, 03, 13, 22, 00));
  if (!rtc.isrunning()) {
    Serial.println(F("RTC n'est PAS en cours d'exécution !"));
    rtc.adjust(DateTime(F(__DATE__), F(__TIME__)));
  }

  //GPS
  gps.begin(9600);

  Serial.println(F("Initialisation terminée !"));
  Serial.println(F(""));
}

//Fonctions
void RedEventF() {
  bascule_red = !bascule_red;
}

void GreenEventF() {
  bascule_green = !bascule_green;

  if(bascule_green) {
    if (mode = MODE_OFF) {
      ChangeMode(MODE_STANDARD);
    }
  }
}

void ChangeMode(int newMode) {
  mode = newMode;

  String name = F("");
  switch (newMode) {
    case MODE_STANDARD:
      name = F("Standard");
      break;
    case MODE_ECO:
      name = F("Economique");
      break;
    case MODE_MAINT:
      name = F("Maintenance");
      break;
    case MODE_CONFIG:
      name = F("Configuration");
      break;
  }
  Serial.print(F("Lancement du mode "));
  Serial.println(name);
  Serial.println(F("==========================="));
}

void addSensorValue(float* values, float value) {
  for (int i = 0; i < MAX_VALUE - 1; i++) {
    values[i] = values[i + 1];
  }
  values[MAX_VALUE - 1] = value;
}

void SensorValues() {
  float sensorTempValue(NAN), sensorHumValue(NAN), sensorPresValue(NAN), gpsValue(NAN);
  int sensorLightValue = analogRead(LIGHT_PIN);

  BME280::TempUnit tempUnit(BME280::TempUnit_Celsius);
  BME280::PresUnit presUnit(BME280::PresUnit_Pa);

  bme.read(sensorPresValue, sensorTempValue, sensorHumValue, tempUnit, presUnit);

  float value = 0;
  for (int i = 0; i < sizeof(sensors) / sizeof(Sensor); i++) {
    switch (sensors[i].id) {
    case 'T':
      value = sensorTempValue;
      addSensorValue(sensors[i].value, value);
      break;
    
    case 'H':
      value = sensorHumValue;
      addSensorValue(sensors[i].value, value);
      break;

    case 'P':
      value = sensorPresValue / 100.0F;
      addSensorValue(sensors[i].value, value);
      break;

    case 'L':
      value = sensorLightValue;
      addSensorValue(sensors[i].value, value);
      break;

    case 'G':
      value = gpsValue;
      addSensorValue(sensors[i].value, value);
      break;
    }
  }
  unsigned long lastWrite = 0;
}

void WriteValue(bool sd, Stream* client) {

  SensorValues(); 
  DateTime now = rtc.now();

  String filename = F("data_");
  filename += now.year();
  filename += F("-");
  filename += now.month();
  filename += F("-");
  filename += now.day();
  filename += F(".csv");

  String data = F("");
  data += F("Date | ");
  if (now.day() < 10) data += F("0");
  data += now.day();
  data += F("/");
  data += now.month();
  data += F("/");
  data += now.year();
  data += F(" ");
  data += now.hour();
  data += F(":");
  if (now.minute() < 10) data += F("0");
  data += now.minute();
  data += F(":");
  if (now.second() < 10) data += F("0");
  data += now.second();
  data += F("\n");

  for (int i = 0; i < sizeof(sensors); i++) {
    data += (sensors[i].name);
    data += (F(": "));
    data += (sensors[i].value[MAX_VALUE - 1]);
    data += (F("\n"));
  }

  unsigned long age;
  GPS.f_get_position(&latitude, &longitude, &age);
  data += (F("Donnée GPS | "));
  data += (F("\tLatitude : "));
  data += (latitude);
  data += (F("\tLongitude : "));
  data += (longitude);
  data += (F("\n"));

  client->print(data);

}

//Boucle
void loop() {

  switch (mode) {
    case MODE_OFF:
      leds.setColorRGB(0, 0, 0, 0);

      if (digitalRead(BUTTON_G) == LOW) {
        ChangeMode(MODE_STANDARD);
      }
      break;

    case MODE_STANDARD:
      leds.setColorRGB(0, 0, 255, 0);

      if (millis() - freeze >= 20000 || freeze == 0) {
        WriteValue(true, &Serial);
        freeze = millis();
      }

      if (digitalRead(BUTTON_G) == LOW) {
        if (start == 0) {
          start = millis();
        } 
        else if (millis() - start >= 5000) {
          ChangeMode(MODE_ECO);
          start = 0;
        }
      }

      if (digitalRead(BUTTON_R) == LOW) {
        if (start == 0) {
          start = millis();
        } 
        else if (millis() - start >= 5000) {
          ChangeMode(MODE_MAINT);
          start = 0;
        }
      } 
      break;

    case MODE_ECO:
      leds.setColorRGB(0, 0, 0, 255);

      if (digitalRead(BUTTON_G) == LOW) {
        if (start == 0) {
          start = millis();
        } 
        else if (millis() - start >= 5000) {
          ChangeMode(MODE_STANDARD);
          start = 0;
        }
      }

      if (digitalRead(BUTTON_R) == LOW) {
        if (start == 0) {
          start = millis();
        } 
        else if (millis() - start >= 5000) {
          ChangeMode(MODE_MAINT);
          start = 0;
        }
      }
      break;

    case MODE_MAINT:
      leds.setColorRGB(0, 255, 165, 0);

      if (digitalRead(BUTTON_R) == LOW) {
        if (start == 0) {
          start = millis();
        } 
        else if (millis() - start >= 5000) {
          ChangeMode(MODE_STANDARD);
          start = 0;
        }
      }
      break;

    case MODE_CONFIG:
      leds.setColorRGB(0, 255, 255, 0);

      if ((millis() - start) >= 20000) {
        start = millis();
        ChangeMode(MODE_STANDARD);
        start = 0;
      }
      break;
  }

  delay(1000);
}