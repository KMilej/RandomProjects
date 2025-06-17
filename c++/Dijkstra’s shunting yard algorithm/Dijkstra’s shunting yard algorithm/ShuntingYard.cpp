// ShuntingYard.cpp

#include "ShuntingYard.h"
#include <cctype>
#include <sstream>
#include <stdexcept>

// Konstruktor z rozmiarem stosu i kolejki
ShuntingYard::ShuntingYard(int stackSize, int queueSize)
    : operatorStack(stackSize), outputQueue(queueSize) {
}

// Główna metoda konwertująca infix na postfix
void ShuntingYard::parse(const std::string& infixExpression) {
    operatorStack.init();
    outputQueue.init();

    std::vector<Token> tokens = tokenize(infixExpression);

    for (const auto& token : tokens) {
        if (token.type == OPERAND) {
            outputQueue.add(token);
        }
        else if (token.type == OPERATOR) {
            while (!operatorStack.isEmpty()) {
                Token top = operatorStack.top();
                if (top.type == OPERATOR &&
                    (precedence(top.value) > precedence(token.value) ||
                        (precedence(top.value) == precedence(token.value) && isLeftAssociative(token.value)))) {
                    outputQueue.add(operatorStack.remove());
                }
                else {
                    break;
                }
            }
            operatorStack.add(token);
        }
        else if (token.type == LEFT_PAREN) {
            operatorStack.add(token);
        }
        else if (token.type == RIGHT_PAREN) {
            while (!operatorStack.isEmpty() && operatorStack.top().type != LEFT_PAREN) {
                outputQueue.add(operatorStack.remove());
            }
            if (!operatorStack.isEmpty() && operatorStack.top().type == LEFT_PAREN) {
                operatorStack.remove(); // discard '('
            }
            else {
                throw std::runtime_error("Mismatched parentheses");
            }
        }
    }

    while (!operatorStack.isEmpty()) {
        Token top = operatorStack.remove();
        if (top.type == LEFT_PAREN || top.type == RIGHT_PAREN) {
            throw std::runtime_error("Mismatched parentheses");
        }
        outputQueue.add(top);
    }
}

Queue<Token> ShuntingYard::getPostfixQueue() const {
    return outputQueue;
}

// Tokenizacja stringa
std::vector<Token> ShuntingYard::tokenize(const std::string& expression) {
    std::vector<Token> tokens;
    std::string number;

    for (char ch : expression) {
        if (std::isspace(ch)) continue;

        if (std::isdigit(ch)) {
            number += ch;
        }
        else {
            if (!number.empty()) {
                tokens.push_back({ OPERAND, number });
                number.clear();
            }

            if (ch == '+' || ch == '-' || ch == '*' || ch == '/') {
                tokens.push_back({ OPERATOR, std::string(1, ch) });
            }
            else if (ch == '(') {
                tokens.push_back({ LEFT_PAREN, "(" });
            }
            else if (ch == ')') {
                tokens.push_back({ RIGHT_PAREN, ")" });
            }
            else {
                throw std::runtime_error(std::string("Unknown character: ") + ch);
            }
        }
    }

    if (!number.empty()) {
        tokens.push_back({ OPERAND, number });
    }

    return tokens;
}

// Priorytet operatorów
int ShuntingYard::precedence(const std::string& op) const {
    if (op == "*" || op == "/") return 2;
    if (op == "+" || op == "-") return 1;
    return 0;
}

// Lewostronna łączność
bool ShuntingYard::isLeftAssociative(const std::string& op) const {
    return (op == "+" || op == "-" || op == "*" || op == "/");
}

// Czy to operator?
bool ShuntingYard::isOperator(const std::string& s) const {
    return (s == "+" || s == "-" || s == "*" || s == "/");
}
