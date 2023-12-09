#include <iostream>
#include <string>
#include <bitset>

#include "Crypt.h"

int main() {
    // Demander à l'utilisateur de saisir une chaîne
    std::cout << "Veuillez saisir une chaine de caracteres : ";
    std::string userString;
    std::getline(std::cin, userString);

    std::cout << " -------------------- " << std::endl;
    std::cout << "       CRYPTAGE       " << std::endl;
    std::cout << " -------------------- " << std::endl;

    // Étape 1 : Base64
    std::string base64Encoded = base64_encode_clr(userString);

    // Étape 2 : Binaire
    std::string binaryString = string_to_binary(base64Encoded);

    // Étape 3 : Chiffre de César (inversion de 0 et 1)
    std::string caesarEncoded = caesar_cipher(binaryString, 0);

    // Étape 4 : String
    std::string result = binary_to_string(caesarEncoded);

    // Afficher les résultats du chiffrement
    std::cout << "Original       : " << userString << std::endl;
    std::cout << "Base64         : " << base64Encoded << std::endl;
    std::cout << "Binaire        : " << binaryString << std::endl;
    std::cout << "Cesar (chiffre): " << caesarEncoded << std::endl;
    std::cout << "Resultat       : " << result << std::endl;

    Console::ReadLine();

    return 0;
}
