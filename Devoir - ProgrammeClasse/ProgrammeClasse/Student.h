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
	Student();
	Student(string name, string surname, int years);

	void setName(string name);
	void setSurname(string surname);
	void setYears(int years);
	string getName();
	string getSurname();
	int getYears();

	int getAge();

	void show();
};