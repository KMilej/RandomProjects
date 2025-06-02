/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: GameOneFrame.java
 * Description: JFrame that displays the Game One panel for playing the first dice game.
 */

package view;

import javax.swing.JFrame;

public class GameOneFrame extends JFrame {

	private static final long serialVersionUID = 1L;

	// Constructs and displays the Game One window
	public GameOneFrame() {
		super("Login Screen");

		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setSize(1000, 750);
		setLocationRelativeTo(null);

		GameOnePanel GameOne = new GameOnePanel();
		setContentPane(GameOne);

		setVisible(true);
	}
}
