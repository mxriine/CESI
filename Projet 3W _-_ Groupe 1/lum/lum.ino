#include <Arduino.h>

#define LIGHT_PIN 0

int LUMIN = 0;
int LUMIN_LOW = 200;
int LUMIN_HIGH = 700;

void setup() {
  Serial.begin(9600);
}

void loop() {
  LUMIN = analogRead(LIGHT_PIN);

    if (Serial.available() > 0) {
    String command = Serial.readStringUntil('\n');
    if (command == "LUMIN") {
      list();
    } else if (command == "LUMIN=0") {
      arret();
    } else if (command == "LUMIN_LOW") {
      Serial.print("Valeur de LUMIN_LOW : ");
      Serial.println(LUMIN_LOW);

      Serial.println("Voulez-vous changer la valeur ? (O/N)");

      if (Serial.available() > 0) {
        String choix = Serial.readStringUntil('\n');
        if (choix == "O") {
          Serial.println("Entrez la nouvelle valeur : ");
          Serial.println("Nouvelle valeur de LUMIN_LOW : ");
          Serial.print(LUMIN_LOW);
        }
      }
    }
  }

  //Serial.print("Luminosité : ");
  //Serial.println(LUMIN);  

  delay(1000);
}

void lumlow(){

  Serial.print("Valeur de LUMIN_LOW : ");
  Serial.println(LUMIN_LOW);

    Serial.println("Voulez-vous changer la valeur ? (O/N)");
    String choix = Serial.readStringUntil('\n');

    Serial.println(choix);

    if (choix == "O") {
      Serial.println("Entrez la nouvelle valeur : ");
      Serial.println("Nouvelle valeur de LUMIN_LOW : ");
      Serial.print(LUMIN_LOW);
    }
}

void arret(){
  Serial.println("Arrêt du capteur de luminosité");
  LUMIN = 0;
  while (LUMIN == 0)
  {
    delay(1000);
  }
}

void list(){
  Serial.println("Liste des commandes :");
  Serial.println("LUMIN - Active(1) ou désactive(0) le capteur de luminosité");
  Serial.println("exemple : LUMIN=0");
  Serial.println("LUMIN_LOW - Affiche et/ou change la valeur de LUMIN_LOW");
  Serial.println("exemple : LUMIN_LOW || LUMIN_LOW=200");
  Serial.println("LUMIN_HIGH- Affiche et/ou change la valeur de LUMIN_HIGH");
  Serial.println("exemple : LUMIN_HIGH || LUMIN_HIGH=700");
}
