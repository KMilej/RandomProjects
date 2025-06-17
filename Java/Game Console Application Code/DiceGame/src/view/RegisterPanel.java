/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: RegisterPanel.java
 * Description: JPanel that displays a registration form and handles new user creation.
 */

package view;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.event.ActionEvent;

import javax.swing.*;

import controller.RegisterController;
import game.Player;

public class RegisterPanel extends JPanel {

	private static final long serialVersionUID = 1L;
	private Image backgroundImage;
	private JButton btnRegister;

	// Builds the registration form and handles registration logic
	public RegisterPanel() {
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

		// Title
		JLabel titleLabel = new JLabel("Please Register To Play");
		titleLabel.setFont(new Font("Arial", Font.BOLD, 36));
		titleLabel.setForeground(Color.BLACK);
		titleLabel.setHorizontalAlignment(SwingConstants.CENTER);
		titleLabel.setBounds(117, 30, 707, 50);
		add(titleLabel);

		// Form fields
		JLabel lblUsername = new JLabel("Username:");
		lblUsername.setBounds(100, 100, 100, 25);
		add(lblUsername);
		JTextField txtUsername = new JTextField();
		txtUsername.setBounds(200, 100, 150, 25);
		add(txtUsername);

		JLabel lblLogin = new JLabel("Login:");
		lblLogin.setBounds(100, 140, 100, 25);
		add(lblLogin);
		JTextField txtLogin = new JTextField();
		txtLogin.setBounds(200, 140, 150, 25);
		add(txtLogin);

		JLabel lblPassword = new JLabel("Password:");
		lblPassword.setBounds(100, 180, 100, 25);
		add(lblPassword);
		JPasswordField txtPassword = new JPasswordField();
		txtPassword.setBounds(200, 180, 150, 25);
		add(txtPassword);

		JLabel lblFirstName = new JLabel("First Name:");
		lblFirstName.setBounds(100, 220, 100, 25);
		add(lblFirstName);
		JTextField txtFirstName = new JTextField();
		txtFirstName.setBounds(200, 220, 150, 25);
		add(txtFirstName);

		JLabel lblLastName = new JLabel("Last Name:");
		lblLastName.setBounds(100, 260, 100, 25);
		add(lblLastName);
		JTextField txtLastName = new JTextField();
		txtLastName.setBounds(200, 260, 150, 25);
		add(txtLastName);

		JLabel lblAddress = new JLabel("Address:");
		lblAddress.setBounds(100, 300, 100, 25);
		add(lblAddress);
		JTextField txtAddress = new JTextField();
		txtAddress.setBounds(200, 300, 150, 25);
		add(txtAddress);

		// Register button
		btnRegister = new JButton("Register");
		btnRegister.setBounds(200, 360, 150, 40);
		add(btnRegister);

		// Register logic
		btnRegister.addActionListener((ActionEvent e) -> {
			String username = txtUsername.getText();
			String login = txtLogin.getText();
			String password = new String(txtPassword.getPassword());
			String firstName = txtFirstName.getText();
			String lastName = txtLastName.getText();
			String address = txtAddress.getText();

			if (username.isEmpty() || login.isEmpty() || password.isEmpty() || firstName.isEmpty() || lastName.isEmpty()
					|| address.isEmpty()) {
				JOptionPane.showMessageDialog(this, "Please fill in all fields.");
				return;
			}

			RegisterController controller = new RegisterController();
			Player newPlayer = controller.register(username, login, password, firstName, lastName, address);

			if (newPlayer == null) {
				JOptionPane.showMessageDialog(this, "Username or login already taken.");
				return;
			}

			game.PlayerManager manager = new game.PlayerManager();
			try {
				manager.validatePlayer(newPlayer);
				manager.addPlayer(newPlayer);
				manager.saveToJson();

				JOptionPane.showMessageDialog(this, "Player registered successfully!");

				JFrame currentFrame = (JFrame) SwingUtilities.getWindowAncestor(this);
				currentFrame.dispose();
				new LoginFrame();
			} catch (common.InvalidPlayerException ex) {
				JOptionPane.showMessageDialog(this, "Registration failed: " + ex.getMessage());
			}

//			JOptionPane.showMessageDialog(this, "Player registered successfully!");
//
//			JFrame currentFrame = (JFrame) SwingUtilities.getWindowAncestor(this);
//			currentFrame.dispose();              
//			new LoginFrame();                    
		});
	}

	// Draws the background image for the panel
	@Override
	protected void paintComponent(Graphics g) {
		super.paintComponent(g);
		if (backgroundImage != null) {
			g.drawImage(backgroundImage, 0, 0, getWidth(), getHeight(), this);
		}
	}

	// Returns the register button (for test or automation support)
	public JButton getRegisterButton() {
		return btnRegister;
	}
}
