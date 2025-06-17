package controllerTest;

import static org.junit.jupiter.api.Assertions.*;

import org.junit.jupiter.api.Test;

import controller.LoginController;
import game.Player;
import game.PlayerManager;

class LoginControllerTest {

	@Test
	void shouldAuthenticateValidUser() {
		PlayerManager manager = new PlayerManager();
		manager.loadFromJson();

		LoginController controller = new LoginController();
		Player player = controller.authenticate("brakney", "123qwe");

		assertNotNull(player);
		assertEquals("brakney", player.getAuthUser().getLogin());
	}

	@Test
	void shouldFailForInvalidPassword() {
		LoginController controller = new LoginController();
		Player player = controller.authenticate("brakney", "wrongPassword");

		assertNull(player);
	}

	@Test
	void shouldFailForEmptyCredentials() {
		LoginController controller = new LoginController();
		Player player = controller.authenticate("", "");

		assertNull(player); // Expecting authentication to fail for empty login & password
	}

	@Test
	void shouldRejectInvalidLogin() {
		LoginController controller = new LoginController();
		Player result = controller.authenticate("wrongLogin", "wrongPass");
		assertNull(result);
	}

	@Test
	void shouldReturnNullWhenPasswordWrong() {
		LoginController controller = new LoginController();
		Player result = controller.authenticate("kmilej", "zlehaslo");
		assertNull(result);
	}

}
