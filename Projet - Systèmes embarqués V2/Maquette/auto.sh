#! /bin/bash

printf "####################\n"
printf "## COMPIL ARDUINO ##\n"
printf "####################\n"

FOLDER=$1

# Vérifie si le dossier du sketch existe
if [ ! -d "$FOLDER" ]; then
    echo "Le dossier $FOLDER n'existe pas"
    exit 1
fi

# Vérifie si le nom du dossier a été fourni
if [ -z "$FOLDER" ]; then
    exit 1
fi

# Vérifie et installe la bibliothèque RTClib si elle n'est pas installée
if ! arduino-cli lib list | grep -q "RTClib"; then
    echo "Installation de la bibliothèque RTClib..."
    arduino-cli lib install RTClib
    if [ $? -ne 0 ]; then
        echo "Erreur lors de l'installation de la bibliothèque RTClib."
        exit 1
    fi
else
    echo "La bibliothèque RTClib est déjà installée."
fi

# Vérifie et installe la bibliothèque SDFat si elle n'est pas installée
if ! arduino-cli lib list | grep -q "SdFat"; then
    echo "Installation de la bibliothèque SdFat..."
    arduino-cli lib install SdFat
    if [ $? -ne 0 ]; then
        echo "Erreur lors de l'installation de la bibliothèque SdFat."
        exit 1
    fi
else
    echo "La bibliothèque SdFat est déjà installée."
fi

printf 'P1'

# Crée ou vide le dossier temporaire .tmp pour stocker les fichiers intermédiaires
if [ ! -d ".tmp" ]; then
    mkdir .tmp
else
    rm -rf .tmp/*
fi

printf '.'

# Crée ou vide le dossier de construction build pour les fichiers compilés
if [ ! -d "build" ]; then
    mkdir build
else
    rm -rf build/*
fi

printf '.'
printf ' done [env ready]\n'

printf 'P2'
# Compile le sketch Arduino avec arduino-cli
# -b : spécifie le type de carte (ici, Arduino Uno)
# --output-dir : définit le répertoire où les fichiers compilés seront placés
arduino-cli compile -b arduino:avr:uno --output-dir .tmp "$FOLDER"
if [ $? -ne 0 ]; then
    echo "Erreur lors de la compilation."
    exit 1
fi
printf '. done [Compilation réussie]\n'

# Vérifie le contenu du dossier .tmp après la compilation
echo "Contenu du dossier .tmp :"
ls -l .tmp

printf 'P3'
# Vérifie si le fichier .hex a été généré
HEX_FILE=".tmp/$FOLDER.ino.hex"
if [ -f "$HEX_FILE" ]; then
    # Copie le fichier .hex généré dans le dossier de construction
    cp "$HEX_FILE" "build/"
    printf '. done [fichier .hex copié]\n'
else
    echo "Erreur : le fichier .hex n'a pas été trouvé."
    echo "Fichiers présents dans .tmp :"
    ls -l .tmp
    exit 1
fi

printf 'P4'
# Vérifie et convertit le fichier ELF en .hex
# Le fichier ELF contient le code compilé exécutable,
# ici on utilise avr-objcopy pour convertir le fichier ELF en un format HEX
ELF_FILE=".tmp/$FOLDER.ino.elf"
if [ -f "$ELF_FILE" ]; then
    avr-objcopy -O ihex -R .eeprom "$ELF_FILE" "build/$FOLDER.hex"
    printf '. done [.hex]\n'
else
    echo "Erreur : le fichier ELF n'a pas été trouvé."
    exit 1
fi

# Demande à l'utilisateur s'il souhaite commencer le téléversement
printf "Voulez-vous commencer le téléversement ? [O\N]: "
read -r TELEV

if [[ $TELEV != 'O' && $TELEV != 'o' ]]; then
    printf "Bye bye\n"
    exit
else
    printf "Démarrage du téléversement \n"
    # Utilise avrdude pour téléverser le fichier .hex sur l'Arduino
    # -F : force l'opération
    # -V : désactive la vérification
    # -c : spécifie le programmateur
    # -p : spécifie le type de microcontrôleur
    # -P : spécifie le port de communication
    # -b : spécifie la vitesse de communication
    # -U : indique l'action à réaliser, ici le téléversement du fichier .hex
    avrdude -F -V -c arduino -p ATMEGA328P -P /dev/ttyACM0 -b 115200 -U flash:w:build/$FOLDER.hex
fi

exit
