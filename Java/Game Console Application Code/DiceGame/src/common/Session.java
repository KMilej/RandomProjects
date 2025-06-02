package common;

import game.Player;

public class Session {
    private static Player currentPlayer;

    public static void login(Player player) {
        currentPlayer = player;
    }

    public static Player getCurrentPlayer() {
        return currentPlayer;
    }

    public static void logout() {
        currentPlayer = null;
    }

    public static boolean isLoggedIn() {
        return currentPlayer != null;
    }
}
