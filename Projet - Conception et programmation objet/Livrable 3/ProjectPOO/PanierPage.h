#pragma once

namespace ProjectPOO {

	using namespace System;
	using namespace System::ComponentModel;
	using namespace System::Collections;
	using namespace System::Windows::Forms;
	using namespace System::Data;
	using namespace System::Drawing;

	/// <summary>
	/// Description résumée de MyForm
	/// </summary>
	public ref class MyForm : public System::Windows::Forms::Form
	{
	public:
		MyForm(void)
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
		~MyForm()
		{
			if (components)
			{
				delete components;
			}
		}
	private: System::Windows::Forms::Label^ label1;
	protected:
	private: System::Windows::Forms::Label^ label2;
	private: System::Windows::Forms::Label^ label3;
	private: System::Windows::Forms::Panel^ separationPanel;
	private: System::Windows::Forms::Panel^ separationPanel2;
	private: System::Windows::Forms::Button^ button1;
	private: System::Windows::Forms::Panel^ panel1;

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
			this->label1 = (gcnew System::Windows::Forms::Label());
			this->label2 = (gcnew System::Windows::Forms::Label());
			this->label3 = (gcnew System::Windows::Forms::Label());
			this->separationPanel = (gcnew System::Windows::Forms::Panel());
			this->separationPanel2 = (gcnew System::Windows::Forms::Panel());
			this->button1 = (gcnew System::Windows::Forms::Button());
			this->panel1 = (gcnew System::Windows::Forms::Panel());
			this->panel1->SuspendLayout();
			this->SuspendLayout();
			// 
			// label1
			// 
			this->label1->AutoSize = true;
			this->label1->Location = System::Drawing::Point(58, 73);
			this->label1->Name = L"label1";
			this->label1->Size = System::Drawing::Size(96, 20);
			this->label1->TabIndex = 0;
			this->label1->Text = L"Votre panier";
			this->label1->Click += gcnew System::EventHandler(this, &MyForm::label1_Click);
			// 
			// label2
			// 
			this->label2->AutoSize = true;
			this->label2->Location = System::Drawing::Point(528, 97);
			this->label2->Name = L"label2";
			this->label2->Size = System::Drawing::Size(34, 20);
			this->label2->TabIndex = 1;
			this->label2->Text = L"Prix";
			this->label2->Click += gcnew System::EventHandler(this, &MyForm::label3_Click);
			// 
			// label3
			// 
			this->label3->AutoSize = true;
			this->label3->Location = System::Drawing::Point(638, 97);
			this->label3->Name = L"label3";
			this->label3->Size = System::Drawing::Size(70, 20);
			this->label3->TabIndex = 1;
			this->label3->Text = L"Quantité";
			this->label3->Click += gcnew System::EventHandler(this, &MyForm::label3_Click);
			// 
			// separationPanel
			// 
			this->separationPanel->BackColor = System::Drawing::SystemColors::ControlDark;
			this->separationPanel->Location = System::Drawing::Point(62, 120);
			this->separationPanel->Name = L"separationPanel";
			this->separationPanel->Size = System::Drawing::Size(667, 2);
			this->separationPanel->TabIndex = 0;
			this->separationPanel->Paint += gcnew System::Windows::Forms::PaintEventHandler(this, &MyForm::separationPanel_Paint);
			// 
			// separationPanel2
			// 
			this->separationPanel2->BackColor = System::Drawing::SystemColors::ControlDark;
			this->separationPanel2->Location = System::Drawing::Point(62, 511);
			this->separationPanel2->Name = L"separationPanel2";
			this->separationPanel2->Size = System::Drawing::Size(667, 2);
			this->separationPanel2->TabIndex = 0;
			this->separationPanel2->Paint += gcnew System::Windows::Forms::PaintEventHandler(this, &MyForm::separationPanel_Paint);
			// 
			// button1
			// 
			this->button1->Location = System::Drawing::Point(33, 165);
			this->button1->Name = L"button1";
			this->button1->Size = System::Drawing::Size(198, 43);
			this->button1->TabIndex = 3;
			this->button1->Text = L"Passer la commande";
			this->button1->UseVisualStyleBackColor = true;
			// 
			// panel1
			// 
			this->panel1->BackColor = System::Drawing::SystemColors::ControlLight;
			this->panel1->Controls->Add(this->button1);
			this->panel1->Location = System::Drawing::Point(795, 73);
			this->panel1->Name = L"panel1";
			this->panel1->Size = System::Drawing::Size(262, 602);
			this->panel1->TabIndex = 4;
			this->panel1->SendToBack();
			// 
			// MyForm
			// 
			this->AutoScaleDimensions = System::Drawing::SizeF(9, 20);
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::Font;
			this->ClientSize = System::Drawing::Size(1069, 765);
			this->Controls->Add(this->panel1);
			this->Controls->Add(this->separationPanel2);
			this->Controls->Add(this->separationPanel);
			this->Controls->Add(this->label3);
			this->Controls->Add(this->label2);
			this->Controls->Add(this->label1);
			this->Name = L"MyForm";
			this->Text = L"MyForm";
			this->Load += gcnew System::EventHandler(this, &MyForm::MyForm_Load);
			this->panel1->ResumeLayout(false);
			this->ResumeLayout(false);
			this->PerformLayout();

		}
#pragma endregion
	private: System::Void label1_Click(System::Object^ sender, System::EventArgs^ e) {
	}
	private: System::Void label2_Click(System::Object^ sender, System::EventArgs^ e) {
	}
	private: System::Void label3_Click(System::Object^ sender, System::EventArgs^ e) {
	}
	private: System::Void MyForm_Load(System::Object^ sender, System::EventArgs^ e) {
	}
	private: System::Void separationPanel_Paint(System::Object^ sender, System::Windows::Forms::PaintEventArgs^ e) {
	}
	};
}
