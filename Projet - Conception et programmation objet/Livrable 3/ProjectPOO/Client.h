#pragma once
#include "Article.h"

using namespace System;
using namespace System::Collections::Generic;

ref class client
{
private:
    int id;
    String^ mdp;
    String^ nom;
    String^ prenom;
    String^ adresseL;
    String^ adresseF;
    String^ mail;
    String^ tel;
    String^ ville;
    List<article^>^ panier;

public:
    client();
    bool connect(String^, String^);
    bool create(String^, String^, String^, String^, String^);
    void retreive();
    void facturer();
    void acheter();
    void addToCart(article^);
    List<article^>^ getCart();
    void removeFromCart(int);

    String^ getnom();
    String^ getprenom();
    String^ getmail();
    String^ getmdp();
    String^ gettel();
    String^ getadresseL();
    String^ getadresseF();
    String^ getville();
    void setnom(String^ n);
    void setprenom(String^ p);
    void setmail(String^ m);
    void setmdp(String^ md);
    void settel(String^ t);
    void setadresseL(String^ a);
    void setadresseF(String^ a);
    void setville(String^ v);
};