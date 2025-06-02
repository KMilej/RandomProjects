/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: RegisterFrame.java
 * Description: JFrame that displays the registration panel for creating a new player account.
 */

package view;

import javax.swing.JFrame;

public class RegisterFrame extends JFrame {

	private static final long serialVersionUID = 1L;

	// Constructs and displays the registration window
	public RegisterFrame() {
		super("Register Screen");

		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(1000, 750);
		setLocationRelativeTo(null);

		RegisterPanel loginRegister = new RegisterPanel();
		setContentPane(loginRegister);
		getRootPane().setDefaultButton(loginRegister.getRegisterButton());

		setVisible(true);
	}
}
