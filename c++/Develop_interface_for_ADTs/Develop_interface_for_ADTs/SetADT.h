#pragma once
#ifndef SETADT_H   // check if SETADT_H is defined.
#define SETADT_H

struct Set; //its needed because interface use type (Set)


         /*CODE PROVIDED IN ILEARN for Task Exercise 1. (b) */
struct SetADT {
    virtual void add(Set& set, int data) = 0;
    virtual void remove(Set& set, int data) = 0;
    virtual void showSet(Set set) = 0;

    virtual void intersection(Set set1, Set set2) = 0;
    virtual void difference(Set set1, Set set2) = 0;
    virtual bool isEmpty(Set set) = 0;

    virtual ~SetADT() {} // its crucial for not data leak 
};

#endif // end conditional block