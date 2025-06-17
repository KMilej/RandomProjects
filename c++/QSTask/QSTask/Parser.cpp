#include "Parser.h"
#include "MyStack.h"
#include <cctype>

/* Return precedence of operators: * and / = 2, + and - = 1 */
int precedence(char op) {
    if (op == '*' || op == '/') return 2;
    if (op == '+' || op == '-') return 1;
    return 0;
}

/* All operators are left-associative */
bool isLeftAssociative(char op) {
    return true;
}

/* Check if the character is one of the valid operators */
bool isOperator(char ch) {
    return ch == '+' || ch == '-' || ch == '*' || ch == '/';
}

/*
  Converts an infix expression (e.g., "2+3*4") to a postfix queue (e.g., "2 3 4 * +").
  Uses custom MyStack and MyQueue classes.
*/
MyQueue toPostfix(const std::string& expression) {
    MyStack operators;
    MyQueue output;
    std::string number;

    for (char ch : expression) {
        if (isspace(ch)) continue;

        if (isdigit(ch)) {
            number += ch; // Support for multi-digit numbers
        }
        else {
            if (!number.empty()) {
                output.enqueue(number);
                number.clear();
            }

            if (isOperator(ch)) {
                // Pop from stack to output if operator precedence is higher or equal
                while (!operators.isEmpty()) {
                    char top = operators.top();
                    if ((precedence(top) > precedence(ch)) ||
                        (precedence(top) == precedence(ch) && isLeftAssociative(ch))) {
                        output.enqueue(std::string(1, operators.pop()));
                    }
                    else break;
                }
                operators.push(ch);
            }
            else if (ch == '(') {
                operators.push(ch);
            }
            else if (ch == ')') {
                // Pop everything until left parenthesis
                while (!operators.isEmpty() && operators.top() != '(') {
                    output.enqueue(std::string(1, operators.pop()));
                }
                if (!operators.isEmpty() && operators.top() == '(') {
                    operators.pop(); // Remove '('
                }
            }
        }
    }

    // Push last number if exists
    if (!number.empty()) {
        output.enqueue(number);
    }

    // Pop remaining operators
    while (!operators.isEmpty()) {
        output.enqueue(std::string(1, operators.pop()));
    }

    return output;
}
