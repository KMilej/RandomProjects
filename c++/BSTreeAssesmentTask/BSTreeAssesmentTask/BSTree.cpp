#include "BSTree.h"

BSTree::BSTree() : root(nullptr) {}

BSTree::~BSTree() {
    clear();
}

void BSTree::clear() {
    deleteTree(root);
    root = nullptr;
}

void BSTree::deleteTree(Node* node) {
    if (node) {
        deleteTree(node->left);
        deleteTree(node->right);
        delete node;
    }
}

void BSTree::insert(int value, int& steps) {
    root = insert(root, value, steps);
}

BSTree::Node* BSTree::insert(Node* node, int value, int& steps) {
    steps++;
    if (!node)
        return new Node(value);

    if (value < node->value)
        node->left = insert(node->left, value, steps);
    else
        node->right = insert(node->right, value, steps);

    return node;
}

bool BSTree::search(int value, int& steps) const {
    return search(root, value, steps);
}

bool BSTree::search(Node* node, int value, int& steps) const {
    if (!node) return false;

    steps++;
    if (node->value == value) return true;
    else if (value < node->value)
        return search(node->left, value, steps);
    else
        return search(node->right, value, steps);
}

void BSTree::inOrderTraversal() const {
    std::cout << "In-order traversal: ";
    inOrder(root);
    std::cout << "\n";
}

void BSTree::inOrder(Node* node) const {
    if (!node) return;
    inOrder(node->left);
    std::cout << node->value << " ";
    inOrder(node->right);
}
