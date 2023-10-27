/*
     _______        __  ____            _           _   
    |___ /\ \      / / |  _ \ _ __ ___ (_) ___  ___| |_ 
      |_ \ \ \ /\ / /  | |_) | '__/ _ \| |/ _ \/ __| __|
     ___) | \ V  V /   |  __/| | | (_) | |  __/ (__| |_ 
    |____/   \_/\_/    |_|   |_|  \___// |\___|\___|\__|
                                     |__/                */


//Bibliothèques
#include <SD.h>
#include <RTClib.h>

#define CHIP 4 

RTC_DS1307 rtc;

void setup() {
  Serial.begin(9600);
  rtc.begin();

  // Vérifie si la carte SD peut être initialisée
  if (!SD.begin(CHIP)) {
    Serial.println(F("Échec du chargement de la carte SD"));
    while (true);
  }
}

unsigned long lastWrite(0);

void dateTime(uint16_t* date, uint16_t* time) {
  DateTime now = rtc.now();
  *date = FAT_DATE(now.year(), now.month(), now.day());
  *time = FAT_TIME(now.hour(), now.minute(), now.second());
}

void checkSizeFiles(String startFile, int startNumber, int textSize) {
  String extension = ".log";
  String fileName = startFile + startNumber + extension;
  File file = SD.open(fileName);
  int fileSize = file.size() + textSize;

  // Vérifie si le fichier dépasse la taille maximale (2048 octets)
  if (fileSize > 2048) {
    String newFileName = fileName;
    File newFile = file;
    int i = 0;
    Serial.println(fileSize);

    // Crée un nouveau fichier si le fichier actuel est trop grand
    while (fileSize > 1024) {
      newFileName = startFile + (startNumber + i) + extension;
      newFile = SD.open(newFileName, FILE_WRITE);
      fileSize = newFile.size() + textSize;
      Serial.println(fileSize);
      
      // Ferme le nouveau fichier s'il est toujours trop grand
      if (fileSize > 1024)
        newFile.close();
      i++;
    }

    size_t n;
    uint8_t buf[64];

    // Copie le contenu du fichier actuel dans le nouveau fichier
    while ((n = file.read(buf, sizeof(buf))) > 0) {
      newFile.write(buf, n);
    }

    newFile.close();
    file.close();
    
    // Supprime le fichier actuel
    SD.remove(fileName);
  } else
    file.close();
}

bool SDWriteError = false;

void writeValues(bool sd) {
  // Écrit les valeurs dans la carte SD toutes les 10 minutes
  if ((millis() - lastWrite) / 60000 > 10){ 
    lastWrite = millis();
    if (sd) {
      if (rtc.begin()) {
        DateTime now = rtc.now();
        SdFile::dateTimeCallback(dateTime);
        String year = String(now.year() - 2000);
        String month = String(now.month());
        String day = String(now.day());
        String startFiles = year + month + day + "_";
        checkSizeFiles(startFiles, 0, 220);
        String fileName = startFiles + 0 + ".log";
        File logFile = SD.open(fileName, FILE_WRITE);
        Serial.println(fileName);
        Serial.println(logFile.size());
        if (logFile) {
          SDWriteError = false;

          // Écrit la date et l'heure dans le fichier
          logFile.print(F("["));
          logFile.print(now.day(), DEC);
          logFile.print(F("/"));
          logFile.print(now.month(), DEC);
          logFile.print(F("/"));
          logFile.print(now.year());
          logFile.print(F(" "));
          logFile.print(now.hour(), DEC);
          logFile.print(F(":"));
          logFile.print(now.minute(), DEC);
          logFile.print(F(":"));
          logFile.print(now.second(), DEC);
          logFile.print(F("]  "));
          
          // Écrit des données fictives (à personnaliser)
          for (int i = 0; i < 2; i++) {
            switch ('L') {
              case 'L':
                logFile.print(F("Lumière : "));
                break;
              case 'T':
                logFile.print(F("Température (°C) : "));
                break;
              case 'H':
                logFile.print(F("Hygrométrie (%) : "));
                break;
              case 'P':
                logFile.print(F("Pression (HPa) : "));
                break;
            }
            logFile.print(10);
            logFile.print(F("   "));
          }
          logFile.print(F("|"));
          logFile.print(F("   "));
          logFile.print(F("Latitude : "));
          logFile.print(10);
          logFile.print(F("   "));
          logFile.print(F("Longitude : "));
          logFile.print(11);
          logFile.print(F("   "));
          logFile.print(F("Altitude (m) : "));
          logFile.print(12);
          logFile.print(F("   "));
          logFile.print(F("Satellites : "));
          logFile.println(13);
          logFile.close();
        } else {
          SDWriteError = true;
        }
      }
    }
  }
}

void loop() {
  // Appelle la fonction pour écrire les valeurs sur la carte SD
  writeValues(true);
}
