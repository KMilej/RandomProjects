#ifndef MYQUEUE_H
#define MYQUEUE_H

#include <queue>
#include <string>
#include <stdexcept>

/*
  Custom queue class for strings using std::queue internally.
  Provides basic enqueue/dequeue operations with error checking.
*/
class MyQueue {
private:
    std::queue<std::string> q;  // Underlying standard queue container

public:
    /* Add a value to the end of the queue */
    void enqueue(const std::string& val) {
        q.push(val);
    }

    /* Remove and return the front value from the queue.
       Throws an exception if the queue is empty. */
    std::string dequeue() {
        if (q.empty()) throw std::runtime_error("Queue is empty");
        std::string front = q.front();
        q.pop();
        return front;
    }

    /* Check if the queue is empty */
    bool isEmpty() const {
        return q.empty();
    }
};

#endif // MYQUEUE_H
