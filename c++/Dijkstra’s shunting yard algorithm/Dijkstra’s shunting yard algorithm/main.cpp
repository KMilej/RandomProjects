/*
  HF5735 Web Development: Dynamically Generated Content
  Author: Kamil Milej | Date: 30.05.2025
  Version: 1.0
*/

#include <iostream>
#include "ShuntingYard.h"
#include "Token.h"
#include "Queue.h"

void runTest(const std::string& testName, const std::string& expression) {
    try {
        ShuntingYard parser(100, 100); // stackSize, queueSize
        parser.parse(expression);

        Queue<Token> result = parser.getPostfixQueue();

        std::cout << "\n[" << testName << "]\n";
        std::cout << "Infix:    " << expression << "\n";
        std::cout << "Postfix:  ";
        while (!result.isEmpty()) {
            Token token = result.remove();
            std::cout << token.value << " ";
        }
        std::cout << "\n";
    }
    catch (const std::exception& ex) {
        std::cerr << "Error in " << testName << ": " << ex.what() << "\n";
    }
}

int main() {
    std::cout << "Running all test cases:\n";

    runTest("Easy Test", "2+4+8-2");
    runTest("Normal Test", "2-1+3/3+12*5");
    runTest("Hard Test", "2+(2+2)*2*(2/2)");

    return 0;
}
