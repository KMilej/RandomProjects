#include "StackByLinkedList.h"
#include <iostream>
using namespace std;

/* METHODS */

// Constructor
StackByLinkedList::StackByLinkedList() {
    top = nullptr;
    currentSize = 0;
    maxSize = 0;
}

// Destructor – releases allocated memory
StackByLinkedList::~StackByLinkedList() {
    while (top != nullptr) {
        Node* temp = top;
        top = top->next;
        delete temp;
    }
}

// Initialise the stack with a given size
void StackByLinkedList::initialise(int maxSize) {
    this->maxSize = maxSize;
    this->currentSize = 0;
    this->top = nullptr;
}

// adding to stack
void StackByLinkedList::push(int value) {
    if (currentSize >= maxSize) {
        cout << "Stack overflow – cannot push " << value << endl;
        return;
    }

    Node* newNode = new Node;
    newNode->value = value;
    newNode->next = top;
    top = newNode;
    currentSize++;
}

// delete and return element from stack
int StackByLinkedList::pop() {
    if (top == nullptr) {
        cout << "Stack underflow – cannot pop" << endl;
        return -1;
    }

    int poppedValue = top->value;
    Node* temp = top;
    top = top->next;
    delete temp;
    currentSize--;
    return poppedValue;
}

// show stack details
void StackByLinkedList::showStack() const {
    if (top == nullptr) {
        cout << "[ Stack is empty ]" << endl;
        return;
    }

    cout << "[ Stack contents: ";
    Node* current = top;
    while (current != nullptr) {
        cout << current->value;
        if (current->next != nullptr) cout << ", ";
        current = current->next;
    }
    cout << " ]" << endl;
}
