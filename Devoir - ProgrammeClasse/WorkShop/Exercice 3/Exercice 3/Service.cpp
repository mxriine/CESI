#include "Service.h"
#include <iostream>

void Service::utiliserComposantA(ComposantA& compA) {
    std::cout << "Utilisation de Composant A dans le service." << std::endl;
    compA.fonctionnaliteA();
}

void Service::utiliserComposantB(ComposantB& compB) {
    std::cout << "Utilisation de Composant B dans le service." << std::endl;
    compB.fonctionnaliteB();
}
