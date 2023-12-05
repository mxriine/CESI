#include "client.h"
using namespace System::Windows::Forms;
client::client()
{
    MessageBox::Show("onest la");
}

void client::connect()
{
    throw gcnew System::NotImplementedException();
}

void client::create()
{
    throw gcnew System::NotImplementedException();
}

void client::retreive()
{
    throw gcnew System::NotImplementedException();
}

void client::facturer()
{
    throw gcnew System::NotImplementedException();
}

void client::acheter()
{
    throw gcnew System::NotImplementedException();
}

String^ client::getnom()
{
    return nom;
    // TODO: insérer une instruction return ici
}

String^ client::getprenom()
{
    return prenom;
    // TODO: insérer une instruction return ici
}

String^ client::getmail()
{
    return mail;    // TODO: insérer une instruction return ici
}

String^ client::getmdp()
{
    return mdp;    // TODO: insérer une instruction return ici
}

String^ client::gettel()
{
    return tel;    // TODO: insérer une instruction return ici
}

String^ client::getadresse()
{
    return adresse;    // TODO: insérer une instruction return ici
}

String^ client::getville()
{
    return ville;    // TODO: insérer une instruction return ici
}

void client::setnom(String^ n)
{
    nom = n;
}

void client::setprenom(String^ p)
{
    prenom = p;
}

void client::setmail(String^ m)
{
    mail = m;
}

void client::setmdp(String^ md)
{
    mdp = md;
}

void client::settel(String^ t)
{
    tel = t;
}

void client::setadresse(String^ a)
{
    adresse = a;
}

void client::setville(String^ v)
{
    ville = v;
}
