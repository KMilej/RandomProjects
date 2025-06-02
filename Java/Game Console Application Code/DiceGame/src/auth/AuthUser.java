/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: AuthUser.java
 * Description: Stores authentication details and holds a reference to the associated User object.
 */

package auth;

import model.User;

public class AuthUser {
	private String userName;
	private String login;
	private String password;
	private User user; // COMPOSITION: AuthUser "has a" User

	// Constructor to create AuthUser with user details and associated User object
	public AuthUser(String userName, String login, String password, User user) {
		this.userName = userName;
		this.login = login;
		this.password = password;
		this.user = user;
	}

	// Returns the user name
	public String getuserName() {
		return userName;
	}

	// Returns the login
	public String getLogin() {
		return login;
	}

	// Returns the password
	public String getPassword() {
		return password;
	}

	// Returns the associated User object
	public User getUser() {
		return user;
	}

	// Returns the full name of the associated user
	public String getFullName() {
		return user.getFirstName() + " " + user.getLastName();
	}
}
