#pragma once

using namespace System;

ref class client
{
private:
    int id;
    String^ mdp;
    String^ nom;
    String^ prenom;
    String^ adresse;
    String^ mail;
    String^ tel;
    String^ ville;
    array<String^>^ panier;
public:
    client();
    //client();
    bool connect(String^, String^);
    bool create(String^, String^, String^, String^, String^);
    void retreive();
    void facturer();
    void acheter();

    String^ getnom();
    String^ getprenom();
    String^ getmail();
    String^ getmdp();
    String^ gettel();
    String^ getadresse();
    String^ getville();
    void setnom(String^ n);
    void setprenom(String^ p);
    void setmail(String^ m);
    void setmdp(String^ md);
    void settel(String^ t);
    void setadresse(String^ a);
    void setville(String^ v);
};