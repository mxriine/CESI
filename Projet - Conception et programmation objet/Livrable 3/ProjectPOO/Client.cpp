#include "Client.h"
#include "Article.h"

using namespace System::Data::SqlClient;
using namespace System::Windows::Forms;

client::client()
{
    panier = gcnew List<article^>;
    //MessageBox::Show("here");
    //throw gcnew System::NotImplementedException();
}

bool client::connect(String^ mail, String^ mdp)
{
    String^ connection = "Data Source=CACAHUETE;Initial Catalog=POO;Integrated Security=True;Encrypt=False;";
    SqlConnection^ connexion = gcnew SqlConnection(connection);
    try {
        connexion->Open();
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

    String^ connection = "Data Source=CACAHUETE;Initial Catalog=POO;Integrated Security=True;Encrypt=False;";
    SqlConnection^ connexion = gcnew SqlConnection(connection);
    try {
        connexion->Open();
        String^ command1 = "INSERT INTO client(nom,prenom,mail,mdp,tel) VALUES";
        String^ command2 = "('" + nom + "','" + prenom + "','" + mail + "','" + mdp + "','" + tel + "')";
        String^ command = command1 + command2;
        SqlCommand^ sqlcommand = gcnew SqlCommand(command, connexion);
        sqlcommand->ExecuteNonQuery();
        connexion->Close();
        return 1;
    }
    catch (SqlException^ lol) {
        MessageBox::Show(lol->Message);
        connexion->Close();
        return 0;
    }
}

void client::retreive()
{
    String^ connection = "Data Source=CACAHUETE;Initial Catalog=POO;Integrated Security=True;Encrypt=False;";
    SqlConnection^ connexion = gcnew SqlConnection(connection);
    try {
        connexion->Open();
        String^ query = "SELECT * FROM client WHERE mail = @mail AND mdp = @mdp";
        SqlCommand^ sqlCommand = gcnew SqlCommand(query, connexion);

        // Ajouter les paramètres
        sqlCommand->Parameters->AddWithValue("@mail", mail);
        sqlCommand->Parameters->AddWithValue("@mdp", mdp);
        SqlDataReader^ reader = sqlCommand->ExecuteReader();
        while (reader->Read()) {
            nom = safe_cast<String^>(reader["nom"]);
            prenom = safe_cast<String^>(reader["prenom"]);
            tel = safe_cast<String^>(reader["tel"]);
        }

    }
    catch (Exception^ ex) {
        Console::WriteLine(ex->Message);
    }
    //throw gcnew System::NotImplementedException();
}

void client::facturer()
{
    throw gcnew System::NotImplementedException();
}

void client::acheter()
{
    throw gcnew System::NotImplementedException();
}

void client::addToCart(article^ lol)
{
    panier->Add(lol);
}

List<article^>^ client::getCart()
{
    //throw gcnew System::NotImplementedException();
    // TODO: insérer une instruction return ici
    return panier;
}

void client::removeFromCart(int ref)
{
    for (int i = 0; i < panier->Count; i++)
    {
        // Vérifie si la référence de l'article correspond
        if (panier[i]->getref() == ref)
        {
            // Supprime l'article du panier
            panier->RemoveAt(i);
            // Tu peux ajouter un code supplémentaire ici si nécessaire
            break; // Sort de la boucle après la suppression
        }
    }
    //throw gcnew System::NotImplementedException();

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

String^ client::getadresseL()
{
    //throw gcnew System::NotImplementedException();
    // TODO: insérer une instruction return ici
    return adresseL;
}

String^ client::getadresseF()
{
    //throw gcnew System::NotImplementedException();
    // TODO: insérer une instruction return ici
    return adresseF;
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

void client::setadresseL(String^ a)
{
    adresseL = a;
}

void client::setadresseF(String^ a)
{
    adresseF = a;
}

void client::setville(String^ v)
{
    ville = v;
}