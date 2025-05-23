// Outcome4-Exercise 3.cpp : This file contains the 'main' function. Program execution begins and ends there.
//

#include <iostream>
#include <unordered_map>
#include <string>
#include <map>
using namespace std;

int main()
{

	cout << "<><><><><><><><><><><><><><><><>Test 1<><><><><><><><><><><><><><><><><><><><>\n";
	unordered_map<string, string> stateList;   // i use it because show better in my order
	//map<string, string>:: it; //classic c++ method
	cout << "map size: " << stateList.size() << endl;   //show how many item are in stateList

	cout << "<><><><><><><><><><><><><><><><>Test 2<><><><><><><><><><><><><><><><><><><><>\n";

	auto it = stateList.begin(); //This creates iterator named "it" and initializes it to point to the beginning of the stateList container
	stateList["\nEmployee"] = "Phone number\n";
	stateList["Riya M."] = "5134"; //add to the stateList new key pair value
	stateList["Morag C."] = "3374"; //add to the stateList new key pair value
	stateList["David D."] = "1923"; //add to the stateList new key pair value
	stateList["Helmut A."] = "7582"; //add to the stateList new key pair value

	//cout << "map size: " << stateList.size() << endl;

	// this iterate from all elements in container statelist ,ii inicialize iterator ii to take 1st element in map, ii != state.end() check if there is still something to check., ++ii move iterator to the next element in map, ii - > first represent key value of name , ii -> secound perresent value of telephone number.
	for (auto ii = stateList.begin(); ii != stateList.end(); ++ii) {  
		cout << ii->first << ":\t" << ii->second << endl;
	}
	cout << "<><><><><><><><><><><><><><><><>Test 3<><><><><><><><><><><><><><><><><><><><>\n\n";

	if (stateList.count("David D.") > 0)   //check if statelist include David D 
		cout << "David D. => " << stateList.find("David D.")->second << '\n'; // if include then want to find pair for him ->second
	else
		cout << "David D. => Not present \n"; // if not in our stateList then we see information he is not in the list

	cout << "<><><><><><><><><><><><><><><><>Test 4<><><><><><><><><><><><><><><><><><><><>\n\n";

	if (stateList.count("Samantha S.") > 0)
		cout << "Samantha S. => " << stateList.find("Samantha S.")->second << '\n';
	else
		cout << "Samantha S. => Not present \n";

	cout << "<><><><><><><><><><><><><><><><>Test 5 - remove David D. ><><><><><><><><><><><><><><><><>\n\n";

	it = stateList.find("David D.");  // asign "it" of value Dvid D. and
	stateList.erase(it); // erase "it" then our David D

	for (auto ii = stateList.begin(); ii != stateList.end(); ++ii) {
		cout << ii->first << ":\t" << ii->second << endl; // show list of all values
	}
	cout << "<><><><><><><><><><><><><><><><>Test 6 add <><><><><><><><><><><><><><><><><>\n\n";

	// Adding new employees
;
	stateList["Kody U."] = "6019";		//add to the stateList new key pair value
	stateList["Gabriela V."] = "7029";	//add to the stateList new key pair value
	stateList["Felix Q."] = "4092";	//add to the stateList new key pair value
	stateList["Rio N."] = "1024";	//add to the stateList new key pair value

	for (auto ii = stateList.begin(); ii != stateList.end(); ++ii) {
		cout << ii->first << ": \t" << ii->second << endl; // show list of all values
	}

	cout << "<><><><><><><><><><><><><><><><>Test 7 remove all data <><><><><><><><><><><><><><><><><>\n\n";

	stateList.clear();  // remove data from stateList

	cout << "All data removed.\n";
	cout << "Map size after clear: " << stateList.size() << endl; // show how many elements are in stateList

}
