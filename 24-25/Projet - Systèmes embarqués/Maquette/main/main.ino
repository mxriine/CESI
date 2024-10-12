#include "src/imported_libs/EEPROM/EEPROM.h"
#include "src/imported_libs/ChainableLED/ChainableLED.h"

#define LIGHT_PIN 0

#define BUTTON_R 2
#define BUTTON_G 3

#define MODE_OFF 1
#define MODE_STANDARD 2
#define MODE_CONFIG 3
#define MODE_MAINT 4
#define MODE_ECO 5

byte mode = MODE_OFF;
const int NUM_LEDS PROGMEM = 5;
ChainableLED leds(7, 8, NUM_LEDS);

unsigned long interval = 5000;

bool isOn = false;

// Fonction pour changer de mode
void ChangeMode(int newMode, Stream *client)
{
  mode = newMode;

  String name = F("");
  switch (newMode)
  {
  case MODE_STANDARD:
    name = F("Standard");
    leds.setColorHSB(0, 0.33, 1.0, 0.05); // Vert
    break;
  case MODE_ECO:
    name = F("Economique");
    leds.setColorHSB(0, 0.66, 1.0, 0.05); // BLeu
    break;
  case MODE_MAINT:
    name = F("Maintenance");
    leds.setColorHSB(0, 0.08, 1.0, 0.05); // Orange
    break;
  case MODE_CONFIG:
    name = F("Configuration");
    leds.setColorHSB(0, 0.17, 1.0, 0.05); // Jaune
    break;
  }

  client->print(F("Lancement du mode "));
  client->println(name);
  client->println(F("==========================="));
}

void blinkLEDAsync()
{
  switch (mode)
  {
  case MODE_STANDARD:
    if (digitalRead(BUTTON_G) == LOW && !isOn)
    {
      unsigned long previousMillis = millis();
      bool five = false;

      while (!digitalRead(BUTTON_G))
      {
        Serial.println(millis() - previousMillis);
        if (millis() - previousMillis >= 5000)
        {
          ChangeMode(MODE_ECO, &Serial);
          // on doit relacher le bouton
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
      bool five = false;

      while (!digitalRead(BUTTON_G))
      {
        Serial.println(millis() - previousMillis);
        if (millis() - previousMillis >= 5000)
        {
          ChangeMode(MODE_STANDARD, &Serial);
          // on doit relacher le bouton
          isOn = true;

          break;
        }
      }
    }
    break;
  }

  unsigned long previousMillis = 0;
  // Do not forget to reset isOn if the green button isn't pressed anymore
  if (digitalRead(BUTTON_G))
  {
    isOn = false;
  }
}

void setup()

{
  Serial.begin(115200);

  Serial.println(F(" WORLDWIDE WEATHER WATCHER "));
  Serial.println(F("==========================="));

  pinMode(BUTTON_R, INPUT_PULLUP);
  pinMode(BUTTON_G, INPUT_PULLUP);

  ChangeMode(MODE_STANDARD, &Serial);

  unsigned long previousMillis = 0;
}

void loop()
{

  blinkLEDAsync();
}