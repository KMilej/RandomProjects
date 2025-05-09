#include "BSTree.h"

// Constructor: Initializes the root to nullptr (empty tree)
BSTree::BSTree() : root(nullptr) {}

// Destructor: Clears the entire tree when the object is destroyed
BSTree::~BSTree() {
	clear();
}

// Clears the tree by deleting all nodes
void BSTree::clear() {
	deleteTree(root);
	root = nullptr;
}

// Recursively deletes all nodes in the tree
void BSTree::deleteTree(Node* node) {
	if (node) {
		deleteTree(node->left);   // Delete left subtree
		deleteTree(node->right);  // Delete right subtree
		delete node;              // Delete current node
	}
}

// Public insert method: starts insertion from the root
void BSTree::insert(int value, int& steps) {
	root = insert(root, value, steps);
}

// Recursively inserts a value into the BST
BSTree::Node* BSTree::insert(Node* node, int value, int& steps) {
	steps++; // Count each step/recursion
	if (!node)
		return new Node(value); // Create new node when correct spot is found

	if (value < node->value) {
		node->left = insert(node->left, value, steps);  // Go left if value is smaller
		std::cout << "value insert at left\n";
	}
	else {
		node->right = insert(node->right, value, steps); // Go right otherwise
		std::cout << "value insert at right\n";
	}
	return node;
}

// Public search method: starts searching from the root
bool BSTree::search(int value, int& steps) const {
	return search(root, value, steps);
}



// Recursively searches for a value in the BST
bool BSTree::search(Node* node, int value, int& steps) const {
	if (!node) return false; // Base case: not found

	steps++; 
	if (node->value == value) return true; 
	else if (value < node->value)
		return search(node->left, value, steps); // Search in left subtree
	else
		return search(node->right, value, steps); // Search in right subtree
}

// Displays all node values using in-order traversal (left, root, right)
void BSTree::inOrderTraversal() const {
	std::cout << "In-order traversal: ";
	inOrder(root);
	std::cout << "\n";
}

// Recursively prints node values in-order
void BSTree::inOrder(Node* node) const {
	if (!node) return;
	inOrder(node->left);            // Visit left child
	std::cout << node->value << " "; // Visit current node
	inOrder(node->right);           // Visit right child
}
