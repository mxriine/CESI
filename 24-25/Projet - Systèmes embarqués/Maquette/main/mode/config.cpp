// Fonctions (disons une API pour avoir les infos des capteurs)
#include "../src/func.hpp"

// Fonction pour l'interface série du monde Configurations
void configuration(Stream *client)
{
  if (Serial.available() > 0)
  {
    String command = Serial.readStringUntil('\n');
    command.trim();

    if (command == "VERSION" || command == "version") // Version du système
    {
      client->println(F("Informations du système"));
      client->println(F("==========================="));
      client->print(F("Version du système : "));
      client->println(F("1.0"));
      client->print(F("Version de la carte SD : "));
      client->println(F("x.0"));
      client->print(F("Version du capteur BME280 : "));
      client->println(F("x.0"));
      client->print(F("Version de l'horloge DS1307 : "));
      client->println(F("x.0"));
      client->println(F("==========================="));
    }
    else if (command == "REBOOT" || command == "reboot") // Redémarrage du système
    {
      client->println(F("Redémarrage du système"));
      client->println(F("==========================="));
      client->println(F("Le système redémarre..."));
      client->println(F("==========================="));
      delay(1000);
      asm volatile("jmp 0x00");
    }
  }
}