# CXX et CXXFLAGS
CXX = clang++
CXXFLAGS = -std=c++17 -Wall -Wextra -Werror -Wpedantic -Wno-unused-parameter -Wno-unused-variable -Wno-unused-function -Wno-unused-private-field

# Liste des fichiers sources et headers manuellement (vous pouvez ajouter d'autres fichiers à la main)
SRCS = main.cpp src/ *.cpp
HEADERS = include/ *.h

# Cible principale
all: main

# Construction de main.exe
main: $(SRCS) $(HEADERS)
	$(CXX) $(CXXFLAGS) $(SRCS) -o "$@"

# Construction en mode debug (sans optimisations)
main-debug: $(SRCS) $(HEADERS)
	$(CXX) $(CXXFLAGS) -U_FORTIFY_SOURCE -O0 $(SRCS) -o "$@"

# Nettoyage des exécutables
clean:
	del /Q main.exe main-debug.exe
