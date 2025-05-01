//#pragma once
//#include "SetADT.h"
//#include <iostream>
//#include <vector>
//
///* PROPERTIES */
//struct Set {
//    std::vector<int> elements;
//};
//
//class ArraySet : public SetADT {
//public:
//    /* METHODS */
//
//    void add(Set& set, int data) override {
//        for (int el : set.elements) {
//            if (el == data) return; /// no duplicate
//        }
//        set.elements.push_back(data);
//    }
//
//    void remove(Set& set, int data) override {
//        for (auto it = set.elements.begin(); it != set.elements.end(); ++it) {
//            if (*it == data) {
//                set.elements.erase(it);
//                return;
//            }
//        }
//    }
//
//    void showSet(Set set) override {
//        std::cout << "{ ";
//        for (int el : set.elements) {
//            std::cout << el << " ";
//        }
//        std::cout << "}" << std::endl;
//    }
//
//    void intersection(Set set1, Set set2) override {
//        std::cout << "Intersection: { ";
//        for (int el1 : set1.elements) {
//            for (int el2 : set2.elements) {
//                if (el1 == el2) {
//                    std::cout << el1 << " ";
//                    break;
//                }
//            }
//        }
//        std::cout << "}" << std::endl;
//    }
//
//    void difference(Set set1, Set set2) override {
//        std::cout << "Difference (set1 - set2): { ";
//        for (int el1 : set1.elements) {
//            bool found = false;
//            for (int el2 : set2.elements) {
//                if (el1 == el2) {
//                    found = true;
//                    break;
//                }
//            }
//            if (!found) std::cout << el1 << " ";
//        }
//        std::cout << "}" << std::endl;
//    }
//
//    bool isEmpty(Set set) override {
//        return set.elements.empty();
//    }
//};
