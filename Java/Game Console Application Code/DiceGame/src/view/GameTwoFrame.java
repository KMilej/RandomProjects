package view;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

public class GameTwoFrame extends JFrame {

	private static final long serialVersionUID = 1L;

	public GameTwoFrame() {
		super("game two");

        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setSize(1000, 750);
        setLocationRelativeTo(null);

        GameTwoPanel GameTwo = new GameTwoPanel();
        setContentPane(GameTwo);
//        getRootPane().setDefaultButton(loginPanel.getLoginButton());

        setVisible(true);
	}

}
