#include <iostream>
#include <vector>
#include "BSTree.h"

int insertDataset(BSTree& tree, const std::vector<int>& dataset) {
    int totalSteps = 0;
    for (int value : dataset) {
        int steps = 0;
        tree.insert(value, steps);
        std::cout << "Inserted " << value << " in " << steps << " step(s)\n";
        totalSteps += steps;
    }
    return totalSteps;
}

int searchDataset(BSTree& tree, const std::vector<int>& dataset) {
    int totalSteps = 0;
    for (int value : dataset) {
        int steps = 0;
        tree.search(value, steps);
        std::cout << "Searched " << value << " in " << steps << " step(s)\n";
        totalSteps += steps;
    }
    return totalSteps;
}

int main() {
    BSTree tree;

    std::vector<int> optimalSet = { 16, 8, 24, 4, 12, 20, 28, 2, 6, 10, 14, 18, 22, 26, 30, 1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31 };
    std::vector<int> worstCaseSet = { 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31 };

    std::cout << "=== Optimal BST Test ===\n";
    int insertSteps1 = insertDataset(tree, optimalSet);
    int searchSteps1 = searchDataset(tree, optimalSet);
    tree.inOrderTraversal();
    std::cout << "Total insert steps: " << insertSteps1 << "\n";
    std::cout << "Total search steps: " << searchSteps1 << "\n";

    tree.clear();

    std::cout << "\n=== Worst Case BST Test ===\n";
    int insertSteps2 = insertDataset(tree, worstCaseSet);
    int searchSteps2 = searchDataset(tree, worstCaseSet);
    tree.inOrderTraversal();
    std::cout << "Total insert steps: " << insertSteps2 << "\n";
    std::cout << "Total search steps: " << searchSteps2 << "\n";

    return 0;
}
