#include <iostream>
#include "StackByArray.h"
#include "StackByLinkedList.h"

using namespace std;

const int MaxSize = 20;

// Function which test stack
void testStack(IStack& the_stack) {
    the_stack.initialise(MaxSize);

    cout << "Testing Stack" << endl;
    the_stack.showStack();

    for (int counter = 0; counter < MaxSize; counter++) {
        the_stack.push(counter);
    }

    the_stack.showStack();

    for (int counter = 0; counter < MaxSize; counter++) {
        cout << "Popped: " << the_stack.pop() << endl;
    }
}

int main() {
    cout << "=== TESTING STACK BY ARRAY ===" << endl;
    StackByArray arrayStack;
    testStack(arrayStack);

    cout << "\n=== TESTING STACK BY LINKED LIST ===" << endl;
    StackByLinkedList listStack;
    testStack(listStack);

    return 0;
}
