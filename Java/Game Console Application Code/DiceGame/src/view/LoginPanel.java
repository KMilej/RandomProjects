package view;

import java.awt.Color;
import java.awt.Graphics;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

import javax.swing.ImageIcon;
import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JPasswordField;
import javax.swing.JTextField;
import javax.swing.SwingUtilities;

import auth.AuthUser;
import controller.LoginController;
import game.Player;
import game.PlayerManager;

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



		JButton btnLogin_1 = new JButton("Register");
		btnLogin_1.addActionListener(new ActionListener() {
		    public void actionPerformed(ActionEvent e) {
		        JFrame currentFrame = (JFrame) SwingUtilities.getWindowAncestor(LoginPanel.this);
		        currentFrame.dispose();           // zamknij obecne okno (LoginFrame)
		        new RegisterFrame();              // otwórz nowe okno (RegisterFrame)
		    }
		});
		btnLogin_1.setBounds(46, 650, 221, 60);
		add(btnLogin_1);

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