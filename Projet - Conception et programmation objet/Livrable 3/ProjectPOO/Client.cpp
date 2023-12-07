#include "Client.h"

using namespace System::Data::SqlClient;
using namespace System::Windows::Forms;

client::client()
{
    //MessageBox::Show("here");
    //throw gcnew System::NotImplementedException();
}

bool client::connect(String^ mail, String^ mdp)
{
    String^ connection = "Data Source=CACAHUETE;Initial Catalog=POO;Integrated Security=True;Encrypt=False";
    SqlConnection^ connexion = gcnew SqlConnection(connection);
    try {

        connexion->Open();
        MessageBox::Show("Connected");
        String^ command = "SELECT * FROM client WHERE mail='" + mail + "'" + " AND mdp='" + mdp + "';";
        SqlCommand^ sqlCommand = gcnew SqlCommand(command, connexion);
        SqlDataReader^ reader;
        reader = sqlCommand->ExecuteReader();
        if (reader->Read()) {
            connexion->Close();
            return 1;
        }
        else {
            MessageBox::Show("Adresse e-mail ou mot de passe incorrect.");
            connexion->Close();
            return 0;
        }
    }
    catch (SqlException^ lol) {
        MessageBox::Show(lol->Message);
        connexion->Close();
        return 0;

        //throw gcnew System::NotImplementedException();
    }
    finally {
        connexion->Close();
    }
}

bool client::create(String^ Cmail, String^ Cmdp, String^ Cname, String^ Clastname, String^ Ctel)
{
    mail = Cmail;
    mdp = Cmdp;
    prenom = Cname;
    nom = Clastname;
    tel = Ctel;

    String^ connection = "Data Source=LAPTOP-SEAN\\SQLEXPRESS01;Initial Catalog=xshop;Integrated Security=True; Encrypt=False";
    SqlConnection^ connexion = gcnew SqlConnection(connection);
    try {
        connexion->Open();
        String^ command1 = "INSERT INTO client(nom,prenom,mail,mdp,tel,adresse,ville) VALUES";
        String^ command2 = "('" + nom + "','" + prenom + "','" + mail + "','" + mdp + "','" + tel + "','" + adresse + "','" + ville + "')";
        String^ command = command1 + command2;
        SqlCommand^ sqlcommand = gcnew SqlCommand(command, connexion);
        sqlcommand->ExecuteNonQuery();
        MessageBox::Show("Commande SQL exécutée avec succès !");
        connexion->Close();
        return 1;
    }
    catch (SqlException^ lol) {
        MessageBox::Show(lol->Message);
        connexion->Close();
        return 0;
    }

    //throw gcnew System::NotImplementedException();
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
