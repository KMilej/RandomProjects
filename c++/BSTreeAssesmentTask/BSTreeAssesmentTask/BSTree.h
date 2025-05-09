#pragma once
#include <iostream>

class BSTree {
private:
	// Node structure to hold individual tree elements
	struct Node {
		int value; //value stored in the node
		Node* left;  // pointer to left child
		Node* right;  //pointer to right child

		// Constructor to initialize node with value
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
