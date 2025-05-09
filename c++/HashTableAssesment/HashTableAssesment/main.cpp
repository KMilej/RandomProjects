#include <iostream>
#include <vector>
#include <string>
#include "HashTable.h"

// Function to insert all elements from dataset into the hash table

int insertDataset(HashTable& table, const std::vector<std::string>& dataset) {
    int totalSteps = 0;

    for (const std::string& key : dataset) {
        int index = table.hash(key);       // Calculate initial index using hash function
        int startIndex = index;            // Save start index to detect full cycle
        int steps = 1;                     // First attempt counts as step 1

          // Linear probing if collision occurs (slot is not empty)
        while (!table.table[index].empty()) {
            index = (index + 1) % 10;      // Move to next slot (circular)
            steps++;
            if (index == startIndex) {     // Avoid infinite loop if table is full
                break;
            }
        }

        table.insert(key); // Insert key (actual implementation should handle probing again internally)
        std::cout << "Insert \"" << key << "\" took " << steps << " step(s).\n";

        totalSteps += steps; // Track total steps for analysis
    }

    return totalSteps;
}

// Function to search all elements from dataset in the hash table


int searchDataset(HashTable& table, const std::vector<std::string>& dataset) {
    int totalSteps = 0;

    for (const std::string& key : dataset) {
        int index = table.hash(key);
        int startIndex = index;
        int steps = 1;

       
        while (!table.search(key) && steps <= 10) {
            index = (index + 1) % 10;
            steps++;
            if (index == startIndex) break;     
        }

        totalSteps += steps;
    }

    return totalSteps;
}

int main() {
    HashTable table;

    // Dataset with low collisions – should perform well
    std::vector<std::string> optimalSet = {
        "cat", "dog", "sun", "pen", "box",
    };

    // Dataset with similar patterns – higher chance of collision
    std::vector<std::string> worstCaseSet = {
        "aaa", "cdf", "cee", "cff", "def"
    };

    // Dataset that exceeds table capacity (10) – shows overflow behavior
    std::vector<std::string> tooManyElementsSet = {
        "Richard", "Stuart", "Kamil", "Martyna", "Owen", "Ben", "Derek", "Josephine", "Jim", "Fiona", "Mark", "Edyta"
    };

    std::cout << "\n===== Real-life test (low collision) =====\n\n";
    table.init(); // Reset table
    int insertSteps1 = insertDataset(table, optimalSet);
    int searchSteps1 = searchDataset(table, optimalSet);
    table.printTable(); // Show final table
    std::cout << "Total insert steps: " << insertSteps1 << "\n";
    std::cout << "Total search steps: " << searchSteps1 << "\n";


    std::cout << "\n===== Test with values close in hash output (high collision) =====\n\n";
    table.init(); 
    int insertSteps2 = insertDataset(table, worstCaseSet);
    int searchSteps2 = searchDataset(table, worstCaseSet);
    table.printTable();
    std::cout << "Total insert steps: " << insertSteps2 << "\n";
    std::cout << "Total search steps: " << searchSteps2 << "\n";


    std::cout << "\n===== Test with more than 10 elements (overflow case) =====\n\n";
    table.init();
    int insertSteps3 = insertDataset(table, tooManyElementsSet);
    int searchSteps3 = searchDataset(table, tooManyElementsSet);
    table.printTable();
    std::cout << "Total insert steps: " << insertSteps3 << "\n";
    std::cout << "Total search steps: " << searchSteps3 << "\n\n";

    return 0;
}
