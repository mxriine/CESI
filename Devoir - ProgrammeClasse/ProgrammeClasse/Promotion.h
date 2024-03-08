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
    Promotion();
    Promotion(string name, string type);

    void setName(string name);
    void setType(string type);
    string getName();
    string getType();

    void getStudent(Student* student, int taille);

    int moyenneAge();
    void show();
};