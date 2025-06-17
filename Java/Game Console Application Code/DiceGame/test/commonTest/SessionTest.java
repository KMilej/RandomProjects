package commonTest;

import static org.junit.jupiter.api.Assertions.*;
import auth.AuthUser;
import model.User;
import game.Player;
import common.Session;

import org.junit.jupiter.api.Test;



class SessionTest {

	@Test
    void shouldLoginAndLogoutCorrectly() {
        Player player = createTestPlayer();

        Session.login(player);
        assertTrue(Session.isLoggedIn());
        assertEquals(player, Session.getCurrentPlayer());

        Session.logout();
        assertFalse(Session.isLoggedIn());
        assertNull(Session.getCurrentPlayer());
    }

    private Player createTestPlayer() {
        return new Player(new AuthUser("kmilej", "kmilej", "1234", new User("Kamil", "Milej", "2Hawks")));
    }

}
