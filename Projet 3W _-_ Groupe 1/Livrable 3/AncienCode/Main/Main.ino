//Bibliothèques
#include <Wire.h>                       
#include <Adafruit_BME280.h>                       
#include <RTClib.h> 

// Constantes 

RTC_DS1307 rtc; 
Adafruit_BME280 bme;

void setup(){

  //DEBUT
  Serial.begin(9600);
  while(!Serial);
  Serial.println(" WORLDWIDE WEATHER WATCHER ");
  Serial.println("===========================");
  Serial.println();
  


  //Init RTC
  if (!rtc.begin()) {
    Serial.println("Impossible de trouver le module RTC. Assurez-vous qu'il est correctement connecté.");
    while (1);
  //Init LIGHTSENSOR

  //Init GPS

  }
}

void loop() {
  lectureBME();
  delay(5000);
}

void lectureBME(){

  #define adresseI2CBME280     0x76
  #define pressionNivMerHpa      1024.90 

    //Init BME280
  Serial.print(F("Initialisation du BME280, à l'adresse [0x")); //Initialisation BME280
  Serial.print(adresseI2CBME280, HEX);
  Serial.println(F("]"));
  if(!bme.begin(adresseI2CBME280)) {
    Serial.println(F("--> ÉCHEC…"));
    while(1);                              // Arrêt du programme si échec
  } else {
    Serial.println(F("--> RÉUSSIE !"));
  }

   DateTime now = rtc.now();

  // TEMPERATURE
  
  float temperature = bme.readTemperature();
  Serial.print(F("Température = "));
  Serial.print(temperature);
  Serial.print(F(" °C |"));

  //TAUX D'HUMIDITÉ
  float humidite = bme.readHumidity();
  Serial.print(F(" Humidité = "));
  Serial.print(humidite);
  Serial.print(F(" % |"));
  
  //PRESSION ATMOSPHÉRIQUE
  float pression = (bme.readPressure() / 100.0F);
  Serial.print(F(" Pression atmosphérique = "));
  Serial.print(pression);
  Serial.print(F(" hPa |"));

  //Estimation d'ALTITUDE
  Serial.print(F(" Altitude estimée = "));
  Serial.print(bme.readAltitude(pressionNivMerHpa));
  Serial.print(F(" m"));

  Serial.print(" | ");
  Serial.print(now.hour(), DEC);
  Serial.print(":");
  if (now.minute() < 10) Serial.print("0");
  Serial.print(now.minute(), DEC);
  Serial.print(" ; ");
  Serial.print(now.day(), DEC);
  Serial.print("/");
  Serial.print(now.month(), DEC);
  Serial.print("/");
  Serial.print(now.year(), DEC);

  Serial.println(); // Saut de ligne
}