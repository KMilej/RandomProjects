/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: GameTwoFrame.java
 * Description: JFrame that displays the Game Two panel for the "More or Less" game.
 */

package view;

import javax.swing.JFrame;

public class GameTwoFrame extends JFrame {

	private static final long serialVersionUID = 1L;

	// Constructs and displays the Game Two window
	public GameTwoFrame() {
		super("game two");

		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(1000, 750);
		setLocationRelativeTo(null);

		GameTwoPanel GameTwo = new GameTwoPanel();
		setContentPane(GameTwo);

		setVisible(true);
	}
}
