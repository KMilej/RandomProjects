/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: IGame.java
 * Description: Interface for all game types. Requires implementation of a method to display the game on a panel.
 */

package game;

import javax.swing.JPanel;

public interface IGame {

    // Displays the game content in the provided JPanel
    void play(JPanel panel);
}
