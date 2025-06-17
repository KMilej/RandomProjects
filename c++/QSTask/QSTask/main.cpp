#include <iostream>
#include "Parser.h"  // Declaration of toPostfix()

/*
  Runs a single infix-to-postfix test case.
  Prints the original expression and its postfix conversion.
*/
void runTest(const std::string& name, const std::string& expr) {
    std::cout << "[" << name << "] Infix: " << expr << "\nPostfix: ";
    MyQueue postfix = toPostfix(expr);
    while (!postfix.isEmpty()) {
        std::cout << postfix.dequeue() << " ";
    }
    std::cout << "\n\n";
}

/*
  Main function – runs multiple test cases.
*/
int main() {
    std::cout << "Running all test cases:\n\n";
    runTest("Easy Test", "2+4+8-2");
    runTest("Normal Test", "2-1+3/3+12*5");
    runTest("Hard Test", "2+(2+2)*2*(2/2)");
    return 0;
}
