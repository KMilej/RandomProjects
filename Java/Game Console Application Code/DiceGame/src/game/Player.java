package game;

import auth.AuthUser;

public class Player {
	
	private AuthUser authuser;
	private int score;
	
	public Player(AuthUser authUser) {
		this.authuser = authUser;
			
	}
	
	public String getPlayerName() {
        return authuser.getUser().getFirstName() + " " + authuser.getUser().getLastName();
    }

    public int getScore() { return score; }
    public void addScore(int points) { score += points; }

    public AuthUser getAuthUser() { return authuser; }
}
