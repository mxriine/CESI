#include "Promotion.h"

Promotion::Promotion() {
    name = "Informatique";
    type = "Licence";
    student = nullptr; // Initialiser le pointeur à nullptr
    size = 0; // Initialisation de la taille à 0

}

Promotion::Promotion(string name, string type) {
    this->name = name;
    this->type = type;
    student = nullptr; // Initialiser le pointeur à nullptr
    size = 0;
}

void Promotion::setName(string name) {
    this->name = name;
}

void Promotion::setType(string type) {
    this->type = type;
}

string Promotion::getName() {
    return name;
}

string Promotion::getType() {
    return type;
}

void Promotion::getStudent(Student* student, int taille) {
    this->student = student;
    size = taille;
}

int Promotion::moyenneAge() {
    int totalAge = 0;
    for (int i = 0; i < size; i++) {
        totalAge += student[i].getAge();
    }
    return size != 0 ? totalAge / size : 0; // Éviter une division par zéro
}

void Promotion::show() {
    cout << "Nom: " << name << endl;
    cout << "Type: " << type << endl;
    cout << "Nombre d'etudiants: " << size << endl; // Afficher la taille de la liste des étudiants
    cout << " " << endl;
    cout << "Liste des etudiants: " << endl;
    cout << " " << endl;
    for (int i = 0; i < size; i++) {
        student[i].show();
        cout << endl;
    }
}