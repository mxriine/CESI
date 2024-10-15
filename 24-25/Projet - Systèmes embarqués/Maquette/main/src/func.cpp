#include "func.hpp"

void printBME280Data
(
   Stream* client
)
{
   float temp(NAN), hum(NAN), pres(NAN);

   BME280::TempUnit tempUnit(BME280::TempUnit_Celsius);
   BME280::PresUnit presUnit(BME280::PresUnit_Pa);

   bme.read(pres, temp, hum, tempUnit, presUnit);

   client->print(F("Temp: "));
   client->print(temp);
   client->print("°"+ String(tempUnit == BME280::TempUnit_Celsius ? 'C' :'F'));
   client->print(F("\t\tHumidite: "));
   client->print(hum);
   client->print(F("% RH"));
   client->print(F("\t\tPression: "));
   client->print(pres);
   client->println(F("Pa"));
}