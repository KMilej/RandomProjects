/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: Session.java
 * Description: Manages the current player's session (login, logout, and session status).
 */

package common;

import game.Player;

public class Session {
    private static Player currentPlayer;

    // Logs in a player and sets them as the current session user
    public static void login(Player player) {
        currentPlayer = player;
    }

    // Returns the currently logged-in player
    public static Player getCurrentPlayer() {
        return currentPlayer;
    }

    // Logs out the current player
    public static void logout() {
        currentPlayer = null;
    }

    // Checks if a player is currently logged in
    public static boolean isLoggedIn() {
        return currentPlayer != null;
    }
}
