/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: LoginPanel.java
 * Description: JPanel that displays the login form and handles user authentication and navigation.
 */

package view;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.*;

import controller.LoginController;
import game.Player;

public class LoginPanel extends JPanel {

	private static final long serialVersionUID = 1L;
	private JButton btnLogin;
	private Image backgroundImage;

	// Constructs the login panel interface with input fields and buttons
	public LoginPanel() {
		setLayout(null);
		setSize(1000, 750);

		// Load background image
		if (java.beans.Beans.isDesignTime()) {
			backgroundImage = new ImageIcon("src/recources/dicegame.png").getImage();
		} else {
			backgroundImage = new ImageIcon(getClass().getResource("/recources/dicegame.png")).getImage();
		}

		setBackground(new Color(192, 192, 192));
		setOpaque(true);

		// Username field
		JLabel lblUsername = new JLabel("Username:");
		lblUsername.setBounds(156, 122, 100, 25);
		add(lblUsername);

		JTextField txtUsername = new JTextField();
		txtUsername.setBounds(117, 158, 150, 25);
		add(txtUsername);

		// Password field
		JLabel lblPassword = new JLabel("Password:");
		lblPassword.setBounds(381, 122, 100, 25);
		add(lblPassword);

		JPasswordField txtPassword = new JPasswordField();
		txtPassword.setBounds(344, 158, 150, 25);
		add(txtPassword);

		// Login button
		btnLogin = new JButton("Login");
		btnLogin.setBounds(544, 140, 221, 60);
		add(btnLogin);

		// Handle login action
		btnLogin.addActionListener(e -> {
			String username = txtUsername.getText();
			String password = new String(txtPassword.getPassword());

			if (username.isEmpty() || password.isEmpty()) {
				JOptionPane.showMessageDialog(LoginPanel.this, "Please enter both username and password.");
				return;
			}

			LoginController controller = new LoginController();
			Player matchedPlayer = controller.authenticate(username, password);

			if (matchedPlayer != null) {
				common.Session.login(matchedPlayer);
				JOptionPane.showMessageDialog(LoginPanel.this, "Welcome, " + matchedPlayer.getPlayerName() + "!");
				SwingUtilities.getWindowAncestor(LoginPanel.this).dispose();
				new GameMenuFrame();
			} else {
				JOptionPane.showMessageDialog(LoginPanel.this, "Username or password is incorrect.");
			}
		});

		// Register button
		JButton btnRegister = new JButton("Register");
		btnRegister.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				JFrame currentFrame = (JFrame) SwingUtilities.getWindowAncestor(LoginPanel.this);
				currentFrame.dispose(); // Close current window (LoginFrame)
				new RegisterFrame(); // Open new window (RegisterFrame)
			}
		});
		btnRegister.setBounds(46, 650, 221, 60);
		add(btnRegister);
	}

	// Returns the login button (used for testing or automation)
	public JButton getLoginButton() {
		return btnLogin;
	}

	// Draws the background image for the panel
	@Override
	protected void paintComponent(Graphics g) {
		super.paintComponent(g);
		if (backgroundImage != null) {
			g.drawImage(backgroundImage, 0, 0, getWidth(), getHeight(), this);
		}
	}
}
