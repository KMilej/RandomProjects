/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: User.java
 * Description: Represents basic user information such as first name, last name, and address.
 */

package model;

public class User {
	private String firstName;
	private String lastName;
	private String address;

	// Constructor to initialize a User with name and address
	public User(String firstName, String lastName, String address) {
		this.firstName = firstName;
		this.lastName = lastName;
		this.address = address;
	}

	// Returns the user's first name
	public String getFirstName() {
		return firstName;
	}

	// Returns the user's last name
	public String getLastName() {
		return lastName;
	}

	// Returns the user's address
	public String getAddress() {
		return address;
	}
}
