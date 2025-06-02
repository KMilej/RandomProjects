/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: GameTwoPanel.java
 * Description: Panel that initialises and displays the "More or Less" game.
 */

package view;

import javax.swing.JPanel;
import game.GameTwo;

public class GameTwoPanel extends JPanel {

	private static final long serialVersionUID = 1L;

	// Initialises Game Two and builds its content on this panel
	public GameTwoPanel() {
		GameTwo gameTwo = new GameTwo();
		gameTwo.play(this); // builds the entire content on this panel
	}
}
