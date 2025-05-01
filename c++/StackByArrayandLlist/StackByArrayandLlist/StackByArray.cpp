#include "StackByArray.h"
#include <iostream>
using namespace std;

/* METHODS */

// Constructor
StackByArray::StackByArray() {
    items = nullptr;
    top = -1;
    maxSize = 0;
}

// Destructor – releases allocated memory
StackByArray::~StackByArray() {
    delete[] items;
}

// Initialise the stack with a given size
void StackByArray::initialise(int maxSize) {
    this->maxSize = maxSize;
    items = new int[maxSize];
    top = -1;
}

// Push a value onto the stack
void StackByArray::push(int value) {
    if (top >= maxSize - 1) {
        cout << "Stack overflow – cannot push " << value << endl;
        return;
    }
    items[++top] = value;
}

/// Pop and return the top value from the stack
int StackByArray::pop() {
    if (top < 0) {
        cout << "Stack underflow – cannot pop" << endl;
        return -1; 
    }
    return items[top--];
}

// Show all values in the stack from top to bottom
void StackByArray::showStack() const {
    if (top < 0) {
        cout << "[ Stack is empty ]" << endl;
        return;
    }

    cout << "[ Stack contents: ";
    for (int i = top; i >= 0; i--) {
        cout << items[i];
        if (i != 0) cout << ", ";
    }
    cout << " ]" << endl;
}
