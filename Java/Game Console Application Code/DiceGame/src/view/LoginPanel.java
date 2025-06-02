package view;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;
import javax.swing.SwingConstants;

public class LoginPanel extends JPanel {

	private static final long serialVersionUID = 1L;
	private JButton btnLogin;
	private Image backgroundImage;


	/**
	 * Create the panel.
	 */
	public LoginPanel() {
		setLayout(null);
		setSize(1000, 750);

		if (java.beans.Beans.isDesignTime()) {
			backgroundImage = new ImageIcon("src/recources/dicegame.png").getImage();
		} else {
			backgroundImage = new ImageIcon(getClass().getResource("/recources/dicegame.png")).getImage();
		}


		setBackground(new Color(192, 192, 192));
		setOpaque(true);

		JLabel lblUsername = new JLabel("Username:");
		lblUsername.setBounds(156, 122, 100, 25);
		add(lblUsername);

		JTextField txtUsername = new JTextField();
		txtUsername.setBounds(117, 158, 150, 25);
		add(txtUsername);

		JLabel lblPassword = new JLabel("Password:");
		lblPassword.setBounds(381, 122, 100, 25);
		add(lblPassword);

		JPasswordField txtPassword = new JPasswordField();
		txtPassword.setBounds(344, 158, 150, 25);
		add(txtPassword);

		btnLogin = new JButton("Login");
		btnLogin.setBounds(544, 140, 221, 60);
		add(btnLogin);

//		btnLogin.addActionListener(new ActionListener() {
//			public void actionPerformed(ActionEvent e) {
//				String username = txtUsername.getText();
//				String password = new String(txtPassword.getPassword());
//
//				if (username.isEmpty() || password.isEmpty()) {
//					JOptionPane.showMessageDialog(LoginPanel.this, "Please enter both username and password.");
//					return;
//				}
//
//				CoachManager coachManager = new CoachManager();
//				LoginValidation validator = new LoginValidation(coachManager);
//				Coach coach = validator.authenticate(username, password);
//
//				if (coach != null) {
//					JOptionPane.showMessageDialog(LoginPanel.this, "Welcome, " + coach.getFirstName() + "!");
//					SwingUtilities.getWindowAncestor(LoginPanel.this).dispose();
//					new CoachMenu(coach);
//				} else {
//					JOptionPane.showMessageDialog(LoginPanel.this, "Incorrect username or password.");
//				}
//			}
//		});

		JLabel titleLabel = new JLabel("Welcome to Dice Game Login Menu");
		titleLabel.setFont(new Font("Arial", Font.BOLD, 36));
		titleLabel.setForeground(Color.BLACK);
		titleLabel.setHorizontalAlignment(SwingConstants.CENTER);
		titleLabel.setBounds(117, 43, 707, 50);
		add(titleLabel);
	}

	/**
	 * Returns the login button (useful for testing or automation).
	 *
	 * @return login button
	 */
	public JButton getLoginButton() {
		return btnLogin;
	}
	
	@Override
	protected void paintComponent(Graphics g) {
		super.paintComponent(g);
		if (backgroundImage != null) {
			g.drawImage(backgroundImage, 0, 0, getWidth(), getHeight(), this);
		}
	}

}