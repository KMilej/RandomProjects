// Set.cpp
#include "Set.h"
#include <iostream>
using namespace std;

// Constructor to initialize the set
Set::Set() {
    size = 0; // Initialize size to 0
}


void Set::add(int value) {
    if (size >= MAX_SIZE) {
        cout << "The set is full." << endl;
        return;
    }


    for (int i = 0; i < size; i++) {
        if (data[i] == value) {
            cout << data[i] << " Already in set" << endl;
            return;
        }
    }
    cout << "Adding " << value << '\n';
    data[size] = value;
    size++;
}


void Set::remove(int value) {
    if (size == 0) {
        cout << "The set is empty." << endl;
        return;
    }

    bool found = false;
    for (int i = 0; i < size; i++) {
        if (data[i] == value) {
            found = true;

            for (int j = i; j < size - 1; j++) {
                data[j] = data[j + 1];
            }
            size--;
            break;
        }
    }

    if (found) {
        cout << "Element removed from the set." << endl;
    }
    else {
        cout << "Element not found in the set." << endl;
    }
}


void Set::showSet() {
    if (size == 0) {
        cout << "The set is empty." << endl;
        return;
    }

    for (int i = 0; i < size; i++) {
        cout << data[i] << " ";
    }
    cout << endl;
}


void Set::intersection(Set& set2) {
    Set intersectionSet;

    for (int i = 0; i < size; i++) {
        for (int j = 0; j < set2.size; j++) {
            if (data[i] == set2.data[j]) {
                intersectionSet.add(data[i]);
                break;
            }
        }
    }

    cout << "Intersection of the sets: ";
    intersectionSet.showSet();
}


void Set::difference(Set& set2) {
    Set differenceSet;

    for (int i = 0; i < size; i++) {
        bool found = false;
        for (int j = 0; j < set2.size; j++) {
            if (data[i] == set2.data[j]) {
                found = true;
                break;
            }
        }
        if (!found) {
            differenceSet.add(data[i]);
        }
    }

    cout << "Difference of the sets: ";
    differenceSet.showSet();
}


int Set::sizeOfSet() {
    return size;
}

bool Set::isEmpty() {
    return size == 0;
}