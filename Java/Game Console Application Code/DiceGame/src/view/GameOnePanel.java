package view;

import javax.swing.*;
import game.GameOne;

public class GameOnePanel extends JPanel {

	private static final long serialVersionUID = 1L;

	public GameOnePanel() {
        GameOne game = new GameOne();
        game.play(this); // ← buduje całą zawartość na tym panelu
    }
}
