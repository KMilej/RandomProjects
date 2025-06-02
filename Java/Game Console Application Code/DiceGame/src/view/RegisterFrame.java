package view;


import javax.swing.JFrame;


public class RegisterFrame extends JFrame {

	private static final long serialVersionUID = 1L;

	public RegisterFrame() {
		super("Login Screen");

		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(1000, 750);
		setLocationRelativeTo(null);

		RegisterPanel loginRegister = new RegisterPanel();
		setContentPane(loginRegister);
		getRootPane().setDefaultButton(loginRegister.getRegisterButton());

		setVisible(true);
	}

}
