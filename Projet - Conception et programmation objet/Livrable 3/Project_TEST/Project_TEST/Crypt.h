#pragma once

#include <string>
#include <msclr/marshal_cppstd.h>

using namespace System;
using namespace System::Text;

// Étape 1 : String -> Base 64
std::string base64_encode_clr(const std::string& input) {
    array<Byte>^ byteArray = Encoding::UTF8->GetBytes(msclr::interop::marshal_as<String^>(input));
    return msclr::interop::marshal_as<std::string>(Convert::ToBase64String(byteArray));
}

// Étape 2 : String -> Binaire
std::string string_to_binary(const std::string& input) {
    std::string binaryString;
    for (char c : input) {
        binaryString += std::bitset<8>(c).to_string();
    }
    return binaryString;
}

// Étape 3 : Cesar (Inversement 0 et 1)
std::string caesar_cipher(const std::string& input, int shift) {
    std::string result;
    for (char c : input) {
        if (c == '0') {
            result.push_back('1');
        }
        else if (c == '1') {
            result.push_back('0');
        }
        else {
            result.push_back(c);
        }
    }
    return result;
}

// Étape 4 : Binaire -> String
std::string binary_to_string(const std::string& binary) {
    std::string result;
    for (size_t i = 0; i < binary.length(); i += 8) {
        std::bitset<8> byte(binary.substr(i, 8));
        result.push_back(char(byte.to_ulong()));
    }
    return result;
}