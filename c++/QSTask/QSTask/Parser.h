#ifndef PARSER_H
#define PARSER_H

#include <string>
#include "MyQueue.h"

/*
  Converts an infix expression ("2+3*4") to a postfix expression ("2 3 4 * +").
  Returns the result as a MyQueue of string tokens.
*/
MyQueue toPostfix(const std::string& expression);

#endif // PARSER_H
