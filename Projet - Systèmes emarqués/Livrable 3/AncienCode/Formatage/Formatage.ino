#include <SD.h>

void setup() {
  Serial.begin(9600);

  if (!SD.begin(4)) {
    Serial.println("Erreur lors de l'initialisation de la carte SD.");
    while (true);
  }
  Serial.println("Carte SD initialisée avec succès.");

  deleteAllFiles();
  formatSDCard();
}

void loop() {
  
}

void deleteAllFiles() {
  Serial.println("Suppression de tous les fichiers sur la carte SD :");

  File dir = SD.open("/");
  while (true) {
    File entry = dir.openNextFile();
    if (!entry) {
      
      break;
    }
    Serial.print("Suppression de : ");
    Serial.println(entry.name());
    entry.close();
    SD.remove(entry.name());
  }
  dir.close();
}

void formatSDCard() {
  Serial.println("Formatage de la carte SD...");

  File root = SD.open("/");
  while (true) {
    File entry = root.openNextFile();
    if (!entry) {
      
      break;
    }
    Serial.print("Suppression de : ");
    Serial.println(entry.name());
    entry.close();
    SD.remove(entry.name());
  }
  root.close();
  Serial.println("Carte SD formatée avec succès.");
}
