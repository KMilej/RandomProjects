// Queue.cpp

#ifndef QUEUE_CPP
#define QUEUE_CPP

#include "Queue.h"

template <typename T>
Queue<T>::Queue(int size) : maxSize(size) {
    data.reserve(maxSize);
}

template <typename T>
void Queue<T>::init() {
    data.clear();
}

template <typename T>
bool Queue<T>::isFull() const {
    return data.size() >= maxSize;
}

template <typename T>
bool Queue<T>::isEmpty() const {
    return data.empty();
}

template <typename T>
void Queue<T>::add(const T& item) {
    if (isFull()) throw std::overflow_error("Queue is full");
    data.push_back(item);
}

template <typename T>
T Queue<T>::remove() {
    if (isEmpty()) throw std::underflow_error("Queue is empty");
    T frontElement = data.front();
    data.erase(data.begin());
    return frontElement;
}

template <typename T>
T Queue<T>::front() const {
    if (isEmpty()) throw std::underflow_error("Queue is empty");
    return data.front();
}

#endif
