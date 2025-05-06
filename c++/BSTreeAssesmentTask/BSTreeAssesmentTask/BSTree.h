#pragma once
#include <iostream>

class BSTree {
private:
    // Node structure
    struct Node {
        int value;
        Node* left;
        Node* right;

        Node(int val) : value(val), left(nullptr), right(nullptr) {}
    };

    Node* root;

    // METHODS
    Node* insert(Node* node, int value, int& steps);
    bool search(Node* node, int value, int& steps) const;
    void inOrder(Node* node) const;
    void deleteTree(Node* node);

public:
    // Constructor and destructor
    BSTree();
    ~BSTree();

    // METHODS
    void insert(int value, int& steps);           // Insert with step count
    bool search(int value, int& steps) const;     // Search with step count
    void inOrderTraversal() const;                // Print in order
    void clear();                                 // Remove all nodes
};
