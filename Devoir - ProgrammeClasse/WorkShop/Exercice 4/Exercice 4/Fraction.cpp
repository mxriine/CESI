#include "Fraction.h"

Fraction::Fraction() {
    numerator = 0;
    denominator = 1;
}

Fraction::Fraction(int n, int d) {
    numerator = n;
    denominator = d;
}

int Fraction::add(int n, int d) {
    return n + d;
}

int Fraction::sub(int n, int d) {
    return n - d;
}

int Fraction::mul(int n, int d) {
    return n * d;
}

int Fraction::div(int n, int d) {
    return n / d;
}
