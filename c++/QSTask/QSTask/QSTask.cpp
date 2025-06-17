#include <iostream>
#include <stack>
#include <queue>
#include <string>
#include <cctype>

int precedence(char op) {
    if (op == '*' || op == '/') return 2;
    if (op == '+' || op == '-') return 1;
    return 0;
}

bool isLeftAssociative(char op) {
    return true; // + - * / są lewostronne
}

std::queue<std::string> toPostfix(const std::string& expression) {
    std::stack<char> operators;
    std::queue<std::string> output;
    std::string number;

    for (char ch : expression) {
        if (std::isspace(ch)) continue;

        if (std::isdigit(ch)) {
            number += ch;
        }
        else {
            if (!number.empty()) {
                output.push(number);
                number.clear();
            }

            if (ch == '+' || ch == '-' || ch == '*' || ch == '/') {
                while (!operators.empty()) {
                    char top = operators.top();
                    if ((precedence(top) > precedence(ch)) ||
                        (precedence(top) == precedence(ch) && isLeftAssociative(ch))) {
                        output.push(std::string(1, top));
                        operators.pop();
                    }
                    else break;
                }
                operators.push(ch);
            }
            else if (ch == '(') {
                operators.push(ch);
            }
            else if (ch == ')') {
                while (!operators.empty() && operators.top() != '(') {
                    output.push(std::string(1, operators.top()));
                    operators.pop();
                }
                if (!operators.empty() && operators.top() == '(') {
                    operators.pop(); // discard '('
                }
            }
        }
    }

    if (!number.empty()) {
        output.push(number);
    }

    while (!operators.empty()) {
        output.push(std::string(1, operators.top()));
        operators.pop();
    }

    return output;
}

void runTest(const std::string& name, const std::string& expr) {
    std::cout << "[" << name << "] Infix: " << expr << "\nPostfix: ";
    std::queue<std::string> postfix = toPostfix(expr);
    while (!postfix.empty()) {
        std::cout << postfix.front() << " ";
        postfix.pop();
    }
    std::cout << "\n\n";
}

int main() {
    std::cout << "Running all test cases:\n\n";
    runTest("Easy Test", "2+4+8-2");
    runTest("Normal Test", "2-1+3/3+12*5");
    runTest("Hard Test", "2+(2+2)*2*(2/2)");
    return 0;
}
