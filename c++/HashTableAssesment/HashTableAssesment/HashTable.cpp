#include "HashTable.h"
#include <iostream>

// Constructor
HashTable::HashTable() {
    init();
}

// Initializes all buckets to an empty string
void HashTable::init() {
    for (int i = 0; i < TABLE_SIZE; i++) {
        table[i] = "";
    }
}

// Simple hash function: sum of ASCII values modulo table size
int HashTable::hash(const std::string& key) const {
    int sum = 0;
    for (char ch : key) {
        sum += static_cast<int>(ch);
    }
    return sum % TABLE_SIZE;
}

// Inserts a string into the hash table using linear probing
void HashTable::insert(const std::string& key) {
    int index = hash(key);
    int startIndex = index;

    while (table[index] != "") {
        index = (index + 1) % TABLE_SIZE;

        // Optional: check for full table
        if (index == startIndex) {
            std::cout << "Error: Hash table is full. Cannot insert \"" << key << "\".\n";
            return;
        }
    }

    table[index] = key;
}

// Searches for a string in the hash table using linear probing
bool HashTable::search(const std::string& key) const {
    int index = hash(key);
    int startIndex = index;

    while (table[index] != "") {
        if (table[index] == key) {
            return true;
        }

        index = (index + 1) % TABLE_SIZE;

        // Stop if we've looped back to the start
        if (index == startIndex) {
            break;
        }
    }

    return false;
}

// Prints the contents of the hash table
void HashTable::printTable() const {
    std::cout << "Hash Table:\n";
    for (int i = 0; i < TABLE_SIZE; i++) {
        std::cout << "[" << i << "]: ";
        if (table[i] != "") {
            std::cout << table[i];
        }
        else {
            std::cout << "(empty)";
        }
        std::cout << "\n";
    }
}
