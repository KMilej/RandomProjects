#ifndef MYSTACK_H
#define MYSTACK_H

#include <vector>
#include <stdexcept>

/*
  Custom stack class for characters using std::vector as the underlying container.
*/
class MyStack {
private:
    std::vector<char> data;  // Vector to store stack elements

public:
    /* Push a character onto the stack */
    void push(char c) {
        data.push_back(c);
    }

    /* Remove and return the top character from the stack
       Throws an exception if the stack is empty */
    char pop() {
        if (data.empty()) throw std::runtime_error("Stack underflow");
        char c = data.back();
        data.pop_back();
        return c;
    }

    /* Return the top character without removing it
       Throws an exception if the stack is empty */
    char top() const {
        if (data.empty()) throw std::runtime_error("Stack is empty");
        return data.back();
    }

    /* Check if the stack is empty */
    bool isEmpty() const {
        return data.empty();
    }
};

#endif
