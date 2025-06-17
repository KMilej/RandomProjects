#pragma once
// ShuntingYard.h

#ifndef SHUNTINGYARD_H
#define SHUNTINGYARD_H

#include <vector>
#include <string>
#include "Token.h"
#include "Stack.h"
#include "Queue.h"

class ShuntingYard {
public:
    ShuntingYard(int stackSize, int queueSize);

    void parse(const std::string& infixExpression);
    Queue<Token> getPostfixQueue() const;

private:
    Stack<Token> operatorStack;
    Queue<Token> outputQueue;

    std::vector<Token> tokenize(const std::string& expression);
    int precedence(const std::string& op) const;
    bool isOperator(const std::string& s) const;
    bool isLeftAssociative(const std::string& op) const;
};

#endif
