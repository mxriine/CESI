#include <iostream>
#include <msclr/marshal_cppstd.h>  // Pour la conversion entre System::String et std::string
#include <string>

using namespace System;

std::string base64_encode(const std::string& input) {
    array<Byte>^ bytes = Convert::FromBase64String(gcnew String(msclr::interop::marshal_as<String^>(input)));
    return msclr::interop::marshal_as<std::string>(Convert::ToBase64String(bytes));
}

int main() {
    std::string original_message = "Hello, World!";

    // Base64 encoding using .NET
    std::string base64_encoded = base64_encode(original_message);
    Console::WriteLine("Base64 Encoded: " + gcnew String(base64_encoded.c_str()));

    return 0;
}
