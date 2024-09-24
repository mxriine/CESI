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
        Student student[20] = {
            Student("Leonardo", "DiCaprio", 1974),
            Student("Meryl", "Streep", 1949),
            Student("Tom", "Hanks", 1956),
            Student("Jennifer", "Lawrence", 1990),
            Student("Denzel", "Washington", 1954),
            Student("Cate", "Blanchett", 1969),
            Student("Ryan", "Gosling", 1980),
            Student("Emma", "Stone", 1988),
            Student("Jake", "Gyllenhaal", 1980),
            Student("Sandra", "Bullock", 1964),
            Student("Brad", "Pitt", 1963),
            Student("Angelina", "Jolie", 1975),
            Student("Johnny", "Depp", 1963),
            Student("Scarlett", "Johansson", 1984),
            Student("Morgan", "Freeman", 1937),
            Student("Nicole", "Kidman", 1967),
            Student("Hugh", "Jackman", 1968),
            Student("Natalie", "Portman", 1981),
            Student("Christian", "Bale", 1974),
            Student("Anne", "Hathaway", 1982)
        };

        informatique->getStudent(student, 20);

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
        Student student[12] = {
            Student("Cate", "Blanchett", 1969),
            Student("Ryan", "Gosling", 1980),
            Student("Emma", "Stone", 1988),
            Student("Jake", "Gyllenhaal", 1980),
            Student("Sandra", "Bullock", 1964),
            Student("Natalie", "Portman", 1981),
            Student("Chris", "Hemsworth", 1983),
            Student("Anne", "Hathaway", 1982),
            Student("Hugh", "Jackman", 1968),
            Student("Viola", "Davis", 1965),
            Student("Bradley", "Cooper", 1975),
            Student("Margot", "Robbie", 1990)
        };

        biologie->getStudent(student, 12);

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
        Student student[15] = {
            Student("Brad", "Pitt", 1963),
            Student("Angelina", "Jolie", 1975),
            Student("Johnny", "Depp", 1963),
            Student("Scarlett", "Johansson", 1984),
            Student("Morgan", "Freeman", 1937),
            Student("Leonardo", "DiCaprio", 1974),
            Student("Jennifer", "Lawrence", 1990),
            Student("Tom", "Hanks", 1956),
            Student("Julia", "Roberts", 1967),
            Student("Denzel", "Washington", 1954),
            Student("Sandra", "Bullock", 1964),
            Student("Will", "Smith", 1968),
            Student("Meryl", "Streep", 1949),
            Student("Robert", "Downey Jr.", 1965),
            Student("Nicole", "Kidman", 1967)
        };

        mathematiques->getStudent(student, 15);

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