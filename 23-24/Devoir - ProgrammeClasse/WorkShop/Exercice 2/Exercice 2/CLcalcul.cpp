#include "header.h"

int CLcalcul::cpteObj = 0;

CLcalcul::CLcalcul() {
    ini(0);
}

CLcalcul::CLcalcul(int num) {
    ini(num);
}

void CLcalcul::ini(int num) {
    n = num;
    cpteObj++;
}

void CLcalcul::carre() {
    n *= n;
}

void CLcalcul::setN(int num) {
    n = num;
}

int CLcalcul::getN() {
    return n;
}
