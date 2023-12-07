#pragma once

using namespace System;
ref class article
{
private:
    int ref;
    String^ nom;
    String^ qt;
    int prixTTC;
public:
    article();
    void retreive();

};