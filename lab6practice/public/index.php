<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/_config.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function simulateGame() {
    $game = $_SESSION['yatzyGame'];

    // Simulate 5 turns for each player
    for ($turn = 0; $turn < 5; $turn++) {
        echo "Turn " . ($turn + 1) . "<br>";

        // Player 1 rolls all dice
        for ($roll = 0; $roll < 3; $roll++) {
            $message = $game->roll(1);
            if ($message) {
                echo "Player 1: " . $message . "<br>";
                break;
            }
        }
        echo "Player 1 dice: " . $game->getDices(1) . "<br>";
        $game->next(1);

        // Player 2 rolls all dice
        for ($roll = 0; $roll < 3; $roll++) {
            $message = $game->roll(2);
            if ($message) {
                echo "Player 2: " . $message . "<br>";
                break;
            }
        }
        echo "Player 2 dice: " . $game->getDices(2) . "<br>";
        $game->next(2);

        // Proceed to next turn
        $message = $game->nextTurn();
        if ($message) {
            echo $message . "<br>";
        }

        // Update scores
        YatzyEngine::updateOverallScore($game, 1, 'ones'); 
        YatzyEngine::updateOverallScore($game, 2, 'ones'); 
        echo "Scores: Player 1: " . $game->score1 . " - Player 2: " . $game->score2 . "<br><br>";
    }

    // Final scores
    echo "Final Scores: Player 1: " . $game->score1 . " - Player 2: " . $game->score2 . "<br>";
}

// Initialize the game if not already started
if (!isset($_SESSION['yatzyGame'])) {
    $_SESSION['yatzyGame'] = new YatzyGame();
}


simulateGame();
?>
