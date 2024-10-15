#include "func.hpp"

#define LIGHT_PIN 0

Sensor sensors[]{
    {'T', "Temperature (°C)", {}},
    {'H', "Hygrometry (%)", {}},
    {'P', "Pressure (HPa)", {}},
    {'L', "Luminosity (Lux)", {}}};

void readData(
    Stream *client)
{
   // bme280
   float temp(NAN), hum(NAN), pres(NAN);
   // luminosity
   int sensorLightValue = analogRead(LIGHT_PIN);

   BME280::TempUnit tempUnit(BME280::TempUnit_Celsius);
   BME280::PresUnit presUnit(BME280::PresUnit_Pa);

   bme.read(pres, temp, hum, tempUnit, presUnit);

   for (int i = 0; i < sizeof(sensors) / sizeof(sensors[0]); i++)
   {
      switch (sensors[i].id)
      {
      case 'T':
         sensors[i].value = temp;
         break;
      case 'H':
         sensors[i].value = hum;
         break;
      case 'P':
         sensors[i].value = pres / 100.0F;
         break;
      case 'L':
         sensors[i].value = sensorLightValue;
         break;
      default:
         break;
      }
   }

   // for (int i = 0; i < sizeof(sensors) / sizeof(sensors[0]); i++)
   // {
   //    client->print(sensors[i].name);
   //    client->print(": ");
   //    client->print(sensors[i].value);
   //    client->println();
   // }

   // client->println();
}

void displayData(
    Stream *client)
{
   for (int i = 0; i < sizeof(sensors) / sizeof(sensors[0]); i++)
   {
      client->print(sensors[i].name);
      client->print(": ");
      client->print(sensors[i].value);
      client->println();
   }

   client->println();
}

// void writeData(
//     SdFat SD,
//     Stream *client)
// {
//    File dataFile = SD.open("data.txt", FILE_WRITE);
//    if (dataFile)
//    {
//       for (int i = 0; i < sizeof(sensors) / sizeof(sensors[0]); i++)
//       {
//          dataFile.print(sensors[i].id);
//          dataFile.print(": ");
//          dataFile.print(sensors[i].value);
//       }
//       dataFile.println();
//       dataFile.close();
//    }
//    else
//    {
//       client->println(F("Erreur lors de l'ouverture du fichier"));
//    }
// }