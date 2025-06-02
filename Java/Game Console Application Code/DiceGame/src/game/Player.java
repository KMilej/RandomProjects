/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: Player.java
 * Description: Represents a player in the game, including authentication data, score, and games played.
 */

package game;

import auth.AuthUser;

public class Player {
	
	private AuthUser authuser;
	private int score;
	private int gameplayed;

	// Constructor initializes player with authentication and default score
	public Player(AuthUser authUser) {
		this.authuser = authUser;
		score = 100;
	}

	// Returns full name and username of the player
	public String getPlayerName() {
        return authuser.getUser().getFirstName() + " " + authuser.getUser().getLastName() + " username: " + authuser.getuserName();
    }

	// Gets the player's current score
    public int getScore() { return score; }

	// Updates the player's score by adding points (positive or negative)
    public void addScore(int points) { score += points; }

	// Returns the AuthUser object associated with this player
    public AuthUser getAuthUser() { return authuser; }

	// Gets the number of games the player has played
	public int getGameplayed() {
		return gameplayed;
	}

	// Sets the number of games the player has played
	public void setGameplayed(int gameplayed) {
		this.gameplayed = gameplayed;
	}
}
