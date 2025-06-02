package controller;

import auth.AuthUser;
import game.Player;
import game.PlayerManager;
import model.User;

public class RegisterController {

    /**
     * Próbuje zarejestrować nowego gracza.
     * @return null jeśli login lub username zajęte, inaczej nowy Player
     */
    public Player register(String username, String login, String password,
                           String firstName, String lastName, String address) {

        PlayerManager manager = new PlayerManager();
        manager.loadFromJson();

        for (Player existing : manager.getAllPlayers()) {
            AuthUser existingAuth = existing.getAuthUser();
            if (existingAuth.getLogin().equalsIgnoreCase(login) ||
                existingAuth.getuserName().equalsIgnoreCase(username)) {
                return null; // login lub username zajęty
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
