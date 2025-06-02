package program;

import auth.AuthUser;
import game.Player;
import model.User;

public class DiceGame {

	public static void main(String[] args) {
		javax.swing.SwingUtilities.invokeLater(() -> {
			new Program().start();
		});
		
		Player player = new Player(
	            new AuthUser(
	                "KamilekTheBoss",           // userName
	                "kamil123",                 // login
	                "superSecret123",           // password
	                new User("Kamil", "Milej", "Poland")  // User object
	            )
	        );

	        System.out.println("Nazwa użytkownika: " + player.getAuthUser().getuserName());
	        System.out.println("Login: " + player.getAuthUser().getLogin());
	        System.out.println("Imię: " + player.getAuthUser().getUser().getFirstName());
	        System.out.println("Adres: " + player.getAuthUser().getUser().getAddress());
	        System.out.println("Wynik: " + player.getScore());
		
	}

	
	
}
