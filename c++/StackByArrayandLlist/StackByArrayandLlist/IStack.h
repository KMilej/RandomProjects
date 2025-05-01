#pragma once

#define ISTACK_H

/* INTERFACE FOR STACK ADT */

class IStack {
public:
    // Initialise the stack with the given maximum size
    virtual void initialise(int maxSize) = 0;

    // Add a value to the top of the stack
    virtual void push(int value) = 0;

    // Remove and return the top value from the stack
    virtual int pop() = 0;

    // Display the contents of the stack
    virtual void showStack() const = 0;

    // Virtual destructor (important when using inheritance)
    virtual ~IStack() {}
};
