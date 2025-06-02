/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: DiceGame.java
 * Description: Entry point of the application that starts the main program using Swing.
 */

package program;

public class DiceGame {

	// Starts the application using the Program class
	public static void main(String[] args) {
		javax.swing.SwingUtilities.invokeLater(() -> {
			new Program().start();
		});

	}
}
