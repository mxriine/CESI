#pragma once

#include "Client.h"
#include "Article.h"

//#include <vector>
//#include <list>

using namespace System::Collections::Generic;
using namespace System::Data::SqlClient;
using namespace System::Windows::Forms;

using namespace std;

public ref class GlobalData
{
public:
    static client^ myClient = gcnew client();

    static client^ GetMyClient()
    {
        return myClient;
    }

    static void SetMyClient(client^ newClient)
    {
        myClient = newClient;
    }

    static List<article^>^ GetArticles()
    {
        List<article^>^ articles = gcnew List<article^>();

        String^ connection = "Data Source=LAPTOP-SEAN\\SQLEXPRESS01;Initial Catalog=xshop;Integrated Security=True; Encrypt=False";
        SqlConnection^ connexion = gcnew SqlConnection(connection);

        try {
            connexion->Open();
            String^ query = "SELECT * FROM article";
            SqlCommand^ sqlCommand = gcnew SqlCommand(query, connexion);
            SqlDataReader^ reader = sqlCommand->ExecuteReader();
            while (reader->Read())
            {
                article^ Article = gcnew article();
                Article->setref(safe_cast<int>(reader["ref"]));
                Article->setnom(safe_cast<String^>(reader["nom"]));
                Article->setqt(safe_cast<int>(reader["qt"]));
                Article->setnature(safe_cast<String^>(reader["nature"]));
                Article->setprixHT(safe_cast<double>(reader["prixHT"]));
                Article->setrea(safe_cast<double>(reader["rea"]));
                Article->settauxTVA(safe_cast<double>(reader["tauxTVA"]));
                Article->setvariation(safe_cast<double>(reader["variation"]));
                Article->setlienImage(safe_cast<String^>(reader["lienImage"]));
                articles->Add(Article);
            }
        }
        catch (Exception^ ex) {
            // Gérer les exceptions ici
            Console::WriteLine(ex->Message);
        }
        return articles;
    }
};