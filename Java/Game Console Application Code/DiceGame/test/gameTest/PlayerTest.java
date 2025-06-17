package gameTest;

import static org.junit.jupiter.api.Assertions.*;

import org.junit.jupiter.api.Test;

import auth.AuthUser;
import game.Player;
import model.User;

public class PlayerTest {

    @Test
    void shouldAddScoreCorrectly() {
        Player p = createTestPlayer();
        int oldScore = p.getScore();
        p.addScore(50);
        assertEquals(oldScore + 50, p.getScore());
        p.addScore(-30);
        assertEquals(120, p.getScore());
    }

    @Test
    void shouldReturnCorrectName() {
        Player p = createTestPlayer();
        assertEquals("Jan Kowalski username: janek", p.getPlayerName());
    }
    
    @Test
    void testGamePlayedGetter() {
    	Player p = createTestPlayer();
    	assertEquals(0, p.getGameplayed());
    	p.setGameplayed(p.getGameplayed() + 1);
    	assertEquals(1, p.getGameplayed());
    }

    private Player createTestPlayer() {
        return new Player(new AuthUser("janek", "login", "pass", new User("Jan", "Kowalski", "Polska")));
    }
}
