/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: RegisterController.java
 * Description: Handles player registration and ensures username and login are unique.
 */

package controller;

import auth.AuthUser;
import game.Player;
import game.PlayerManager;
import model.User;

public class RegisterController {

    // Attempts to register a new player. Returns null if login or username is already taken.
    public Player register(String username, String login, String password,
                           String firstName, String lastName, String address) {

        PlayerManager manager = new PlayerManager();
        manager.loadFromJson();

        for (Player existing : manager.getAllPlayers()) {
            AuthUser existingAuth = existing.getAuthUser();
            if (existingAuth.getLogin().equalsIgnoreCase(login) ||
                existingAuth.getuserName().equalsIgnoreCase(username)) {
                return null; // login or username already taken
            }
        }

        User user = new User(firstName, lastName, address);
        AuthUser authUser = new AuthUser(username, login, password, user);
        Player newPlayer = new Player(authUser);

        manager.addPlayer(newPlayer);
        manager.saveToJson();

        return newPlayer;
    }
}
