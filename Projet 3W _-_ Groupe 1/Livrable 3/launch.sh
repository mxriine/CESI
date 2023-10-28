avr-gcc -Os -DF_CPU=16000000UL -mmcu=atmega328p -c ./$TonFichier/$i -o ./.tmp/`echo $i | cut -d. -f1`.o
avr-gcc -0s -DF_CPU=16000000UL -mmcu=atmega328p ./.tmp/* -o ./build/NomdeTonExe
avr-objcopy ./build/test ./build/"Nomdu".hex
avrdude -C /etc/avrdude.conf -p atmega328p -c arduino -P $Port -b $Baud -U flash:w:$TonFicher.hex:i
port = "/dev/ttyUSB0"
baud ="9600"