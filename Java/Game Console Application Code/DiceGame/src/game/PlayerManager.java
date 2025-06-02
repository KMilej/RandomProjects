package game;

import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import java.io.*;
import java.lang.reflect.Type;
import java.util.ArrayList;
import java.util.List;
import java.util.function.Predicate;

public class PlayerManager {
    private List<Player> players = new ArrayList<>();
    private static final String FILE_PATH = "players.json";

    public void addPlayer(Player player) {
        players.add(player);
    }

    public List<Player> getAllPlayers() {
        return players;
    }

    public void saveToJson() {
        try (Writer writer = new FileWriter(FILE_PATH)) {
            Gson gson = new Gson();
            gson.toJson(players, writer);
            System.out.println("Players saved to " + FILE_PATH);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void loadFromJson() {
        try (Reader reader = new FileReader(FILE_PATH)) {
            Gson gson = new Gson();
            Type playerListType = new TypeToken<List<Player>>() {}.getType();
            players = gson.fromJson(reader, playerListType);
            System.out.println("Players loaded from " + FILE_PATH);
        } catch (FileNotFoundException e) {
            System.out.println("No saved players yet. Starting fresh.");
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    
    public void updatePlayer(Player updated) {
        for (int i = 0; i < players.size(); i++) {
            if (players.get(i).getAuthUser().getLogin().equals(updated.getAuthUser().getLogin())) {
                players.set(i, updated);
                return;
            }
        }
        // Jeśli gracza nie było wcześniej:
        players.add(updated);
    }
    
    public <T> List<T> filterPlayers(Predicate<Player> condition, java.util.function.Function<Player, T> mapper) {
        List<T> result = new ArrayList<>();
        for (Player player : players) {
            if (condition.test(player)) {
                result.add(mapper.apply(player));
            }
        }
        return result;
    }

}
