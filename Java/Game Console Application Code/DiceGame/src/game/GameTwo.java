package game;

import java.awt.*;
import java.util.Random;
import javax.swing.*;

import common.Session;
import view.GameMenuFrame;

public class GameTwo implements IGame {

    private JLabel lblComputerNumber, lblResult, lblScore;
    private JTextField txtBet;
    private int hiddenPlayerNumber;
    private int computerNumber;
    private JButton btnMore, btnLess;

    @Override
    public void play(JPanel panel) {
        Player player = Session.getCurrentPlayer();
        panel.setLayout(new BorderLayout());
        panel.setBackground(Color.WHITE);

        // -------- HEADER --------
        JLabel title = new JLabel("More or Less Game", SwingConstants.CENTER);
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

        // -------- CENTER --------
        JPanel center = new JPanel(new GridLayout(4, 1, 10, 10));
        center.setBackground(Color.WHITE);

        lblComputerNumber = new JLabel("Click 'Play' to generate a number from 1 to 21 and guess!", SwingConstants.CENTER);
        lblComputerNumber.setFont(new Font("Arial", Font.PLAIN, 22));
        center.add(lblComputerNumber);

        lblResult = new JLabel("Place your bet, then guess!", SwingConstants.CENTER);
        lblResult.setFont(new Font("Arial", Font.BOLD, 20));
        center.add(lblResult);

        JPanel betPanel = new JPanel();
        betPanel.setBackground(Color.WHITE);
        betPanel.add(new JLabel("Your Bet: "));
        txtBet = new JTextField(5);
        betPanel.add(txtBet);
        center.add(betPanel);

        panel.add(center, BorderLayout.CENTER);

        // -------- BUTTONS --------
        JPanel buttons = new JPanel(new FlowLayout());
        buttons.setBackground(Color.WHITE);

        JButton btnPlay = new JButton("Play");
        btnPlay.setFont(new Font("Arial", Font.BOLD, 16));
        btnPlay.setBackground(new Color(46, 139, 87));
        btnPlay.setForeground(Color.WHITE);

        btnMore = new JButton("More");
        btnLess = new JButton("Less");

        btnMore.setEnabled(false);
        btnLess.setEnabled(false);

        btnPlay.addActionListener(e -> {
            try {
                int bet = Integer.parseInt(txtBet.getText());
                if (bet <= 0 || bet > player.getScore()) {
                    JOptionPane.showMessageDialog(panel, "Invalid bet.");
                    return;
                }

                Random rand = new Random();
                hiddenPlayerNumber = rand.nextInt(21) + 1;
                computerNumber = rand.nextInt(21) + 1;
                lblComputerNumber.setText("Computer's number: " + computerNumber);
                lblResult.setText("Now guess: Is your number > or < than computer's?");
                btnMore.setEnabled(true);
                btnLess.setEnabled(true);

            } catch (NumberFormatException ex) {
                JOptionPane.showMessageDialog(panel, "Enter a valid bet.");
            }
        });

        btnMore.addActionListener(e -> checkGuess("more", player));
        btnLess.addActionListener(e -> checkGuess("less", player));

        // ======= BACK TO MENU BUTTON =======
        JButton btnBackToMenu = new JButton("Back to Menu");
        btnBackToMenu.setFont(new Font("Arial", Font.BOLD, 16));
        btnBackToMenu.setBackground(Color.GRAY);
        btnBackToMenu.setForeground(Color.WHITE);
        btnBackToMenu.addActionListener(e -> {
            new GameMenuFrame();
            SwingUtilities.getWindowAncestor(panel).dispose();
        });

        buttons.add(btnPlay);
        buttons.add(btnMore);
        buttons.add(btnLess);
        buttons.add(btnBackToMenu);

        panel.add(buttons, BorderLayout.SOUTH);
    }

    private void checkGuess(String guess, Player player) {
        int bet = Integer.parseInt(txtBet.getText());
        boolean correct = (guess.equals("more") && hiddenPlayerNumber > computerNumber)
                || (guess.equals("less") && hiddenPlayerNumber < computerNumber);

        if (correct) {
            lblResult.setText("🎉 Correct! You won +" + (bet * 2));
            player.addScore(bet * 2);
        } else {
            lblResult.setText("❌ Wrong! You lost -" + bet);
            player.addScore(-bet);
        }

        player.setGameplayed(player.getGameplayed() + 1);
        lblScore.setText("Welcome, " + player.getPlayerName() +
                " | Games Played: " + player.getGameplayed() +
                " | Score: " + player.getScore());

        btnMore.setEnabled(false);
        btnLess.setEnabled(false);

        PlayerManager manager = new PlayerManager();
        manager.loadFromJson();
        manager.updatePlayer(player);
        manager.saveToJson();
    }
}
