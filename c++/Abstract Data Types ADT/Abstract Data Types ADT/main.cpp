// main.cpp
#include <iostream>
#include "Set.h"

using namespace std;

int main() {
    Set set; // Initialize the set object


    set.showSet();

    // Test set operations
    set.add(10);
    set.add(20);
    set.add(30);
    set.add(20);
    set.showSet();

    set.remove(20);
    set.showSet();
    set.remove(20);


    Set set2;
    set2.add(30);
    set2.add(40);
    set2.add(50);

    set.intersection(set2);
    set.difference(set2);

    cout << "Size of set: " << set.sizeOfSet() << endl;

    if (set.isEmpty()) {
        cout << "Set is empty." << endl;
    }
    else {
        cout << "Set contains data." << endl;
    }

    return 0;
}