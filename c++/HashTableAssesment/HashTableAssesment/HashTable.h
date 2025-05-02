#pragma once

#define HASHTABLE_H

#include <string>

class HashTable {
private:
    static const int TABLE_SIZE = 10;           // Minimum size of 10 buckets
    std::string table[TABLE_SIZE];              // Array to store strings (max length 10)

public:
    // Constructor
    HashTable();                                // Initializes the hash table

    // METHODS
    void init();                                // Sets all buckets to empty string ("")
    int hash(const std::string& key) const;     // Simple hash function
    void insert(const std::string& key);        // Inserts a string using linear probing
    bool search(const std::string& key) const;  // Checks if a string is in the hash table

    // DEBUGGING
    void printTable() const;                    // Displays current contents of the hash table
};


