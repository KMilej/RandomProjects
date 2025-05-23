#ifndef SET_H
#define SET_H

#include <iostream>
using namespace std;

const int MAX_SIZE = 25;

class Set {
private:
    int data[MAX_SIZE];  // Array to store set elements
    int size;            // Current size of the set

public:
    Set();                         // Constructor

    void add(int value);          // Add an element to the set with one parameter
    void remove(int value);       // Remove an element from the set with one parameter
    void showSet();               // Display all elements in the set  if (size == 0) The set is empty.
    void intersection(Set& set2); // Print the intersection of two sets with two parameter
    void difference(Set& set2);   // Print the difference of two sets with two parameter 
    int sizeOfSet();              // Return the size of the set return size;
    bool isEmpty();               // Check if the set is empty return size == 0;
};

#endif
