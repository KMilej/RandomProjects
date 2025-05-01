#pragma once

#define STACKBYARRAY_H

#include "IStack.h"
#include <iostream>

/* PROPERTIES */
class StackByArray : public IStack {
private:
    int* items;     // dynamic array storing the stack elements
    int top;        // index of the top element in the stack
    int maxSize;    // maximum size of the stack

public:
    /* METHODS */
    StackByArray();                 // default constructor
    ~StackByArray();                // destructor

    void initialise(int maxSize) override;   // set up the stack with given size
    void push(int value) override;           // add a value to the top of the stack
    int pop() override;                      // remove and return the top value
    void showStack() const override;         // display the contents of the stack
};
