#include <iostream>
#include "Student.h"
#include "Promotion.h"

using namespace std;

int main() {

    string input;
    string function;

    cout << "================================= PROMOTION  =================================" << endl;
    cout << "Quelle promotion voulez-vous afficher? (Informatique, Biologie, Mathematiques)" << endl;
    cout << " " << endl;
    cin >> input;

    if (input == "Informatique" || input == "Info") {
        Promotion* informatique = new Promotion("Informatique", "Licence");
        Student student[5] = {
            Student("Leonardo", "DiCaprio", 1974),
            Student("Meryl", "Streep", 1949),
            Student("Tom", "Hanks", 1956),
            Student("Jennifer", "Lawrence", 1990),
            Student("Denzel", "Washington", 1954)
        };

        informatique->getStudent(student, 5);

        cout << "============================== INFORMATIQUE ==============================" << endl;
        cout << " " << endl;
        informatique->show();

        cin >> function;

        if (function == "MOYENNE_AGE") {
            cout << " " << endl;
            cout << "-> Moyenne d'age: " << informatique->moyenneAge() << " ans" << endl;
        }
        else {
            cout << "Commande inconnue" << endl;
        }

        delete informatique;
    }
    else if (input == "Biologie" || input == "Bio") {
        Promotion* biologie = new Promotion("Biologie", "Licence");
        Student student[5] = {
            Student("Cate", "Blanchett", 1969),
            Student("Ryan", "Gosling", 1980),
            Student("Emma", "Stone", 1988),
            Student("Jake", "Gyllenhaal", 1980),
            Student("Sandra", "Bullock", 1964)
        };

        biologie->getStudent(student, 5);

        cout << "============================== BIOLOGIE ==============================" << endl;
        cout << " " << endl;
        biologie->show();

        cin >> function;

        if (function == "MOYENNE_AGE") {
            cout << " " << endl;
            cout << "-> Moyenne d'age: " << biologie->moyenneAge() << " ans" << endl;
        }
        else {
            cout << "Commande inconnue" << endl;
        }

        delete biologie;
    }
    else if (input == "Mathematiques" || input == "Math") {
        Promotion* mathematiques = new Promotion("Mathematiques", "Licence");
        Student student[5] = {
            Student("Brad", "Pitt", 1963),
            Student("Angelina", "Jolie", 1975),
            Student("Johnny", "Depp", 1963),
            Student("Scarlett", "Johansson", 1984),
            Student("Morgan", "Freeman", 1937)
        };

        mathematiques->getStudent(student, 5);

        cout << "============================== MATHEMATIQUES ==============================" << endl;
        cout << " " << endl;
        mathematiques->show();

        cin >> function;

        if (function == "MOYENNE_AGE") {
            cout << " " << endl;
            cout << "-> Moyenne d'age: " << mathematiques->moyenneAge() << " ans" << endl;
        }
        else {
            cout << "Commande inconnue" << endl;
        }

        delete mathematiques;
    }
    else {
        cout << "Promotion inconnue" << endl;
    }

    // Demande à l'utilisateur s'il veut changer de promotion
    cout << " " << endl;
    cout << "Voulez-vous voir une autre promotion? (Oui/Non)" << endl;
    cin >> input;

    if (input == "Oui" || input == "oui") {
        main();
    }
    else {
        cout << " " << endl;
        cout << "Au revoir!" << endl;
    }

    return 0;
}