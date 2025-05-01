#pragma once

#define STACKBYLINKEDLIST_H

#include "IStack.h"
#include <iostream>

/* PROPERTIES */
class StackByLinkedList : public IStack {
private:
    // Internal node structure (used for the linked list)
    struct Node {
        int value;
        Node* next;
    };

    Node* top;       // Pointer to the top of the stack
    int currentSize; // Current number of elements in the stack
    int maxSize;     // Maximum allowed size of the stack

public:
    /* METHODS */
    StackByLinkedList();              // Constructor
    ~StackByLinkedList();             // Destructor

    void initialise(int maxSize) override; // Set maximum stack size
    void push(int value) override;         // Add a value to the top of the stack
    int pop() override;                    // Remove and return the top value
    void showStack() const override;       // Display all elements in the stack
};
