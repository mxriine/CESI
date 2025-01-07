#include <iostream>
using namespace std;

class MessagePrinter {
public:
    void printMessage() {
        cout << "Bonjour, je suis une classe qui affiche un message !" << endl;
    }
};

int main() {
    // Allocation statique
    MessagePrinter staticPrinter;
    staticPrinter.printMessage();

    // Allocation dynamique
    MessagePrinter *dynamicPrinter = new MessagePrinter();
    dynamicPrinter->printMessage();
    delete dynamicPrinter;

    return 0;
}
