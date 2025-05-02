#include <iostream>
#include <vector>
#include <string>
#include "HashTable.h"

// Helper function to insert a dataset and count steps
int insertDataset(HashTable& table, const std::vector<std::string>& dataset) {
    int steps = 0;
    for (const std::string& key : dataset) {
        int localSteps = 1;
        int index = table.hash(key);

        // Count how many steps are needed for insertion
        while (table.search(key) == false && table.search("") == false && table.search(key) != true) {
 {
            index = (index + 1) % 10;
            localSteps++;
        }

        table.insert(key);
        steps += localSteps;
    }
    return steps;
}

// Helper function to search a dataset and count steps
int searchDataset(HashTable& table, const std::vector<std::string>& dataset) {
    int steps = 0;
    for (const std::string& key : dataset) {
        int index = table.hash(key);
        int startIndex = index;
        int localSteps = 1;

        while (true) {
            if (table.search(key)) {
                break;
            }

            index = (index + 1) % 10;
            localSteps++;

            if (index == startIndex) {
                break; // looped all the way around
            }
        }

        steps += localSteps;
    }
    return steps;
}

int main() {
    HashTable table;

    std::vector<std::string> optimalSet = {
        "cat", "dog", "sun", "pen", "box"
    };

    std::vector<std::string> worstCaseSet = {
        "aaa", "aba", "aca", "ada", "aea"
    };

    std::cout << "===== OPTIMAL DATASET =====\n";
    table.init();
    int insertSteps1 = insertDataset(table, optimalSet);
    int searchSteps1 = searchDataset(table, optimalSet);
    table.printTable();
    std::cout << "Total insert steps: " << insertSteps1 << "\n";
    std::cout << "Total search steps: " << searchSteps1 << "\n\n";

    std::cout << "===== WORST-CASE DATASET =====\n";
    table.init();
    int insertSteps2 = insertDataset(table, worstCaseSet);
    int searchSteps2 = searchDataset(table, worstCaseSet);
    table.printTable();
    std::cout << "Total insert steps: " << insertSteps2 << "\n";
    std::cout << "Total search steps: " << searchSteps2 << "\n";

    return 0;
}
