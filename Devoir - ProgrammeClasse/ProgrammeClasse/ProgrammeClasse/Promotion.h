#pragma once
#include <iostream>
#include <string>

#include "Student.h"

using namespace std;

class Promotion : public Student {
protected:
    string name;
    string type;
    int size; // Pour stocker la taille de la liste des étudiants

    Student* student;

public:
    // Constructeur
    Promotion();
    Promotion(string name, string type);

    // Methode Mutateur definit/modifie les valeurs
    void setName(string name);
    void setType(string type);

    // Methode Accesseur montre les valeurs
    string getName();
    string getType();

    void getStudent(Student* student, int taille);

    int moyenneAge();
    void show();
};