package auth;

import model.User;

public class AuthUser {
	private String userName;
	private String login;
	private String password;
	private User user; // KOMPOZYCJA: AuthUser "ma" Usera

	public AuthUser(String userName, String login, String password, User user) {
		this.userName = userName;
		this.login = login;
		this.password = password;
		this.user = user;
	}

	public String getuserName() {
		return userName;
	}

	public String getLogin() {
		return login;
	}

	public String getPassword() {
		return password;
	}

	public User getUser() {
		return user;
	}

	public String getFullName() {
		return user.getFirstName() + " " + user.getLastName();
	}
}