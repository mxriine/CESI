//Bibliothèques
#include "src/imported_libs/ChainableLED/ChainableLED.h"
#include "src/imported_libs/TinyGPS/TinyGPS.h"
#include "src/imported_libs/EEPROM/EEPROM.h"
#include <SoftwareSerial.h>
#include <BME280I2C.h>
#include "RTClib.h"
#include <Wire.h>
#include <SPI.h>
#include "SdFat.h"

//Variables
#define LIGHT_PIN 0

#define BUTTON_R 2
#define BUTTON_G 3

#define SD_CS_PIN 4

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

unsigned long freeze = 0;
unsigned long start = 0;
volatile bool verif_conf = false;

//Constantes SD
SdFat SD;
File myFile;
volatile bool verif_sd = false;

unsigned long LOG_INTERVALL = 600000;
int FILE_MAX_SIZE = 4096;
String fileName = "";
String data = "";

//Constantes Capteur
BME280I2C bme;
RTC_DS1307 rtc;

//Constantes GPS
//volatile bool GpsValue = false;
//float latitude, longitude;
//SoftwareSerial gps(3, 4);
//TinyGPS GPS;

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

  //GPS
  ///gps.begin(9600);

  //Horloge
  rtc.begin();
  //rtc.adjust(DateTime(23, 11, 03, 13, 22, 00));
  if (!rtc.isrunning()) {
    Serial.println("RTC n'est PAS en cours d'exécution !");
    rtc.adjust(DateTime(F(__DATE__), F(__TIME__)));
  }

  //Carte SD
  Serial.println("Initialisation de la Carte SD...");

  if (!SD.begin(SD_CS_PIN)) {
    Serial.println("Erreur d'initialisation de la Carte SD !");
    return;
  }

  Serial.println(F("Initialisation terminée !"));
  Serial.println(F(""));
}

//Fonctions
void ChangeMode(int newMode, Stream* client) {
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

  client->print(F("Lancement du mode "));
  client->println(name);
  client->println(F("==========================="));
}

void addSensorValue(float* values, float value) {
  for (int i = 0; i < MAX_VALUE - 1; i++) {
    values[i] = values[i + 1];
  }
  values[MAX_VALUE - 1] = value;
}

void SensorValues() {
  float sensorTempValue(NAN), sensorHumValue(NAN), sensorPresValue(NAN);
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
        value = sensorPresValue;
        addSensorValue(sensors[i].value, value / 100.0F);
        break;

      case 'L':
        value = sensorLightValue;
        addSensorValue(sensors[i].value, value);
        break;
    }
  }
}

void WriteValue(bool sd, Stream* client) {
  DateTime now = rtc.now();

  //Nom du fichier
  fileName = "data_";
  fileName += now.year();
  fileName += ".";
  fileName += now.month();
  fileName += ".";
  fileName += now.day();
  fileName += ".log";

  //Date et heure de prise de mesure
  String data = F("Date | ");
  data += now.day();
  data += F("/");
  data += now.month();
  data += F("/");
  data += now.year();
  data += F(" ");
  data += now.hour();
  data += F(":");
  data += now.minute();
  data += F(":");
  data += now.second();

  data += "\n";

  SensorValues();

  /*if (GpsValue = true) {
    while(gps.available()){
      if(GPS.encode(gps.read())){ 
        GPS.f_get_position(&latitude,&longitude);

        data += F("GPS |");
        data += F("Latitude : ");
        data += latitude;
        data += F(" Longitude : ");
        data += longitude;
     }
    }
  }*/

  //Créattion du fichier
  myFile = SD.open("test.log", FILE_WRITE);

  if (myFile && mode == MODE_STANDARD) {
    client->println("Ecriture des données dans : test.log");

    myFile.println(data);

    for (int i = 0; i < sizeof(sensors) / sizeof(Sensor); i++) {
      myFile.print(sensors[i].name);
      myFile.print(F(": "));
      myFile.println(sensors[i].value[MAX_VALUE - 1]);
    }
    myFile.println(F(" "));

    myFile.println(F("==========================="));

    myFile.close();

  } else if (myFile && mode == MODE_MAINT) {
    client->println(data);

    for (int i = 0; i < sizeof(sensors) / sizeof(Sensor); i++) {
      client->print(sensors[i].name);
      client->print(F(": "));
      client->println(sensors[i].value[MAX_VALUE - 1]);
    }
    client->println(F(" "));

    client->println(F("==========================="));
  }

  client->println(F("\n"));
}

void wait() {
  Serial.print(F("."));
  delay(500);
  Serial.print(F("."));
  delay(500);
  Serial.println(F("."));
  delay(500);
}

//Boucle
void loop() {

  switch (mode) {
    case MODE_OFF:
      leds.setColorRGB(0, 0, 0, 0);

      if (digitalRead(BUTTON_G) == LOW) {
        ChangeMode(MODE_STANDARD, &Serial);
      }
      break;

    case MODE_STANDARD:
      leds.setColorRGB(0, 0, 255, 0);

      //GpsValue = true;

      if (millis() - freeze >= (LOG_INTERVALL) || freeze == 0) {
        WriteValue(true, &Serial);
        freeze = millis();
      }

      //si on tape la commande read
      if (Serial.available() > 0) {
        String command = Serial.readStringUntil('\n');
        command.trim();

        if (command == "read") {
          Serial.println(F("Lecture des données..."));
          Serial.println(F("==========================="));

          myFile = SD.open("test.log", FILE_READ);

          if (myFile) {
            while (myFile.available()) {
              Serial.write(myFile.read());
            }
            myFile.close();
          } else {
            Serial.println(F("Erreur d'ouverture du fichier test.txt"));
          }

          Serial.println(F("==========================="));
          Serial.println(F("\n"));
        }

        if (command == "config") {
          ChangeMode(MODE_CONFIG, &Serial);
        }
      }

      if (digitalRead(BUTTON_G) == LOW) {
        if (start == 0) {
          start = millis();
        } else if (millis() - start >= 5000) {
          ChangeMode(MODE_ECO, &Serial);
          start = 0;
        }
      }

      if (digitalRead(BUTTON_R) == LOW) {
        if (start == 0) {
          start = millis();
        } else if (millis() - start >= 5000) {
          ChangeMode(MODE_MAINT, &Serial);
          start = 0;
        }
      }
      break;

    case MODE_ECO:
      leds.setColorRGB(0, 0, 0, 255);

      //GpsValue = false;

      if (millis() - freeze >= LOG_INTERVALL * 2 || freeze == 0) {
        WriteValue(true, &Serial);
        freeze = millis();
      }

      if (digitalRead(BUTTON_G) == LOW) {
        if (start == 0) {
          start = millis();
        } else if (millis() - start >= 5000) {
          ChangeMode(MODE_STANDARD, &Serial);
          start = 0;
        }
      }

      if (digitalRead(BUTTON_R) == LOW) {
        if (start == 0) {
          start = millis();
        } else if (millis() - start >= 5000) {
          ChangeMode(MODE_MAINT, &Serial);
          start = 0;
        }
      }
      break;

    case MODE_MAINT:
      leds.setColorRGB(0, 255, 165, 0);
      
      if (verif_sd == false) {
        wait();

        Serial.println(F("Vous pouvez retirer la carte SD."));
        Serial.print(F("\n"));
        verif_sd = true;
      }
      
      if (millis() - freeze >= 20000 || freeze == 0) {
        WriteValue(true, &Serial);
        freeze = millis();
      }

      if (digitalRead(BUTTON_R) == LOW) {
        if (start == 0) {
          start = millis();
        } else if (millis() - start >= 5000) {
          ChangeMode(MODE_STANDARD, &Serial);
          start = 0;
        }
      }
      break;

    case MODE_CONFIG:
      leds.setColorRGB(0, 255, 255, 0);

      if (verif_conf == false) {
        wait();

        Serial.println(F("En cours de programmation"));
        Serial.println(F("\n"));
        verif_conf = true;
      }

      if (Serial.available() > 0) {
        String command = Serial.readStringUntil('\n');
        command.trim();

        if (command == "standard") {
          ChangeMode(MODE_STANDARD, &Serial);
        }
      }

      if ((millis() - start) / 1000 > (30 * 60)) {
        start = millis();
        ChangeMode(MODE_STANDARD, &Serial);
        freeze = 0;
      }
      break;
  }

  delay(1000);
}