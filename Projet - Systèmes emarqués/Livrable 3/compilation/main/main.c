#include <avr/io.h>
#include "debug.h"

#define DEBUG 1

/*Proto functions*/
void lightDown();
void lightUp();

int main() {
    DDRB |= _BV(DDB5);

    while(1) {

        if (DEBUG) {
            debugQuickly();
        }
        lightUp();
        lightDown();
    }
}