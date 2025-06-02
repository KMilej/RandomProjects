/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: LoginFrame.java
 * Description: JFrame that displays the login panel for user authentication.
 */

package view;

import javax.swing.JFrame;

public class LoginFrame extends JFrame {

	private static final long serialVersionUID = 1L;

	// Constructs and displays the login window
	public LoginFrame() {
		super("Login Screen");

		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(1000, 750);
		setLocationRelativeTo(null);

		LoginPanel loginPanel = new LoginPanel();
		setContentPane(loginPanel);
		getRootPane().setDefaultButton(loginPanel.getLoginButton());

		setVisible(true);
	}
}
