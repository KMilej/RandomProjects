#pragma once
#include "SetADT.h"
#include "Set.h"
#include <iostream>
using namespace std;

// imprement a interface
struct ConcreteSetADT : public SetADT {

    // Add element to the set
    void add(Set& set, int data) override {
        set.add(data);
    }

    // Remove element from the set
    void remove(Set& set, int data) override {
        set.remove(data);
    }

    // Display the set
    void showSet(Set set) override {
        set.showSet();
    }

    // Show intersection of two sets
    void intersection(Set set1, Set set2) override {
        set1.intersection(set2);
    }

    // Show difference
    void difference(Set set1, Set set2) override {
        set1.difference(set2);
    }

    // Check if set is null
    bool isEmpty(Set set) override {
        return set.isEmpty();
    }
};
