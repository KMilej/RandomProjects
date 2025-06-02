package view;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

public class LoginFrame extends JFrame {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	/**
	 * Create the frame.
	 */
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
