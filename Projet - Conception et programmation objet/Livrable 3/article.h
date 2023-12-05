#pragma once
using namespace System;
ref class article
{
private:
	String^ ref;
	String^ nom;
	String^ qt;
	String^ nature;
	String^ prixTTC;

public:
	article();
	void retreive();
	void setref(String^r);
	void setnom(String^n);
	void setqt(String^q);
	void setnature(String^na);
	void setprixttc(String^t);
	String^ getref();
	String^ getnom();
	String^ getqt();
	String^ getnature();
	String^ getprixttc();

};
 
