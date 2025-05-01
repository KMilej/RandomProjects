#pragma once
#ifndef SET_H
#define SET_H

const int MAX_SIZE = 100;

class Set {
private:
    int data[MAX_SIZE];
    int size;

public:
    Set(); // Constructor

    void add(int value);
    void remove(int value);
    void showSet();
    void intersection(Set& set2);
    void difference(Set& set2);
    bool isEmpty();
    int sizeOfSet();
};

#endif
