package game;

import auth.AuthUser;

public class Player {
	
	private AuthUser authuser;
	private int score;
	private int gameplayed;
	
	public Player(AuthUser authUser) {
		this.authuser = authUser;
		score = 100;
			
	}
	
	public String getPlayerName() {
        return authuser.getUser().getFirstName() + " " + authuser.getUser().getLastName() + " username: " + authuser.getuserName();
    }

    public int getScore() { return score; }
    public void addScore(int points) { score += points; }

    public AuthUser getAuthUser() { return authuser; }

	public int getGameplayed() {
		return gameplayed;
	}

	public void setGameplayed(int gameplayed) {
		this.gameplayed = gameplayed;
	}
    
}
