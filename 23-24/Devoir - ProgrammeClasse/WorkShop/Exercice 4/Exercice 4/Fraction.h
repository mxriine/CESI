#pragma once

class Fraction {
private:
    int numerator;
    int denominator;

public:
    Fraction();
    Fraction(int numerator, int denominator);
    int add(int n, int d);
    int sub(int n, int d);
    int mul(int n, int d);
    int div(int n, int d);
};
