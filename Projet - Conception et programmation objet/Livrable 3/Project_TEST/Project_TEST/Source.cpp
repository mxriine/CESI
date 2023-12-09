#include <iostream>
#include <string>
#include <bitset>

#include "Crypt.h"

int main() {
    // Demander � l'utilisateur de saisir une cha�ne
    std::cout << "Veuillez saisir une chaine de caracteres : ";
    std::string userString;
    std::getline(std::cin, userString);

    std::cout << " -------------------- " << std::endl;
    std::cout << "       CRYPTAGE       " << std::endl;
    std::cout << " -------------------- " << std::endl;

    // �tape 1 : Base64
    std::string base64Encoded = base64_encode_clr(userString);

    // �tape 2 : Binaire
    std::string binaryString = string_to_binary(base64Encoded);

    // �tape 3 : Chiffre de C�sar (inversion de 0 et 1)
    std::string caesarEncoded = caesar_cipher(binaryString, 0);

    // �tape 4 : String
    std::string result = binary_to_string(caesarEncoded);

    // Afficher les r�sultats du chiffrement
    std::cout << "Original       : " << userString << std::endl;
    std::cout << "Base64         : " << base64Encoded << std::endl;
    std::cout << "Binaire        : " << binaryString << std::endl;
    std::cout << "Cesar (chiffre): " << caesarEncoded << std::endl;
    std::cout << "Resultat       : " << result << std::endl;

    Console::ReadLine();

    return 0;
}
