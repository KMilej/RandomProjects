package view;

import javax.swing.JPanel;

import game.GameOne;
import game.GameTwo;

public class GameTwoPanel extends JPanel {

	private static final long serialVersionUID = 1L;

	/**
	 * Create the panel.
	 */
	public GameTwoPanel() {

		GameTwo gameTwo = new GameTwo();
		gameTwo.play(this); // ← buduje całą zawartość na tym panelu
	}

}
