/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: GameOnePanel.java
 * Description: Panel that make and displays Game One on this panel.
 */

package view;

import javax.swing.*;
import game.GameOne;

public class GameOnePanel extends JPanel {

	private static final long serialVersionUID = 1L;

	// Initialises Game One and builds its content on this panel
	public GameOnePanel() {
		GameOne game = new GameOne();
		game.play(this); // builds the entire content on this panel
	}
}
