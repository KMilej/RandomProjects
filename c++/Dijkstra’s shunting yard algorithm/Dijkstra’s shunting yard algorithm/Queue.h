#pragma once
// Queue.h

#ifndef QUEUE_H
#define QUEUE_H

#include <vector>
#include <stdexcept>

template <typename T>
class Queue {
private:
    std::vector<T> data;
    int maxSize;

public:
    Queue(int size);

    void init();               // Clear the queue
    bool isFull() const;
    bool isEmpty() const;
    void add(const T& item);   // Enqueue
    T remove();                // Dequeue
    T front() const;
};

#include "Queue.cpp" // Include template implementation

#endif
