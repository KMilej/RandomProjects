/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: GameMenuFrame.java
 * Description: JFrame that displays the main game menu panel.
 */

package view;

import javax.swing.JFrame;

public class GameMenuFrame extends JFrame {

	private static final long serialVersionUID = 1L;

	// Constructs and displays the game menu window
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
