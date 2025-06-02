package controller;

import auth.AuthUser;
import game.Player;
import game.PlayerManager;

public class LoginController {

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
