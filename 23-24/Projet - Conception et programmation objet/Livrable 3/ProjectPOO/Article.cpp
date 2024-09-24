#include "Article.h"

article::article()
{

}

void article::setref(int a)
{
	ref = a;
}

int article::getref()
{
	return ref;
}

void article::setnom(String^ a)
{
	nom = a;
}

String^ article::getnom()
{
	return nom;
}

void article::setqt(int a)
{
	qt = a;
}

int article::getqt()
{
	return qt;
}

void article::setnature(String^ a)
{
	nature = a;
}

String^ article::getnature()
{
	return nature;
}

void article::setprixHT(double a)
{
	prixHT = a;
}

double article::getprixHT()
{
	return prixHT;
}

void article::setrea(double a)
{
	rea = a;
}

double article::getrea()
{
	return rea;
}

void article::settauxTVA(double a)
{
	tauxTVA = a;
}

double article::gettauxTVA()
{
	return tauxTVA;
}

void article::setvariation(double a)
{
	variation = a;
}

double article::getvariation()
{
	return variation;
}

void article::setlienImage(String^ a)
{
	lienImage = a;
}

String^ article::getlienImage()
{
	return lienImage;
}
