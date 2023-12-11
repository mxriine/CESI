#include "Crypt.h"
#include <bitset>

using namespace System;
using namespace System::Text;

Crypt::Crypt()
{
    //throw gcnew System::NotImplementedException();
}

String^ Crypt::Encode(String^ input)
{
    String^ base64Encoded = EncodeBase64(input);

    // Étape 2 : Binaire
    String^ binaryString = StringToBinary(base64Encoded);

    // Étape 3 : Chiffre de César (inversion de 0 et 1)
    String^ caesarEncoded = CaesarCipher(binaryString);

    // Étape 4 : String
    String^ result = BinaryToString(caesarEncoded);

    return result;
}

String^ Crypt::EncodeBase64(String^ input)
{
    array<Byte>^ byteArray = Encoding::UTF8->GetBytes(input);
    String^ encodedString = Convert::ToBase64String(byteArray);

    return encodedString;
}

String^ Crypt::StringToBinary(String^ input)
{
    array<Byte>^ byteArray = Encoding::UTF8->GetBytes(input);
    StringBuilder^ binaryStringBuilder = gcnew StringBuilder();

    for each (Byte byteValue in byteArray) {
        String^ binaryByte = Convert::ToString(byteValue, 2)->PadLeft(8, '0');
        binaryStringBuilder->Append(binaryByte);
    }
    return binaryStringBuilder->ToString();
}

String^ Crypt::CaesarCipher(String^ binaryInput)
{
    String^ resultBuilder = "";

    for (int i = 0; i < binaryInput->Length; ++i) {
        Char bit = binaryInput[i];
        if (bit == '0') {
            resultBuilder += "1";
        }
        else if (bit == '1') {
            resultBuilder += "0";
        }
        else {
            // Caractère non binaire, le laisser inchangé
            resultBuilder += bit;
        }
    }
    return resultBuilder->ToString();
}

String^ Crypt::BinaryToString(String^ binaryInput)
{
    StringBuilder^ resultBuilder = gcnew StringBuilder();

    for (int i = 0; i < binaryInput->Length; i += 8) {
        String^ byteString = binaryInput->Substring(i, 8);
        Char byteChar = Convert::ToChar(Convert::ToByte(byteString, 2));
        resultBuilder->Append(byteChar);
    }

    return resultBuilder->ToString();
}
