#pragma once
using namespace System;

ref class article
{
private:
    int ref;
    String^ nom;
    int qt;
    String^ nature;
    double prixHT;
    double rea;
    double tauxTVA;
    double variation;
    String^ lienImage;

public:
    article();
    void setref(int);
    int getref();
    void setnom(String^);
    String^ getnom();
    void setqt(int);
    int getqt();
    void setnature(String^);
    String^ getnature();
    void setprixHT(double);
    double getprixHT();
    void setrea(double);
    double getrea();
    void settauxTVA(double);
    double gettauxTVA();
    void setvariation(double);
    double getvariation();
    void setlienImage(String^);
    String^ getlienImage();
};