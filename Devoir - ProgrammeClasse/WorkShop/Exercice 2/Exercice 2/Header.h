#pragma once

class CLcalcul {
private:
    int n;
    void ini(int);
    static int cpteObj;

public:
    CLcalcul();
    CLcalcul(int);
    void carre();
    void setN(int);
    int getN();
};
