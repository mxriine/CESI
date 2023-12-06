#pragma once
#include "GlobalData.h"
#include "client.h"

namespace ProjetPOO {

	using namespace System;
	using namespace System::ComponentModel;
	using namespace System::Collections;
	using namespace System::Windows::Forms;
	using namespace System::Data;
	using namespace System::Drawing;

	/// <summary>
	/// Description résumée de creationPage
	/// </summary>
	public ref class creationPage : public System::Windows::Forms::Form
	{
	public:
		client^ myClient = GlobalData::GetMyClient();
	public:
		creationPage(void)
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
		~creationPage()
		{
			if (components)
			{
				delete components;
			}
		}
	private: System::Windows::Forms::Label^ mailText;
	protected:
	private: System::Windows::Forms::Label^ passwordText;
	private: System::Windows::Forms::Label^ nameText;
	private: System::Windows::Forms::Label^ lastNameText;
	private: System::Windows::Forms::Label^ phoneText;
	private: System::Windows::Forms::TextBox^ mailTextBox;
	private: System::Windows::Forms::TextBox^ passwordTextBox;
	private: System::Windows::Forms::TextBox^ nameTextBox;
	private: System::Windows::Forms::TextBox^ lastNameTextBox;
	private: System::Windows::Forms::TextBox^ phoneTextBox;
	private: System::Windows::Forms::Button^ quit;
	private: System::Windows::Forms::Button^ create;


	private:
		/// <summary>
		/// Variable nécessaire au concepteur.
		/// </summary>
		System::ComponentModel::Container ^components;

#pragma region Windows Form Designer generated code
		/// <summary>
		/// Méthode requise pour la prise en charge du concepteur - ne modifiez pas
		/// le contenu de cette méthode avec l'éditeur de code.
		/// </summary>
		void InitializeComponent(void)
		{
			this->mailText = (gcnew System::Windows::Forms::Label());
			this->passwordText = (gcnew System::Windows::Forms::Label());
			this->nameText = (gcnew System::Windows::Forms::Label());
			this->lastNameText = (gcnew System::Windows::Forms::Label());
			this->phoneText = (gcnew System::Windows::Forms::Label());
			this->mailTextBox = (gcnew System::Windows::Forms::TextBox());
			this->passwordTextBox = (gcnew System::Windows::Forms::TextBox());
			this->nameTextBox = (gcnew System::Windows::Forms::TextBox());
			this->lastNameTextBox = (gcnew System::Windows::Forms::TextBox());
			this->phoneTextBox = (gcnew System::Windows::Forms::TextBox());
			this->quit = (gcnew System::Windows::Forms::Button());
			this->create = (gcnew System::Windows::Forms::Button());
			this->SuspendLayout();
			// 
			// mailText
			// 
			this->mailText->AutoSize = true;
			this->mailText->Location = System::Drawing::Point(123, 95);
			this->mailText->Name = L"mailText";
			this->mailText->Size = System::Drawing::Size(32, 16);
			this->mailText->TabIndex = 0;
			this->mailText->Text = L"Mail";
			// 
			// passwordText
			// 
			this->passwordText->AutoSize = true;
			this->passwordText->Location = System::Drawing::Point(88, 123);
			this->passwordText->Name = L"passwordText";
			this->passwordText->Size = System::Drawing::Size(67, 16);
			this->passwordText->TabIndex = 1;
			this->passwordText->Text = L"Password";
			// 
			// nameText
			// 
			this->nameText->AutoSize = true;
			this->nameText->Location = System::Drawing::Point(111, 154);
			this->nameText->Name = L"nameText";
			this->nameText->Size = System::Drawing::Size(44, 16);
			this->nameText->TabIndex = 2;
			this->nameText->Text = L"Name";
			// 
			// lastNameText
			// 
			this->lastNameText->AutoSize = true;
			this->lastNameText->Location = System::Drawing::Point(85, 179);
			this->lastNameText->Name = L"lastNameText";
			this->lastNameText->Size = System::Drawing::Size(72, 16);
			this->lastNameText->TabIndex = 3;
			this->lastNameText->Text = L"Last Name";
			// 
			// phoneText
			// 
			this->phoneText->AutoSize = true;
			this->phoneText->Location = System::Drawing::Point(111, 207);
			this->phoneText->Name = L"phoneText";
			this->phoneText->Size = System::Drawing::Size(46, 16);
			this->phoneText->TabIndex = 4;
			this->phoneText->Text = L"Phone";
			// 
			// mailTextBox
			// 
			this->mailTextBox->Location = System::Drawing::Point(163, 92);
			this->mailTextBox->Name = L"mailTextBox";
			this->mailTextBox->Size = System::Drawing::Size(180, 22);
			this->mailTextBox->TabIndex = 5;
			// 
			// passwordTextBox
			// 
			this->passwordTextBox->Location = System::Drawing::Point(163, 120);
			this->passwordTextBox->Name = L"passwordTextBox";
			this->passwordTextBox->Size = System::Drawing::Size(180, 22);
			this->passwordTextBox->TabIndex = 6;
			// 
			// nameTextBox
			// 
			this->nameTextBox->Location = System::Drawing::Point(163, 148);
			this->nameTextBox->Name = L"nameTextBox";
			this->nameTextBox->Size = System::Drawing::Size(180, 22);
			this->nameTextBox->TabIndex = 7;
			// 
			// lastNameTextBox
			// 
			this->lastNameTextBox->Location = System::Drawing::Point(163, 176);
			this->lastNameTextBox->Name = L"lastNameTextBox";
			this->lastNameTextBox->Size = System::Drawing::Size(180, 22);
			this->lastNameTextBox->TabIndex = 8;
			// 
			// phoneTextBox
			// 
			this->phoneTextBox->Location = System::Drawing::Point(163, 204);
			this->phoneTextBox->Name = L"phoneTextBox";
			this->phoneTextBox->Size = System::Drawing::Size(180, 22);
			this->phoneTextBox->TabIndex = 9;
			// 
			// quit
			// 
			this->quit->Location = System::Drawing::Point(163, 265);
			this->quit->Name = L"quit";
			this->quit->Size = System::Drawing::Size(75, 23);
			this->quit->TabIndex = 10;
			this->quit->Text = L"Quit";
			this->quit->UseVisualStyleBackColor = true;
			this->quit->Click += gcnew System::EventHandler(this, &creationPage::quit_Click);
			// 
			// create
			// 
			this->create->Location = System::Drawing::Point(268, 265);
			this->create->Name = L"create";
			this->create->Size = System::Drawing::Size(75, 23);
			this->create->TabIndex = 11;
			this->create->Text = L"Create";
			this->create->UseVisualStyleBackColor = true;
			this->create->Click += gcnew System::EventHandler(this, &creationPage::create_Click);
			// 
			// creationPage
			// 
			this->AutoScaleDimensions = System::Drawing::SizeF(8, 16);
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::Font;
			this->ClientSize = System::Drawing::Size(484, 356);
			this->Controls->Add(this->create);
			this->Controls->Add(this->quit);
			this->Controls->Add(this->phoneTextBox);
			this->Controls->Add(this->lastNameTextBox);
			this->Controls->Add(this->nameTextBox);
			this->Controls->Add(this->passwordTextBox);
			this->Controls->Add(this->mailTextBox);
			this->Controls->Add(this->phoneText);
			this->Controls->Add(this->lastNameText);
			this->Controls->Add(this->nameText);
			this->Controls->Add(this->passwordText);
			this->Controls->Add(this->mailText);
			this->Name = L"creationPage";
			this->Text = L"creationPage";
			this->ResumeLayout(false);
			this->PerformLayout();
		}
#pragma endregion
	private: System::Void quit_Click(System::Object^ sender, System::EventArgs^ e) {
		this->Close();
	}
private: System::Void create_Click(System::Object^ sender, System::EventArgs^ e) {
	/*
	myClient->setmail(mailTextBox->Text);
	myClient->setmdp(passwordTextBox->Text);
	myClient->setprenom(nameTextBox->Text);
	myClient->setnom(lastNameTextBox->Text);
	myClient->settel(phoneTextBox->Text);
	MessageBox::Show("done");
	*/
	myClient->create(mailTextBox->Text, passwordTextBox->Text, nameTextBox->Text, lastNameTextBox->Text, phoneTextBox->Text);
}
};
}
