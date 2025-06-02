package view;

import javax.swing.JFrame;

public class GameMenuFrame extends JFrame {

	private static final long serialVersionUID = 1L;

	public GameMenuFrame() {
		super("Login Screen");

		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(1000, 750);
		setLocationRelativeTo(null);

		GameMenuPanel GameMenu = new GameMenuPanel();
		setContentPane(GameMenu);

		setVisible(true);
	}

}
