// Token.h

#ifndef TOKEN_H
#define TOKEN_H

#include <string>

enum TokenType {
    OPERAND,
    OPERATOR,
    LEFT_PAREN,
    RIGHT_PAREN
};

struct Token {
    TokenType type;
    std::string value;
};

#endif
