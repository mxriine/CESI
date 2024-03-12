#pragma once
#include <iostream>
#include <string>

using namespace std;

class Student {
protected:
	string name;
	string surname;
	int years;

public:
	//Constructeur
	Student();
	Student(string name, string surname, int years);

	//Methode Mutateur definit/modifie les valeurs
	void setName(string name);
	void setSurname(string surname);
	void setYears(int years);

	//Methode Accesseur montre les valeurs
	string getName();
	string getSurname();
	int getYears();

	int getAge();

	void show();
};