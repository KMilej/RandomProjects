/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: GameMenuPanel.java
 * Description: Displays the main game menu with player stats, game buttons, and logout/exit options.
 */

package view;

import java.awt.*;
import java.util.List;
import javax.swing.*;

import common.Session;
import game.Player;

public class GameMenuPanel extends JPanel {

	private static final long serialVersionUID = 1L;
	private Image backgroundImage;

	// Builds the main game menu interface
	public GameMenuPanel() {
		Player player = Session.getCurrentPlayer();
		int score = player.getScore();
		int games = player.getGameplayed();

		setLayout(new BorderLayout());
		setPreferredSize(new Dimension(1000, 750));

		// Load background image
		if (java.beans.Beans.isDesignTime()) {
			backgroundImage = new ImageIcon("src/recources/dicegame.png").getImage();
		} else {
			backgroundImage = new ImageIcon(getClass().getResource("/recources/dicegame.png")).getImage();
		}

		// ======= TOP: Welcome Label =======
		String welcomeText = "Welcome, Player: " + player.getPlayerName() + " | Games Played: " + games + " | Score: "
				+ score;

		JLabel title = new JLabel(welcomeText, SwingConstants.CENTER);
		title.setFont(new Font("Arial", Font.BOLD, 24));
		title.setForeground(Color.BLACK);
		title.setBorder(BorderFactory.createEmptyBorder(30, 10, 30, 10));
		add(title, BorderLayout.NORTH);

		// ======= CENTER: Grid of Game Buttons =======
		JPanel buttonPanel = new JPanel(new GridLayout(2, 2, 20, 20));
		buttonPanel.setBorder(BorderFactory.createEmptyBorder(40, 100, 40, 100));
		buttonPanel.setOpaque(false); // transparent background

		// Create game buttons
		JButton btnGameOne = createStyledButton("Game One", "recources/diceone.png");
		JButton btnGameTwo = createStyledButton("Game Two", "recources/moreorless.png");
		JButton btnGameThree = createStyledButton("Game Three", "recources/coming.png");
		JButton btnShowTopPlayers = createStyledButton("Show Top Players", "recources/topscore.png");

		btnShowTopPlayers.setBackground(new Color(255, 193, 7)); // Amber
		btnShowTopPlayers.setForeground(Color.BLACK);
		btnShowTopPlayers.setFocusPainted(false);

		// Show top players with score > 100
		btnShowTopPlayers.addActionListener(e -> {
			game.PlayerManager manager = new game.PlayerManager();
			manager.loadFromJson();

			List<game.Player> topPlayers = manager.filterPlayers(p -> p.getScore() > 100, p -> p);

			if (topPlayers.isEmpty()) {
				JOptionPane.showMessageDialog(this, "No players with score over 100.");
			} else {
				StringBuilder sb = new StringBuilder("Top Players:\n");
				for (game.Player p : topPlayers) {
					sb.append("- ").append(p.getAuthUser().getLogin()).append(" | Score: ").append(p.getScore())
							.append("\n");
				}
				JOptionPane.showMessageDialog(this, sb.toString());
			}
		});

		// Open Game One
		btnGameOne.addActionListener(e -> {
			JFrame frame = (JFrame) SwingUtilities.getWindowAncestor(this);
			frame.dispose();
			new GameOneFrame(); // You must implement this JFrame
		});

		// Open Game Two
		btnGameTwo.addActionListener(e -> {
			JFrame frame = (JFrame) SwingUtilities.getWindowAncestor(this);
			frame.dispose();
			new GameTwoFrame(); // You must implement this JFrame
		});

		// Add buttons to the panel
		buttonPanel.add(btnGameOne);
		buttonPanel.add(btnGameTwo);
		buttonPanel.add(btnGameThree);
		buttonPanel.add(btnShowTopPlayers);

		add(buttonPanel, BorderLayout.CENTER);

		// ======= BOTTOM: Logout + Exit =======
		JPanel footerPanel = new JPanel(new BorderLayout());
		footerPanel.setBorder(BorderFactory.createEmptyBorder(20, 40, 20, 40));
		footerPanel.setOpaque(false);

		// Logout button
		JButton btnLogout = new JButton("Logout");
		btnLogout.setFont(new Font("Arial", Font.BOLD, 16));
		btnLogout.setBackground(new Color(70, 130, 180));
		btnLogout.setForeground(Color.WHITE);
		btnLogout.setFocusPainted(false);
		btnLogout.setPreferredSize(new Dimension(150, 40));
		btnLogout.addActionListener(e -> {
			new LoginFrame();
			SwingUtilities.getWindowAncestor(this).dispose();
		});

		// Exit button
		JButton btnExit = new JButton("Exit");
		btnExit.setFont(new Font("Arial", Font.BOLD, 16));
		btnExit.setBackground(Color.RED.darker());
		btnExit.setForeground(Color.WHITE);
		btnExit.setFocusPainted(false);
		btnExit.setPreferredSize(new Dimension(150, 40));
		btnExit.addActionListener(e -> System.exit(0));

		footerPanel.add(btnLogout, BorderLayout.WEST);
		footerPanel.add(btnExit, BorderLayout.EAST);
		add(footerPanel, BorderLayout.SOUTH);
	}

	// Draws the background image on the panel
	@Override
	protected void paintComponent(Graphics g) {
		super.paintComponent(g);
		if (backgroundImage != null) {
			g.drawImage(backgroundImage, 0, 0, getWidth(), getHeight(), this);
		}
	}

	// Creates a styled JButton with text and an optional image
	private JButton createStyledButton(String text, String imagePath) {
		JButton button = new JButton(text);
		button.setFont(new Font("Arial", Font.PLAIN, 16));
		button.setForeground(Color.BLACK);
		button.setFocusPainted(false);
		button.setContentAreaFilled(false);
		button.setBorderPainted(false);
		button.setOpaque(false);
		button.setHorizontalTextPosition(SwingConstants.CENTER);
		button.setVerticalTextPosition(SwingConstants.BOTTOM);

		// Load icon
		try {
			java.net.URL imageURL = getClass().getResource("/" + imagePath);
			if (imageURL != null) {
				ImageIcon originalIcon = new ImageIcon(imageURL);
				Image scaledImage = originalIcon.getImage().getScaledInstance(200, 200, Image.SCALE_SMOOTH);
				button.setIcon(new ImageIcon(scaledImage));
			} else {
				System.out.println("Image not found: " + imagePath);
			}
		} catch (Exception e) {
			System.out.println("Error loading image: " + imagePath);
		}

		// Hover effect – green background and white text
		button.addMouseListener(new java.awt.event.MouseAdapter() {
			@Override
			public void mouseEntered(java.awt.event.MouseEvent e) {
				button.setOpaque(true);
				button.setBackground(new Color(76, 175, 80)); // material green 500
				button.setForeground(Color.WHITE);
			}

			@Override
			public void mouseExited(java.awt.event.MouseEvent e) {
				button.setOpaque(false);
				button.setForeground(Color.BLACK);
			}
		});

		return button;
	}
}
