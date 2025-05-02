#include <iostream>
#include <vector>
#include <string>
#include "HashTable.h"

//function to insert a dataset and count steps

int insertDataset(HashTable& table, const std::vector<std::string>& dataset) {
    int totalSteps = 0;
    for (const std::string& key : dataset) {
        int index = table.hash(key);
        int startIndex = index;
        int steps = 1;

        while (!table.table[index].empty()) {
            index = (index + 1) % 10;
            steps++;
            if (index == startIndex) {
                break;
            }
        }
        table.insert(key);
        totalSteps += steps;
    }
    return totalSteps;
}

//  Moved outside insertDataset!
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

    std::vector<std::string> optimalSet = {
        "cat", "dog", "sun", "pen", "box"
    };

    std::vector<std::string> worstCaseSet = {
        "aaa", "aba", "aca", "ada", "aea"
    };

    std::cout << "===== real life test =====\n";
    table.init();
    int insertSteps1 = insertDataset(table, optimalSet);
    int searchSteps1 = searchDataset(table, optimalSet);
    table.printTable();
    std::cout << "Total insert steps: " << insertSteps1 << "\n";
    std::cout << "Total search steps: " << searchSteps1 << "\n\n";

    std::cout << "===== test with extrime value close to each order =====\n";
    table.init();
    int insertSteps2 = insertDataset(table, worstCaseSet);
    int searchSteps2 = searchDataset(table, worstCaseSet);
    table.printTable();
    std::cout << "Total insert steps: " << insertSteps2 << "\n";
    std::cout << "Total search steps: " << searchSteps2 << "\n";

    return 0;
}







//int insertDataset(HashTable& table, const std::vector<std::string>& dataset) {
//    int steps = 0;
//    for (const std::string& key : dataset) {
//        int localSteps = 1;
//        int index = table.hash(key);
//
//        while (table.search(key) == false && localSteps <= 10) {
//            index = (index + 1) % 10;
//            localSteps++;
//        }
//
//        table.insert(key);
//        steps += localSteps;
//    }
//    return steps;
//}