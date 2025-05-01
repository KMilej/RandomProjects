#ifndef STACKADT_H
#define STACKADT_H

class StackADT {
public:
    virtual void push(int value) = 0;
    virtual int pop() = 0;
    virtual bool isEmpty() const = 0;
    virtual int size() const = 0;

    virtual ~StackADT() {} // bezpieczny wirtualny destruktor
};

#endif
