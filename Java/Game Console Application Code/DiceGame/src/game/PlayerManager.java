/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: PlayerManager.java
 * Description: Manages the list of players including adding, updating, saving/loading from JSON, and filtering.
 */

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

    // Adds a new player to the list
    public void addPlayer(Player player) {
        players.add(player);
    }

    // Returns the full list of players
    public List<Player> getAllPlayers() {
        return players;
    }

    // Saves the player list to a JSON file
    public void saveToJson() {
        try (Writer writer = new FileWriter(FILE_PATH)) {
            Gson gson = new Gson();
            gson.toJson(players, writer);
            System.out.println("Players saved to " + FILE_PATH);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    // Loads the player list from a JSON file
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

    // Updates an existing player or adds them if they don't exist
    public void updatePlayer(Player updated) {
        for (int i = 0; i < players.size(); i++) {
            if (players.get(i).getAuthUser().getLogin().equals(updated.getAuthUser().getLogin())) {
                players.set(i, updated);
                return;
            }
        }
        // If player was not already in the list
        players.add(updated);
    }

    // Filters and maps players using a condition and mapping function
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
