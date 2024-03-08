#include "Student.h"

Student::Student() {
	name = "Marine";
	surname = "Mazou";
	years = 2004;
}

Student::Student(string name, string surname, int years) {
	this->name = name;
	this->surname = surname;
	this->years = years;
}

void Student::setName(string name) {
	this->name = name;
}

void Student::setSurname(string surname) {
	this->surname = surname;
}

void Student::setYears(int years) {
	this->years = years;
}

string Student::getName() {
	return name;
}

string Student::getSurname() {
	return surname;
}

int Student::getYears() {
	return years;
}

int Student::getAge() {
	return 2024 - years;
}

void Student::show() {
	cout << "Name: " << name << endl;
	cout << "Surname: " << surname << endl;
	cout << "Years : " << years << endl;
	cout << "Age: " << getAge() << " ans" << endl;
}