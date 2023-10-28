/*
     _______        __  ____            _           _   
    |___ /\ \      / / |  _ \ _ __ ___ (_) ___  ___| |_ 
      |_ \ \ \ /\ / /  | |_) | '__/ _ \| |/ _ \/ __| __|
     ___) | \ V  V /   |  __/| | | (_) | |  __/ (__| |_ 
    |____/   \_/\_/    |_|   |_|  \___// |\___|\___|\__|
                                     |__/                */


//Bibliothèques

#include "src/project_libs/Led/Led.h"
#include <SoftwareSerial.h>

//Constantes
#define BUTTON_RED 2 //Pin du bouton rouge
#define BUTTON_GREEN 3 //Pin du bouton vert

#define LEDS 5 //Pin des LEDs

Led leds(7, 8, LEDS); //Création de l'objet leds

//Définition des modes
#define MODE_OFF 0
#define MODE_NORMAL 1
#define MODE_ECO 2
#define MODE_MAINTENANCE 3
#define MODE_CONFIG 4

byte previousMode = MODE_NORMAL;
byte mode = MODE_OFF;

//Constantes pour la configuration
String batchNumber = "C3W20_7038";

Config config(__VERSION__, batchNumber);

//Constantes pour les LEDs
unsigned long buttonPressedMs = millis();
bool buttonPressed = false;
bool checkStartPressedButton = true;

unsigned long lastModeChangeTime = 0;

//Fonctions
void setup(){

  //Debut
  Serial.begin(9600);
  while(!Serial);
  Serial.println(F(" WORLDWIDE WEATHER WATCHER "));
  Serial.println(F("==========================="));

  pinMode(BUTTON_RED, INPUT_PULLUP);
  pinMode(BUTTON_GREEN, INPUT_PULLUP);

  attachInterrupt(digitalPinToInterrupt(BUTTON_GREEN), ClickButtonGreenEvent, FALLING);
  attachInterrupt(digitalPinToInterrupt(BUTTON_RED), ClickButtonRedEvent, FALLING);
}

void loop(){
  CheckPressedButton();

  if (mode == MODE_OFF) {
    leds.color(F("OFF"));
  }
  else if (mode == MODE_NORMAL) {
    leds.color(F("GREEN"));
  }
  else if (mode == MODE_ECO) {
    leds.color(F("BLUE"));
  }

  if (mode == MODE_MAINTENANCE) {
    leds.color(F("ORANGE"));
  }

  if (mode == MODE_CONFIG) {
    unsigned long lastActivity = config.getLastActivity();
    leds.color(F("YELLOW"));
    if ((millis() - lastActivity) / 1000 > (2* 60)) {
      changeMode(MODE_NORMAL);
    }
  }
}

void ClickButtonGreenEvent(){
  buttonPressed = true;
  buttonPressedMs = millis();
}

void ClickButtonRedEvent(){
  buttonPressed = true;
  buttonPressedMs = millis();
}

void PressedButtonGreen() {
  if (mode == MODE_NORMAL)
    changeMode(MODE_ECO);
}

void PressedButtonRed() {
  if (mode == MODE_ECO)
    changeMode(MODE_NORMAL);

  else if (mode == MODE_NORMAL)
    changeMode(MODE_MAINTENANCE);

  else if (mode == MODE_MAINTENANCE)
    changeMode(MODE_NORMAL);

}

void ChangeMode(int _mode) {
  mode = _mode;

  String name = F("");
  switch (_mode) {
    case MODE_OFF:
      name = F("OFF");
      break;
    case MODE_NORMAL:
      name = F("STANDARD");
      break;
    case MODE_ECO:
      name = F("ECOLOGIQUE");
      break;
    case MODE_MAINTENANCE:
      name = F("MAINTENANCE");
      break;
    case MODE_CONFIG:
      name = F("CONFIGURATION");
      break;
  }
  Serial.print(F("Lancement du mode : "));
  Serial.println(name);

  lastModeChangeTime = millis();
}

void CheckPressedButton() {

    //Si le bouton est pressé simplement
    if (buttonPressed) {
      if (millis() - buttonPressedMs <= 1000) {
        if (digitalRead(BUTTON_GREEN) == LOW) {
          if (mode == MODE_OFF)
            changeMode(MODE_NORMAL);
        }
        else if (digitalRead(BUTTON_RED) == LOW) {
          if (mode == MODE_NORMAL)
            changeMode(MODE_CONFIG);
        }
        buttonPressed = false;
      }
    }
    checkStartPressedButton = false;

    //Si le bouton est pressé depuis plus de 5 secondes
    if (millis() - buttonPressedMs >= 5000) {
      if (digitalRead(BUTTON_GREEN) == LOW) {
        pressedButtonGreen();
      }
      else if (digitalRead(BUTTON_RED) == LOW) {
        pressedButtonRed();
      }
      buttonPressed = false;
    }

  //Si les deux boutons sont pressés
  if (digitalRead(BUTTON_GREEN) == LOW && digitalRead(BUTTON_RED) == LOW) {
      changeMode(MODE_OFF);

    buttonPressed = false;
  }
}