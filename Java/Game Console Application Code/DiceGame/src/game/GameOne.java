/*
 * HL9X35 - Advanced OOP – Fife College
 * Author: Kamil Milej | Date: 02.02.2025
 * File: [name of the file]
 * Description: short desciption what this class do 
 */


package game;

import java.awt.*;
import java.util.Random;
import javax.swing.*;

import common.Session;

public class GameOne implements IGame {

    private JLabel lblPlayerRoll, lblComputerRoll, lblResult, lblScore;
    private JTextField txtBet;
    private JButton btnRoll;

    @Override
    public void play(JPanel panel) {
        Player player = Session.getCurrentPlayer();
        panel.setLayout(new BorderLayout());
        panel.setBackground(Color.WHITE);

        // -------- Header --------
        JLabel title = new JLabel(" Dice Game: Player vs Computer", SwingConstants.CENTER);
        title.setFont(new Font("Arial", Font.BOLD, 24));
        title.setBorder(BorderFactory.createEmptyBorder(30, 10, 10, 10));

        lblScore = new JLabel("Welcome, " + player.getPlayerName() +
                " | Games Played: " + player.getGameplayed() +
                " | Score: " + player.getScore(), SwingConstants.CENTER);
        lblScore.setFont(new Font("Arial", Font.PLAIN, 20));
        lblScore.setBorder(BorderFactory.createEmptyBorder(10, 10, 30, 10));

        JPanel headerPanel = new JPanel();
        headerPanel.setLayout(new BoxLayout(headerPanel, BoxLayout.Y_AXIS));
        headerPanel.setBackground(Color.WHITE);
        headerPanel.add(title);
        headerPanel.add(lblScore);
        panel.add(headerPanel, BorderLayout.NORTH);

        // -------- Game Body --------
        JPanel centerPanel = new JPanel(new GridLayout(4, 1, 10, 10));
        centerPanel.setBackground(Color.WHITE);

        lblPlayerRoll = new JLabel("Your roll: ", SwingConstants.CENTER);
        lblPlayerRoll.setFont(new Font("Arial", Font.PLAIN, 20));

        lblComputerRoll = new JLabel("Computer roll: ", SwingConstants.CENTER);
        lblComputerRoll.setFont(new Font("Arial", Font.PLAIN, 20));

        lblResult = new JLabel("Enter your bet and click 'Roll Dice'!", SwingConstants.CENTER);
        lblResult.setFont(new Font("Arial", Font.BOLD, 22));

        JPanel betPanel = new JPanel();
        betPanel.setBackground(Color.WHITE);
        betPanel.add(new JLabel("Your Bet: "));
        txtBet = new JTextField(5);
        betPanel.add(txtBet);

        centerPanel.add(lblPlayerRoll);
        centerPanel.add(lblComputerRoll);
        centerPanel.add(lblResult);
        centerPanel.add(betPanel);
        panel.add(centerPanel, BorderLayout.CENTER);

        // -------- Button --------
        btnRoll = new JButton("Roll Dice");
        btnRoll.setFont(new Font("Arial", Font.BOLD, 18));
        btnRoll.setBackground(new Color(76, 175, 80));
        btnRoll.setForeground(Color.WHITE);
        btnRoll.setFocusPainted(false);
        btnRoll.setPreferredSize(new Dimension(160, 50));
        btnRoll.addActionListener(e -> playRound(player));

        JPanel bottom = new JPanel();
        bottom.setBackground(Color.WHITE);
        bottom.add(btnRoll);

        panel.add(bottom, BorderLayout.SOUTH);
        
        JButton btnBack = new JButton("Back to Menu");
        btnBack.setFont(new Font("Arial", Font.BOLD, 16));
        btnBack.setBackground(new Color(100, 100, 100));
        btnBack.setForeground(Color.WHITE);
        btnBack.setFocusPainted(false);
        btnBack.setPreferredSize(new Dimension(160, 40));
        btnBack.addActionListener(e -> {
            SwingUtilities.getWindowAncestor(panel).dispose();  // zamknij to okno
            new view.GameMenuFrame();                           // otwórz menu
        });

        bottom.add(Box.createHorizontalStrut(20)); // odstęp
        bottom.add(btnBack); // dodaj do tego samego bottom panelu
    }

    private void playRound(Player player) {
        int bet;
        try {
            bet = Integer.parseInt(txtBet.getText());
            if (bet <= 0 || bet > player.getScore()) {
                JOptionPane.showMessageDialog(null, "Invalid bet amount.");
                return;
            }
        } catch (NumberFormatException e) {
            JOptionPane.showMessageDialog(null, "Please enter a valid number for bet.");
            return;
        }

        Random rand = new Random();
        int playerRoll = rand.nextInt(6) + 1;
        int computerRoll = rand.nextInt(6) + 1;

        lblPlayerRoll.setText("Your roll: " + playerRoll);
        lblComputerRoll.setText("Computer roll: " + computerRoll);

        if (playerRoll > computerRoll) {
            lblResult.setText("🎉 You win! +" + (bet * 2));
            player.addScore(bet * 2);
        } else if (playerRoll < computerRoll) {
            lblResult.setText("😞 Computer wins! -" + bet);
            player.addScore(-bet);
        } else {
            lblResult.setText("🤝 It's a tie! No score change.");
        }

        player.setGameplayed(player.getGameplayed() + 1);
        lblScore.setText("Welcome, " + player.getPlayerName() +
                " | Games Played: " + player.getGameplayed() +
                " | Score: " + player.getScore());

        // Update JSON
        PlayerManager manager = new PlayerManager();
        manager.loadFromJson();
        manager.updatePlayer(player);
        manager.saveToJson();
    }
}
