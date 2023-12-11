#pragma once

#include "AuthPage.h"
#include "Client.h"
#include "GlobalData.h"
#include "Article.h"
#include "FinalizationWindow.h"

namespace ProjetPOO {
	using namespace System;
	using namespace System::ComponentModel;
	using namespace System::Collections;
	using namespace System::Windows::Forms;
	using namespace System::Data;
	using namespace System::Drawing;
	using namespace System::Collections::Generic;

	/// <summary>
	/// Description résumée de storePage
	/// </summary>
	public ref class storePage : public System::Windows::Forms::Form
	{
	public:
		client^ myClient = GlobalData::GetMyClient();
		List<article^>^ myArticles = GlobalData::GetArticles();
		int size = myArticles->Count;
	private: System::Windows::Forms::ListView^ shoppingCart;
	private: System::Windows::Forms::ColumnHeader^ columnName;
	public:



	private: System::Windows::Forms::ColumnHeader^ columnPrice;
	private: System::Windows::Forms::Button^ Delete;
	private: System::Windows::Forms::Label^ label2;
	private: System::Windows::Forms::ColumnHeader^ columnQuantity;
	private: System::Windows::Forms::ColumnHeader^ columnRef;
	public:

	public:

	public:

		int i = 1;
		//myArticles = GlobalData::GetArticles();
		//array<article^> myArticles = GlobalData::GetArticles();
	public:

		storePage(void)
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
		~storePage()
		{
			if (components)
			{
				delete components;
			}
		}
	private: System::Windows::Forms::Label^ label1;
	private: System::Windows::Forms::Label^ price;
	private: System::Windows::Forms::NumericUpDown^ numericUpDown1;
	private: System::Windows::Forms::Label^ articleName;
	private: System::Windows::Forms::PictureBox^ imageBox;

	private: System::Windows::Forms::Label^ priceTag;
	private: System::Windows::Forms::Button^ addCart;
	private: System::Windows::Forms::Button^ buy;
	private: System::Windows::Forms::Button^ next;
	private: System::Windows::Forms::Button^ back;




	protected:

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
			System::Windows::Forms::Label^ quantity;
			this->label1 = (gcnew System::Windows::Forms::Label());
			this->price = (gcnew System::Windows::Forms::Label());
			this->numericUpDown1 = (gcnew System::Windows::Forms::NumericUpDown());
			this->articleName = (gcnew System::Windows::Forms::Label());
			this->imageBox = (gcnew System::Windows::Forms::PictureBox());
			this->priceTag = (gcnew System::Windows::Forms::Label());
			this->addCart = (gcnew System::Windows::Forms::Button());
			this->buy = (gcnew System::Windows::Forms::Button());
			this->next = (gcnew System::Windows::Forms::Button());
			this->back = (gcnew System::Windows::Forms::Button());
			this->shoppingCart = (gcnew System::Windows::Forms::ListView());
			this->columnName = (gcnew System::Windows::Forms::ColumnHeader());
			this->columnPrice = (gcnew System::Windows::Forms::ColumnHeader());
			this->columnQuantity = (gcnew System::Windows::Forms::ColumnHeader());
			this->columnRef = (gcnew System::Windows::Forms::ColumnHeader());
			this->Delete = (gcnew System::Windows::Forms::Button());
			this->label2 = (gcnew System::Windows::Forms::Label());
			quantity = (gcnew System::Windows::Forms::Label());
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->numericUpDown1))->BeginInit();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->imageBox))->BeginInit();
			this->SuspendLayout();
			// 
			// quantity
			// 
			quantity->AutoSize = true;
			quantity->Location = System::Drawing::Point(427, 175);
			quantity->Name = L"quantity";
			quantity->Size = System::Drawing::Size(61, 16);
			quantity->TabIndex = 5;
			quantity->Text = L"Quantity :";
			quantity->Click += gcnew System::EventHandler(this, &storePage::quantity_Click);
			// 
			// label1
			// 
			this->label1->AutoSize = true;
			this->label1->Location = System::Drawing::Point(12, 9);
			this->label1->Name = L"label1";
			this->label1->Size = System::Drawing::Size(130, 16);
			this->label1->TabIndex = 0;
			this->label1->Text = L"Welcome to SMODZ";
			this->label1->Click += gcnew System::EventHandler(this, &storePage::label1_Click);
			// 
			// price
			// 
			this->price->AutoSize = true;
			this->price->Location = System::Drawing::Point(428, 135);
			this->price->Name = L"price";
			this->price->Size = System::Drawing::Size(44, 16);
			this->price->TabIndex = 1;
			this->price->Text = L"Price :";
			// 
			// numericUpDown1
			// 
			this->numericUpDown1->Location = System::Drawing::Point(494, 173);
			this->numericUpDown1->Name = L"numericUpDown1";
			this->numericUpDown1->Size = System::Drawing::Size(51, 22);
			this->numericUpDown1->TabIndex = 2;
			// 
			// articleName
			// 
			this->articleName->AutoSize = true;
			this->articleName->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 15, System::Drawing::FontStyle::Regular, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->articleName->Location = System::Drawing::Point(425, 81);
			this->articleName->Name = L"articleName";
			this->articleName->Size = System::Drawing::Size(81, 29);
			this->articleName->TabIndex = 3;
			this->articleName->Text = L"Name";
			// 
			// imageBox
			// 
			this->imageBox->Location = System::Drawing::Point(60, 60);
			this->imageBox->Name = L"imageBox";
			this->imageBox->Size = System::Drawing::Size(314, 331);
			this->imageBox->SizeMode = System::Windows::Forms::PictureBoxSizeMode::StretchImage;
			this->imageBox->TabIndex = 4;
			this->imageBox->TabStop = false;
			// 
			// priceTag
			// 
			this->priceTag->AutoSize = true;
			this->priceTag->Location = System::Drawing::Point(475, 135);
			this->priceTag->Name = L"priceTag";
			this->priceTag->Size = System::Drawing::Size(35, 16);
			this->priceTag->TabIndex = 6;
			this->priceTag->Text = L"120€";
			// 
			// addCart
			// 
			this->addCart->Location = System::Drawing::Point(413, 354);
			this->addCart->Name = L"addCart";
			this->addCart->Size = System::Drawing::Size(97, 23);
			this->addCart->TabIndex = 7;
			this->addCart->Text = L"Add to cart";
			this->addCart->UseVisualStyleBackColor = true;
			this->addCart->Click += gcnew System::EventHandler(this, &storePage::addCart_Click_1);
			// 
			// buy
			// 
			this->buy->Location = System::Drawing::Point(534, 354);
			this->buy->Name = L"buy";
			this->buy->Size = System::Drawing::Size(75, 23);
			this->buy->TabIndex = 8;
			this->buy->Text = L"Buy";
			this->buy->UseVisualStyleBackColor = true;
			this->buy->Click += gcnew System::EventHandler(this, &storePage::buy_Click);
			// 
			// next
			// 
			this->next->Location = System::Drawing::Point(526, 238);
			this->next->Name = L"next";
			this->next->Size = System::Drawing::Size(69, 61);
			this->next->TabIndex = 9;
			this->next->Text = L">";
			this->next->UseVisualStyleBackColor = true;
			this->next->Click += gcnew System::EventHandler(this, &storePage::next_Click);
			// 
			// back
			// 
			this->back->Location = System::Drawing::Point(442, 238);
			this->back->Name = L"back";
			this->back->Size = System::Drawing::Size(69, 61);
			this->back->TabIndex = 10;
			this->back->Text = L"<";
			this->back->UseVisualStyleBackColor = true;
			this->back->Click += gcnew System::EventHandler(this, &storePage::back_Click);
			// 
			// shoppingCart
			// 
			this->shoppingCart->Columns->AddRange(gcnew cli::array< System::Windows::Forms::ColumnHeader^  >(4) {
				this->columnName, this->columnPrice,
					this->columnQuantity, this->columnRef
			});
			this->shoppingCart->HeaderStyle = System::Windows::Forms::ColumnHeaderStyle::Nonclickable;
			this->shoppingCart->HideSelection = false;
			this->shoppingCart->Location = System::Drawing::Point(695, 97);
			this->shoppingCart->Name = L"shoppingCart";
			this->shoppingCart->Size = System::Drawing::Size(259, 251);
			this->shoppingCart->TabIndex = 12;
			this->shoppingCart->UseCompatibleStateImageBehavior = false;
			this->shoppingCart->View = System::Windows::Forms::View::Details;
			// 
			// columnName
			// 
			this->columnName->Text = L"Name";
			// 
			// columnPrice
			// 
			this->columnPrice->Text = L"Price";
			// 
			// columnQuantity
			// 
			this->columnQuantity->Text = L"Quantity";
			// 
			// columnRef
			// 
			this->columnRef->Text = L"Ref";
			// 
			// Delete
			// 
			this->Delete->Location = System::Drawing::Point(793, 354);
			this->Delete->Name = L"Delete";
			this->Delete->Size = System::Drawing::Size(75, 23);
			this->Delete->TabIndex = 13;
			this->Delete->Text = L"Delete";
			this->Delete->UseVisualStyleBackColor = true;
			this->Delete->Click += gcnew System::EventHandler(this, &storePage::Delete_Click);
			// 
			// label2
			// 
			this->label2->AutoSize = true;
			this->label2->Font = (gcnew System::Drawing::Font(L"Microsoft Sans Serif", 7.8F, System::Drawing::FontStyle::Bold, System::Drawing::GraphicsUnit::Point,
				static_cast<System::Byte>(0)));
			this->label2->Location = System::Drawing::Point(772, 63);
			this->label2->Name = L"label2";
			this->label2->Size = System::Drawing::Size(105, 16);
			this->label2->TabIndex = 14;
			this->label2->Text = L"Shopping Cart";
			// 
			// storePage
			// 
			this->AutoScaleDimensions = System::Drawing::SizeF(8, 16);
			this->AutoScaleMode = System::Windows::Forms::AutoScaleMode::Font;
			this->ClientSize = System::Drawing::Size(998, 433);
			this->Controls->Add(this->label2);
			this->Controls->Add(this->Delete);
			this->Controls->Add(this->shoppingCart);
			this->Controls->Add(this->back);
			this->Controls->Add(this->next);
			this->Controls->Add(this->buy);
			this->Controls->Add(this->addCart);
			this->Controls->Add(this->priceTag);
			this->Controls->Add(quantity);
			this->Controls->Add(this->imageBox);
			this->Controls->Add(this->articleName);
			this->Controls->Add(this->numericUpDown1);
			this->Controls->Add(this->price);
			this->Controls->Add(this->label1);
			this->Name = L"storePage";
			this->Text = L"storePage";
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->numericUpDown1))->EndInit();
			(cli::safe_cast<System::ComponentModel::ISupportInitialize^>(this->imageBox))->EndInit();
			this->ResumeLayout(false);
			this->PerformLayout();
			onLoad();
		}
#pragma endregion
	private: System::Void label1_Click(System::Object^ sender, System::EventArgs^ e) {
		List<article^>^ panier = myClient->getCart();
		int size = panier->Count;
		MessageBox::Show("La taille de la liste est : " + size);
	}
	private: System::Void pictureBox1_Click(System::Object^ sender, System::EventArgs^ e) {
	}
	private: System::Void quantity_Click(System::Object^ sender, System::EventArgs^ e) {
	}

	private: System::Void addCart_Click(System::Object^ sender, System::EventArgs^ e) {

	}

	public:
		void ChargerImage(String^ urlImage)
		{
			try
			{
				System::Net::WebRequest^ request = System::Net::WebRequest::Create(urlImage);
				System::Net::WebResponse^ response = request->GetResponse();
				System::IO::Stream^ stream = response->GetResponseStream();

				// Charger l'image depuis le flux
				imageBox->Image = Image::FromStream(stream);

				stream->Close();
				response->Close();
			}
			catch (Exception^ ex)
			{
				MessageBox::Show("Erreur lors du chargement de l'image : " + ex->Message);
			}
		}

		void updateArticle(int id)
		{
			for each (article ^ Article in myArticles)
			{
				if (Article->getref() == id)
				{
					articleName->Text = Article->getnom();
					priceTag->Text = Convert::ToString(Article->getprixHT()) + "€";
					ChargerImage(Article->getlienImage());
				}
			}
		}

		void onLoad()
		{
			updateArticle(i);
			loadShoppingCart();
		}

		void loadShoppingCart()
		{
			for each (article ^ Article in myClient->getCart())
			{
				ListViewItem^ item = gcnew ListViewItem(Article->getnom());
				item->SubItems->Add(Article->getprixHT().ToString());
				item->SubItems->Add(Article->getqt().ToString());
				item->SubItems->Add(Article->getref().ToString());
				shoppingCart->Items->Add(item);
			}
		}


	private: System::Void addCart_Click_1(System::Object^ sender, System::EventArgs^ e) {
		if (numericUpDown1->Value > 0)
		{
			for each (article ^ Article in myArticles)
			{
				if (Article->getref() == i)
				{
					Article->setqt(Convert::ToInt32(numericUpDown1->Value));
					ListViewItem^ item = gcnew ListViewItem(Article->getnom());
					item->SubItems->Add(Article->getprixHT().ToString());
					item->SubItems->Add(Article->getqt().ToString());
					item->SubItems->Add(Article->getref().ToString());
					shoppingCart->Items->Add(item);
					myClient->addToCart(Article);
				}
			}
		}
	}

	private: System::Void Delete_Click(System::Object^ sender, System::EventArgs^ e) {
		if (shoppingCart->SelectedItems->Count > 0)
		{
			ListViewItem^ selectedItem = shoppingCart->SelectedItems[0];
			shoppingCart->Items->Remove(selectedItem);
			int refArticle = Convert::ToInt32(selectedItem->SubItems[3]->Text);
			myClient->removeFromCart(refArticle);
			//MessageBox::Show(refArticle.ToString());
		}
	}

	private: System::Void next_Click(System::Object^ sender, System::EventArgs^ e) {
		if ((i + 1) > myArticles->Count)
		{
			i = 1;
		}
		else
		{
			i++;
		}
		updateArticle(i);
	}
	private: System::Void back_Click(System::Object^ sender, System::EventArgs^ e) {
		if ((i - 1) < 1)
		{
			i = myArticles->Count;
		}
		else
		{
			i--;
		}
		updateArticle(i);
	}


	private: System::Void buy_Click(System::Object^ sender, System::EventArgs^ e) {
		ProjetPOO::finalizationWindow finalization;
		finalization.ShowDialog();
	}
	};
}