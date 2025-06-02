/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: LoginController.java
 * Description: Handles user authentication by checking login credentials against stored players.
 */

package controller;

import auth.AuthUser;
import game.Player;
import game.PlayerManager;

public class LoginController {

    // Authenticates a player by matching login and password with loaded player data
    public Player authenticate(String login, String password) {
        PlayerManager manager = new PlayerManager();
        manager.loadFromJson();

        for (Player player : manager.getAllPlayers()) {
            AuthUser auth = player.getAuthUser();
            if (auth.getLogin().equals(login) && auth.getPassword().equals(password)) {
                return player;
            }
        }
        return null;
    }
}
