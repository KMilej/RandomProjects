// Stack.cpp

#ifndef STACK_CPP
#define STACK_CPP

#include "Stack.h"

template <typename T>
Stack<T>::Stack(int size) : maxSize(size) {
    data.reserve(maxSize);
}

template <typename T>
void Stack<T>::init() {
    data.clear();
}

template <typename T>
bool Stack<T>::isFull() const {
    return data.size() >= maxSize;
}

template <typename T>
bool Stack<T>::isEmpty() const {
    return data.empty();
}

template <typename T>
void Stack<T>::add(const T& item) {
    if (isFull()) throw std::overflow_error("Stack is full");
    data.push_back(item);
}

template <typename T>
T Stack<T>::remove() {
    if (isEmpty()) throw std::underflow_error("Stack is empty");
    T topElement = data.back();
    data.pop_back();
    return topElement;
}

template <typename T>
T Stack<T>::top() const {
    if (isEmpty()) throw std::underflow_error("Stack is empty");
    return data.back();
}

#endif
