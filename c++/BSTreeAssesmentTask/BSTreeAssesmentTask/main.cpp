#include <iostream>
#include <vector>
#include "BSTree.h"

// Inserts a dataset into the BST and returns the total number of steps taken
int insertDataset(BSTree& tree, const std::vector<int>& dataset) {
    int totalSteps = 0;
    for (int value : dataset) {
        int steps = 0;
        tree.insert(value, steps); // Insert each value and count steps
        std::cout << "Inserted " << value << " in " << steps << " step(s)\n";
        totalSteps += steps; // Accumulate steps
    }
    return totalSteps;
}

// Searches all values from dataset in the BST and returns the total number of steps
int searchDataset(BSTree& tree, const std::vector<int>& dataset) {
    int totalSteps = 0;
    for (int value : dataset) {
        int steps = 0;
        tree.search(value, steps); // Search for each value and count steps
        std::cout << "Searched " << value << " in " << steps << " step(s)\n";
        totalSteps += steps;
    }
    return totalSteps;
}

int main() {
    BSTree tree;

    // Balanced (optimal) dataset - creates a well-structured BST
    std::vector<int> optimalSet = {
        16, 8, 24, 4, 12, 20, 28, 2, 6, 10, 14,
        18, 22, 26, 30, 1, 3, 5, 7, 9, 11, 13,
        15, 17, 19, 21, 23, 25, 27, 29, 31
    };

    // Unbalanced (worst case) dataset - creates a skewed BST like a linked list
    std::vector<int> worstCaseSet = {
        1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12,
        13, 14, 15, 16, 17, 18, 19, 20, 21, 22,
        23, 24, 25, 26, 27, 28, 29, 30, 31
    };

    std::cout << "=== Optimal BST Test ===\n";
    int insertSteps1 = insertDataset(tree, optimalSet);     
    int searchSteps1 = searchDataset(tree, optimalSet);      
    tree.inOrderTraversal();                                 // Show tree in order
    std::cout << "Total insert steps: " << insertSteps1 << "\n";
    std::cout << "Total search steps: " << searchSteps1 << "\n";

    tree.clear(); // Remove all nodes to reset the tree

    std::cout << "\n=== Worst Case BST Test ===\n";
    int insertSteps2 = insertDataset(tree, worstCaseSet);    
    int searchSteps2 = searchDataset(tree, worstCaseSet);    
    tree.inOrderTraversal();                                 // Show resulting tree
    std::cout << "Total insert steps: " << insertSteps2 << "\n";
    std::cout << "Total search steps: " << searchSteps2 << "\n";

    return 0;
}
