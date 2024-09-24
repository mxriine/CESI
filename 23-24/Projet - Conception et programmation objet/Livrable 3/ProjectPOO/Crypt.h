#pragma once

using namespace System::Data::SqlClient;
using namespace System;
using namespace System::IO;
using namespace System::ComponentModel;
using namespace System::Collections;
using namespace System::Windows::Forms;
using namespace System::Data;
using namespace System::Drawing;

ref class Crypt
{
public:
	Crypt();
	String^ Encode(String^);
	String^ EncodeBase64(String^);
	String^ StringToBinary(String^);
	String^ CaesarCipher(String^);
	String^ BinaryToString(String^);
};