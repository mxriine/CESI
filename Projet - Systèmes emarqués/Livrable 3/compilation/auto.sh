#! /bin/bash

printf "####################\n"
printf "## COMPIL ARDUINO ##\n"
printf "####################\n"

FOLDER=$1

if [ ! -d "$FOLDER" ];then
    echo "Le dossier $FOLDER n'existe pas"
    exit
fi

if [ -z $FOLDER ];
then
    exit
fi

if [ "$FOLDER" != '' ];then
    printf 'P1'
    if [ ! -d ".tmp" ];then
        mkdir .tmp
    else
        rm -rf .tmp/*
    fi
    printf '.'
    if [ ! -d "build" ];then
        mkdir build
    else
        rm -rf .build/*
    fi
    printf '.'
    printf ' done [env ready]\n'
else
    echo 'Aucun dossier spécifié, indiquer un nom'
    exit
fi

for i in `ls $FOLDER`
do
if [ `echo $i | cut -d. -f2` = "c" ]
then
    avr-gcc -Os -DF_CPU=16000000UL -mmcu=atmega328 -c ./$FOLDER/$i -o ./.tmp/`echo $i | cut -d. -f1`.o
fi
done

printf 'P3'
avr-gcc -Os -DF_CPU=16000000UL -mmcu=atmega328 ./.tmp/* -o build/$FOLDER
printf '. done [link]\n'

printf 'P4'
avr-objcopy -O ihex -R .eeprom build/$FOLDER build/$FOLDER.hex
printf '. done [.hex]\n'

printf 'Voulez-vous commencer le téléversement ? [y]:'
read -r TELEV
    printf "Démarrage du téléversement \n"
    avrdude -F -V -c arduino -p ATMEGA328P -P /dev/ttyACM0 -b 115200 -U flash:w:build/$FOLDER.hex


exit