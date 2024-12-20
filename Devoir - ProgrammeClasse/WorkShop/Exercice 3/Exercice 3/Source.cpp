#include <iostream>
#include "Service.h"
#include "ComposantA.h"
#include "ComposantB.h"

int main() {
    Service service;

    ComposantA compA;
    ComposantB compB;

    // Utilisation des composants dans le service
    service.utiliserComposantA(compA);
    service.utiliserComposantB(compB);

    return 0;
}
