package game;

import java.util.ArrayList;
import java.util.List;

public class PlayerManager {

	private List<Player> players;
	
	public PlayerManager() {
        this.players = new ArrayList<>();
        
    }

    public void addPlayer(Player player) {
        players.add(player);
    }

    public List<Player> getAllPlayers() {
        return players;
    }
}
