#pragma once
#include "Client.h"
#include "GlobalData.h"

#include <iostream>
#include <fstream>
#include <vcclr.h>

namespace ProjetPOO {

	using namespace System::Data::SqlClient;
	using namespace System;
	using namespace System::IO;
	using namespace System::ComponentModel;
	using namespace System::Collections;
	using namespace System::Windows::Forms;
	using namespace System::Data;
	using namespace System::Drawing;

	/// <summary>
	/// Description résumée de finalizationWindow
	/// </summary>
	public ref class finalizationWindow : public System::Windows::Forms::Form
	{
	public:
		client^ myClient = GlobalData::GetMyClient();
	public:
		finalizationWindow(void)
		{
			InitializeComponent();
			//
			//TODO: ajoutez ici le code du constructeur
			//
		}

	protected:
		/// <summary>
		/// Nettoyage des ressources utilisées.
		/// </summary>
		~finalizationWindow()
		{
			if (components)
			{
				delete components;
			}
		}
	private: System::Windows::Forms::Label^ textAdresseL;
	protected:
	private: System::Windows::Forms::Label^ textVille;
	private: System::Windows::Forms::Label^ textAdresseFacturation;
	private: System::Windows::Forms::TextBox^ shippingAdress;
	private: System::Windows::Forms::TextBox^ city;
	private: System::Windows::Forms::TextBox^ bankInfo;
	private: System::Windows::Forms::Button^ buy;




	private:
		/// <summary>
		/// Variable nécessaire au concepteur.
		/// </summary>
		System::ComponentModel::Container^ components;

#pragma region Windows Form Designer generated code
		/// <summary>
		/// Méthode requise pour la prise en charge du concepteur - ne modifiez pas
		/// le contenu de cette méthode avec l'éditeur de code.
		/// </summary>
		void InitializeComponent(void)
		{
			this->textAdresseL = (gcnew System::Windows::Forms::Label());
			this->textVille = (gcnew System::Windows::Forms::Label());
			this->textAdresseFacturation = (gcnew System::Windows::Forms::Label());
			this->shippingAdress = (gcnew System::Windows::Forms::TextBox());
			this->city = (gcnew System::Windows::Forms::TextBox());
			this->bankInfo = (gcnew System::Windows::Forms::TextBox());
			this->buy = (gcnew System::Windows::Forms::Button());
			this->SuspendLayout();
			// 
			// textAdresseL
			// 
			this->textAdresseL->AutoSize = true;
			this->textAdresseL->Location = System::Drawing::Point(109, 121);
			this->textAdresseL->Name = L"textAdresseL";
			this->textAdresseL->Size = System::Drawing::Size(106, 16);
			this->textAdresseL->TabIndex = 0;
			this->textAdresseL->Text = L"Shipping Adress";
			// 
			// textVille
			// 
			this->textVille->AutoSize = true;
			this->textVille->Location = System::Drawing::Point(147, 197);
			this->textVille->Name = L"textVille";
			this->textVille->Size = System::Drawing::Size(29, 16);
			this->textVille->TabIndex = 1;
			this->textVille->Text = L"City";
			// 
			// textAdresseFacturation
			// 
			this->textAdresseFacturation->AutoSize = true;
			this->textAdresseFacturation->Location = System::Drawing::Point(89, 284);
			this->textAdresseFacturation->Name = L"textAdresseFacturation";
			this->textAdresseFacturation->Size = System::Drawing::Size(157, 16);
			this->textAdresseFacturation->TabIndex = 2;
			this->textAdresseFacturation->Text = L"Bank Account Information";
			// 
			// shippingAdress
			// 
			this->shippingAdress->Location = System::Drawing::Point(71, 148);
			this->shippingAdress->Name = L"shippingAdress";
			this->shippingAdress->Size = System::Drawing::Size(182, 22);
			this->shippingAdress->TabIndex = 3;
			// 
			// city
			// 
			this->city->Location = System::Drawing::Point(69, 226);
			this->city->Name = L"city";
			this->city->Size = System::Drawing::Size(194, 22);
			this->city->TabIndex = 4;
			// 
			// bankInfo
			// 
			this->bankInfo->Location = System::Drawing::Point(75, 313);
			this->bankInfo->Name = L"bankInfo";
			this->bankInfo->Size = System::Drawing::Size(179, 22);
			this->bankInfo->TabIndex = 5;
			// 
			// buy
			// 
			this->buy->Location = System::Drawing::Point(131, 383);
			this->buy->Name = L"buy";
			this->buy->Size = System::Drawing::Size(75, 23);
			this->buy->TabIndex = 6;
			this->buy->Text = L"Finish";
			this->buy->UseVisualStyleBackColor = true;
			this->buy->Click += gcnew System::EventHandler(this, &finalizationWindow::buy_Click);
			// 
			// finalizationWindow
			// 
			this->AutoScaleDimensions = System::Drawing::SizeF(8, 16);
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::Font;
			this->ClientSize = System::Drawing::Size(337, 485);
			this->Controls->Add(this->buy);
			this->Controls->Add(this->bankInfo);
			this->Controls->Add(this->city);
			this->Controls->Add(this->shippingAdress);
			this->Controls->Add(this->textAdresseFacturation);
			this->Controls->Add(this->textVille);
			this->Controls->Add(this->textAdresseL);
			this->Name = L"finalizationWindow";
			this->Text = L"finalizationWindow";
			this->ResumeLayout(false);
			this->PerformLayout();

		}
#pragma endregion

	private: System::Void buy_Click(System::Object^ sender, System::EventArgs^ e) {
		myClient->setadresseL(shippingAdress->Text);
		myClient->setville(city->Text);
		myClient->setadresseF(bankInfo->Text);
		uploadToDB();
		genererFacture();
		MessageBox::Show("Thanks for buying !");
		this->Close();
	}

	public:
		void uploadToDB()
		{
			List<article^>^ totalArticles = GlobalData::GetArticles();
			for each (article ^ Article in totalArticles)
			{
				for each (article ^ element in myClient->getCart())
				{
					if (element->getref() == Article->getref())
					{
						Article->setqt(Article->getqt() - element->getqt());

						//
						String^ connection = "Data Source=LAPTOP-SEAN\\SQLEXPRESS01;Initial Catalog=xshop;Integrated Security=True; Encrypt=False";
						SqlConnection^ connexion = gcnew SqlConnection(connection);
						try {
							connexion->Open();
							String^ query = "UPDATE article SET qt = " + Article->getqt() + " WHERE ref = " + Article->getref();
							SqlCommand^ sqlCommand = gcnew SqlCommand(query, connexion);
							sqlCommand->ExecuteNonQuery();
						}
						catch (SqlException^ lol) {
							MessageBox::Show(lol->Message);
							connexion->Close();
						}

					}
				}
			}

			String^ connection = "Data Source=LAPTOP-SEAN\\SQLEXPRESS01;Initial Catalog=xshop;Integrated Security=True; Encrypt=False";
			SqlConnection^ connexion = gcnew SqlConnection(connection);
			try {
				connexion->Open();
				String^ query = "UPDATE client SET adresseL = @adresseL, adresseF = @adresseF, ville = @ville WHERE mail = @mail";
				SqlCommand^ sqlCommand = gcnew SqlCommand(query, connexion);
				sqlCommand->Parameters->AddWithValue("@adresseL", myClient->getadresseL());
				sqlCommand->Parameters->AddWithValue("@adresseF", myClient->getadresseF());
				sqlCommand->Parameters->AddWithValue("@ville", myClient->getville());
				sqlCommand->Parameters->AddWithValue("@mail", myClient->getmail());
				sqlCommand->Parameters->AddWithValue("@mdp", myClient->getmdp());
				sqlCommand->ExecuteNonQuery();

				connexion->Close();
			}
			catch (SqlException^ lol) {
				MessageBox::Show(lol->Message);
				connexion->Close();
			}
		}
		void genererFacture()
		{
			double totalPrice = 0;
			String^ cf;
			SaveFileDialog^ saveFileDialog1 = gcnew SaveFileDialog();
			saveFileDialog1->FileName = "facture.txt";
			saveFileDialog1->Filter = "Fichiers texte (.txt)|.txt|Tous les fichiers (.)|.";
			saveFileDialog1->Title = "Enregistrer la facture";
			if (saveFileDialog1->ShowDialog() == System::Windows::Forms::DialogResult::OK) {
				cf = saveFileDialog1->FileName;
			}
			else {
				MessageBox::Show("Please choose a path for the ticket");
			}

			std::ofstream fichier("facture.txt");
			try {
				StreamWriter^ writer = gcnew StreamWriter(cf);
				writer->WriteLine("#######################################");
				writer->WriteLine("######                           ######");
				writer->WriteLine("######           SMODZ           ######");
				writer->WriteLine("######                           ######");
				writer->WriteLine("#######################################");
				writer->WriteLine("\n");
				writer->WriteLine("SAV : 0785133089");
				writer->WriteLine("SMODZ SAS Europe");
				writer->WriteLine("SIRET : 678673627843");
				writer->WriteLine("\n");
				writer->WriteLine("#######################################  Client Infos  #######################################");
				writer->WriteLine("\n");
				writer->WriteLine("Last name : " + myClient->getnom());
				writer->WriteLine("Name : " + myClient->getprenom());
				writer->WriteLine("Adress : " + myClient->getadresseL());
				writer->WriteLine("City : " + myClient->getville());
				writer->WriteLine("Phone number : " + myClient->gettel());
				writer->WriteLine("Bank account infos: " + myClient->getadresseF());
				writer->WriteLine("\n");
				writer->WriteLine("#######################################  Cart  #######################################");
				for each (article ^ Article in myClient->getCart())
				{
					writer->WriteLine("\n");
					writer->WriteLine("Name : " + Article->getnom());
					writer->WriteLine("Price (without taxes): " + Article->getprixHT() + " €");
					writer->WriteLine("Price (tax included): " + Convert::ToDouble(Article->getprixHT()) * (1 + Convert::ToDouble(Article->gettauxTVA()) / 100) + " €");
					writer->WriteLine("TVA: " + Article->gettauxTVA() + " %");
					writer->WriteLine("Quantity : " + Article->getqt());
				}
				writer->WriteLine("\n");
				writer->WriteLine("#######################################  Total Price  #######################################");
				for each (article ^ Article in myClient->getCart())
				{
					totalPrice += Convert::ToDouble(Article->getprixHT()) * (1 + Convert::ToDouble(Article->gettauxTVA()) / 100) * Convert::ToInt32(Article->getqt());
				}
				writer->WriteLine("\n");
				writer->WriteLine("Price : " + totalPrice.ToString() + " €");
				// Fermeture du StreamWriter
				writer->Close();

				Console::WriteLine("Texte écrit dans le fichier avec succès !");
			}
			catch (Exception^ e) {
				Console::WriteLine("Erreur : " + e->Message);
			}
		}

	};
}