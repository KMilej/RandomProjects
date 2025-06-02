package view;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

public class GameOneFrame extends JFrame {

	private static final long serialVersionUID = 1L;

	public GameOneFrame() {
		super("Login Screen");

        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(1000, 750);
        setLocationRelativeTo(null);

        GameOnePanel GameOne = new GameOnePanel();
        setContentPane(GameOne);
//        getRootPane().setDefaultButton(loginPanel.getLoginButton());

        setVisible(true);
	}

}
