// Assurez-vous d'inclure les espaces de noms nécessaires au début de votre fichier

using namespace System;
using namespace System::ComponentModel;
using namespace System::Windows::Forms;
using namespace System::Data;
using namespace System::Data::SqlClient;

namespace Prosir6 {

    public ref class MyForm : public System::Windows::Forms::Form {
    public:
        MyForm(void) {
            InitializeComponent();
        }

    protected:
        ~MyForm() {
            if (components) {
                delete components;
            }
        }

    private: System::Windows::Forms::Button^ button1;
    private: System::Windows::Forms::Label^ label1;
    private: System::Windows::Forms::Label^ label2;
    private: System::Windows::Forms::DataGridView^ dataGridView1;
    private: System::Windows::Forms::Button^ Select;

    private: System::Windows::Forms::TextBox^ textBox1;

    private:
        String^ command = "";
    private: System::Windows::Forms::Button^ button3;


    private: System::Windows::Forms::Button^ modificateur;
    private: System::Windows::Forms::TextBox^ textBox2;
    private: System::Windows::Forms::Button^ button2;
           System::ComponentModel::Container^ components;

#pragma region Windows Form Designer generated code
           void InitializeComponent(void) {
               this->button1 = (gcnew System::Windows::Forms::Button());
               this->label1 = (gcnew System::Windows::Forms::Label());
               this->label2 = (gcnew System::Windows::Forms::Label());
               this->dataGridView1 = (gcnew System::Windows::Forms::DataGridView());
               this->Select = (gcnew System::Windows::Forms::Button());
               this->textBox1 = (gcnew System::Windows::Forms::TextBox());
               this->button3 = (gcnew System::Windows::Forms::Button());
               this->modificateur = (gcnew System::Windows::Forms::Button());
               this->textBox2 = (gcnew System::Windows::Forms::TextBox());
               this->button2 = (gcnew System::Windows::Forms::Button());
               (cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->dataGridView1))->BeginInit();
               this->SuspendLayout();
               // 
               // button1
               // 
               this->button1->Location = System::Drawing::Point(26, 329);
               this->button1->Name = L"button1";
               this->button1->Size = System::Drawing::Size(131, 57);
               this->button1->TabIndex = 0;
               this->button1->Text = L"Afficher les données";
               this->button1->UseVisualStyleBackColor = true;
               this->button1->Click += gcnew System::EventHandler(this, &MyForm::button1_Click);
               // 
               // label1
               // 
               this->label1->AutoSize = true;
               this->label1->Location = System::Drawing::Point(440, 362);
               this->label1->Name = L"label1";
               this->label1->Size = System::Drawing::Size(0, 20);
               this->label1->TabIndex = 1;
               // 
               // label2
               // 
               this->label2->AutoSize = true;
               this->label2->Location = System::Drawing::Point(684, 329);
               this->label2->Name = L"label2";
               this->label2->Size = System::Drawing::Size(0, 20);
               this->label2->TabIndex = 2;
               // 
               // dataGridView1
               // 
               this->dataGridView1->ColumnHeadersHeightSizeMode = System::Windows::Forms::DataGridViewColumnHeadersHeightSizeMode::AutoSize;
               this->dataGridView1->Location = System::Drawing::Point(12, 1);
               this->dataGridView1->Name = L"dataGridView1";
               this->dataGridView1->RowHeadersWidth = 62;
               this->dataGridView1->RowTemplate->Height = 28;
               this->dataGridView1->Size = System::Drawing::Size(860, 314);
               this->dataGridView1->TabIndex = 3;
               this->dataGridView1->CellContentClick += gcnew System::Windows::Forms::DataGridViewCellEventHandler(this, &MyForm::dataGridView1_CellContentClick);
               // 
               // Select
               // 
               this->Select->Location = System::Drawing::Point(193, 335);
               this->Select->Name = L"Select";
               this->Select->Size = System::Drawing::Size(148, 51);
               this->Select->TabIndex = 4;
               this->Select->Text = L"Sélectionner dans la table";
               this->Select->UseVisualStyleBackColor = true;
               this->Select->Click += gcnew System::EventHandler(this, &MyForm::button2_Click);
               // 
               // textBox1
               // 
               this->textBox1->Anchor = static_cast<System::Windows::Forms::AnchorStyles>((((System::Windows::Forms::AnchorStyles::Top | System::Windows::Forms::AnchorStyles::Bottom)
                   | System::Windows::Forms::AnchorStyles::Left)
                   | System::Windows::Forms::AnchorStyles::Right));
               this->textBox1->Location = System::Drawing::Point(701, 455);
               this->textBox1->Name = L"textBox1";
               this->textBox1->Size = System::Drawing::Size(310, 26);
               this->textBox1->TabIndex = 5;
               this->textBox1->Visible = false;
               this->textBox1->TextChanged += gcnew System::EventHandler(this, &MyForm::textBox1_TextChanged);
               // 
               // button3
               // 
               this->button3->Location = System::Drawing::Point(924, 487);
               this->button3->Name = L"button3";
               this->button3->Size = System::Drawing::Size(98, 53);
               this->button3->TabIndex = 6;
               this->button3->Text = L"Ok";
               this->button3->UseVisualStyleBackColor = true;
               this->button3->Visible = false;
               this->button3->Click += gcnew System::EventHandler(this, &MyForm::button3_Click);
               // 
               // modificateur
               // 
               this->modificateur->Location = System::Drawing::Point(430, 335);
               this->modificateur->Name = L"modificateur";
               this->modificateur->Size = System::Drawing::Size(128, 61);
               this->modificateur->TabIndex = 7;
               this->modificateur->Text = L"Modifier la table";
               this->modificateur->UseVisualStyleBackColor = true;
               this->modificateur->Click += gcnew System::EventHandler(this, &MyForm::modificateur_Click);
               // 
               // textBox2
               // 
               this->textBox2->Location = System::Drawing::Point(1074, 219);
               this->textBox2->Name = L"textBox2";
               this->textBox2->Size = System::Drawing::Size(205, 26);
               this->textBox2->TabIndex = 8;
               this->textBox2->Visible = false;
               // 
               // button2
               // 
               this->button2->Location = System::Drawing::Point(1255, 297);
               this->button2->Name = L"button2";
               this->button2->Size = System::Drawing::Size(86, 34);
               this->button2->TabIndex = 9;
               this->button2->Text = L"Ok";
               this->button2->UseVisualStyleBackColor = true;
               this->button2->Visible = false;
               this->button2->Click += gcnew System::EventHandler(this, &MyForm::button2_Click_1);
               // 
               // MyForm
               // 
               this->AutoScaleDimensions = System::Drawing::SizeF(9, 20);
               this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::Font;
               this->ClientSize = System::Drawing::Size(1835, 855);
               this->Controls->Add(this->button2);
               this->Controls->Add(this->textBox2);
               this->Controls->Add(this->modificateur);
               this->Controls->Add(this->button3);
               this->Controls->Add(this->textBox1);
               this->Controls->Add(this->Select);
               this->Controls->Add(this->dataGridView1);
               this->Controls->Add(this->label2);
               this->Controls->Add(this->label1);
               this->Controls->Add(this->button1);
               this->Name = L"MyForm";
               this->Text = L"MyForm";
               (cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->dataGridView1))->EndInit();
               this->ResumeLayout(false);
               this->PerformLayout();

           }
#pragma endregion

    private: System::Void button1_Click(System::Object^ sender, System::EventArgs^ e) {
        String^ connectionstring = "Data Source=NAVI\\SQLEXPRESS;Initial Catalog=prosit6;Integrated Security=True;Encrypt=False;";
        SqlConnection^ sqlConn = gcnew SqlConnection(connectionstring);

        try {
            sqlConn->Open();
            String^ Query = "SELECT * FROM client";

            SqlDataAdapter^ adapter = gcnew SqlDataAdapter(Query, sqlConn);
            DataTable^ table = gcnew DataTable();

            // Remplir la DataTable avec les résultats de la requête SQL
            adapter->Fill(table);

            // Lier la DataTable au DataGridView
            dataGridView1->DataSource = table;

            if (table->Rows->Count == 0) {
                this->label1->Text = "Aucun résultat trouvé.";
            }
        }
        catch (SqlException^ ex) {
            // Gérer les exceptions liées à la base de données
            MessageBox::Show("Erreur : " + ex->Message);
        }
        finally {
            sqlConn->Close();
        }
    };
    private: System::Void dataGridView1_CellContentClick(System::Object^ sender, System::Windows::Forms::DataGridViewCellEventArgs^ e) {
    }
    private: System::Void button2_Click(System::Object^ sender, System::EventArgs^ e) {
        textBox1->Visible = true;
        MessageBox::Show("Veuillez entrez votre commande Sql");
        button3->Visible = true;
        /* command = textBox1->Text;



             // Remplacer "VotreChaîneDeConnexion" par votre chaîne de connexion à la base de données
             String^ connectionString = "Data Source=NAVI\\SQLEXPRESS;Initial Catalog=prosit6;Integrated Security=True;Encrypt=False;";

             // Créer une connexion à la base de données
             SqlConnection^ connexion = gcnew SqlConnection(connectionString);

             try {
                 // Ouvrir la connexion
                 connexion->Open();

                 // Créer et exécuter la commande SQL
                 MessageBox::Show(command);
                 SqlCommand^ sqlCommand = gcnew SqlCommand(command, connexion);
                 sqlCommand->ExecuteNonQuery();

                 MessageBox::Show("Commande SQL exécutée avec succès !");
             }
             catch (SqlException^ ex) {
                 MessageBox::Show("Erreur lors de l'exécution de la commande SQL : " + ex->Message);
             }
             finally {
                 // Fermer la connexion
                 if (connexion->State == ConnectionState::Open) {
                     connexion->Close();
                 }
             }*/


    }

    private: System::Void textBox1_TextChanged(System::Object^ sender, System::EventArgs^ e) {
    }
    private: System::Void button3_Click(System::Object^ sender, System::EventArgs^ e) {
        command = textBox1->Text;



        String^ connectionString = "Data Source=NAVI\\SQLEXPRESS;Initial Catalog=prosit6;Integrated Security=True;Encrypt=False;";

        // Créer une connexion à la base de données
        SqlConnection^ connexion = gcnew SqlConnection(connectionString);

        try {
            // Ouvrir la connexion
            connexion->Open();

            // Créer et exécuter la commande SQL
            MessageBox::Show(command);
            SqlDataAdapter^ adapter = gcnew SqlDataAdapter(command, connexion);
            DataTable^ table = gcnew DataTable();

            // Remplir la DataTable avec les résultats de la requête SQL
            adapter->Fill(table);
            dataGridView1->DataSource = table;


            MessageBox::Show("Commande SQL exécutée avec succès !");
        }
        catch (SqlException^ ex) {
            MessageBox::Show("Erreur lors de l'exécution de la commande SQL : " + ex->Message);
        }
        finally {
            // Fermer la connexion
            if (connexion->State == ConnectionState::Open) {
                connexion->Close();
                textBox1->Visible = false;
                button3->Visible = false;
            }
        }
    }
    private: System::Void modificateur_Click(System::Object^ sender, System::EventArgs^ e) {
        textBox2->Visible = true;
        button2->Visible = true;

    }
    private: System::Void button2_Click_1(System::Object^ sender, System::EventArgs^ e) {
        command = textBox2->Text;
        String^ connectionString = "Data Source=NAVI\\SQLEXPRESS;Initial Catalog=prosit6;Integrated Security=True;Encrypt=False;";

        // Créer une connexion à la base de données
        SqlConnection^ connexion = gcnew SqlConnection(connectionString);
        connexion->Open();
        try {
            MessageBox::Show(command);
            SqlCommand^ sqlCommand = gcnew SqlCommand(command, connexion);
            sqlCommand->ExecuteNonQuery();
            MessageBox::Show("Commande SQL exécutée avec succès !");

        }
        catch (SqlException^ ax) {
            MessageBox::Show("Erreur lors de l'exécution de la commande SQL : " + ax->Message);
        
        }
        finally {
            if (connexion->State == ConnectionState::Open) {
                connexion->Close();
                textBox2->Visible = false;
                button2->Visible = false;
            }
        }
    }
};
}
