#include <SD.h>

File root;

void setup() {
  Serial.begin(9600);

  if (!SD.begin(4)) {
    Serial.println("Erreur lors de l'initialisation de la carte SD.");
    while (true);
  }
  Serial.println("Carte SD initialisée avec succès.");

  lister();
}

void loop() {
}

void lister() {
  Serial.println("Liste des fichiers sur la carte SD :");

  File dir = SD.open("/");
  while (true) {
    File entry = dir.openNextFile();
    if (!entry) {
      
      break;
    }
    Serial.print("Nom : ");
    Serial.println(entry.name());

    Serial.println("Contenu :");
    while (entry.available()) {
      Serial.write(entry.read());
    }
    entry.close();
    Serial.println("\n---");
  }
  dir.close();
}
