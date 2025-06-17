// Stack.h

#ifndef STACK_H
#define STACK_H

#include <vector>
#include <stdexcept>

template <typename T>
class Stack {
private:
    std::vector<T> data;
    int maxSize;

public:
    Stack(int size);

    void init();               // Clear the stack
    bool isFull() const;
    bool isEmpty() const;
    void add(const T& item);   // Push
    T remove();                // Pop
    T top() const;
};

#include "Stack.cpp" // Include template implementation

#endif
