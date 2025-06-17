package controllerTest;

import static org.junit.jupiter.api.Assertions.*;

import org.junit.jupiter.api.Test;

import controller.RegisterController;
import game.Player;

class RegisterControllerTest {

	@Test
	void shouldNotRegisterDuplicateLoginOrUsername() {
		RegisterController registertest = new RegisterController();
		Player player = registertest.register("kmilej", "kmilej", "kmilej", "123qwe", "123qwe", "123qwe");
		assertNull(player);
	}
	
	void shouldNotRegisterDuplicateLoginOrUsernameEmpty() {
		RegisterController registertest = new RegisterController();
		Player player = registertest.register("", "", "", "123qwe", "123qwe", "123qwe");
		assertNull(player);
	}

}
