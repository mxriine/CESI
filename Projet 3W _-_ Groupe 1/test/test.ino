#include <ChainableLED.h>

#define BUTTON_G 3

ChainableLED leds(7, 8, 5);

unsigned long start = 0;
const unsigned long dureeappui = 5000;

void setup() {
  pinMode(BUTTON_G, INPUT_PULLUP);
  leds.init();
}

void loop() {
  if (digitalRead(BUTTON_G) == LOW) {
    if (start == 0) {
      start = millis();
    } else if (millis() - start >= dureeappui) {
      leds.setColorRGB(0, 0, 0, 255); 
    }
  }
}