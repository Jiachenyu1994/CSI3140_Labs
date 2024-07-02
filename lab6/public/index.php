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

    for ($turn = 0; $turn < 5; $turn++) {
        echo "Turn " . ($turn + 1) . "<br>";

        for ($roll = 0; $roll < 3; $roll++) {
            $message = $game->roll(1);
            if ($message) {
                echo "Player 1: " . $message . "<br>";
                break;
            }
        }
        echo "Player 1 dice: " . $game->getDices(1) . "<br>";
        $game->next(1);

        for ($roll = 0; $roll < 3; $roll++) {
            $message = $game->roll(2);
            if ($message) {
                echo "Player 2: " . $message . "<br>";
                break;
            }
        }
        echo "Player 2 dice: " . $game->getDices(2) . "<br>";
        $game->next(2);

        $message = $game->nextTurn();
        if ($message) {
            echo $message . "<br>";
        }

        YatzyEngine::updateOverallScore($game, 1, 'ones'); 
        YatzyEngine::updateOverallScore($game, 2, 'ones'); 
        echo "Scores: Player 1: " . $game->score1 . " - Player 2: " . $game->score2 . "<br><br>";
    }

    echo "Final Scores: Player 1: " . $game->score1 . " - Player 2: " . $game->score2 . "<br>";
}

if (!isset($_SESSION['yatzyGame'])) {
    $_SESSION['yatzyGame'] = new YatzyGame();
}

simulateGame();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yatzy Game</title>
</head>
<body>
    <div id="output">--</div>
    <button id="version">Version</button>

    <div id="die1">--</div>
    <button id="roll">Roll</button>

    <script>
    const output = document.getElementById("output");
    const version = document.getElementById("version");
    version.onclick = function(e) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                if (xmlhttp.status == 200) {
                    try {
                        const response = JSON.parse(xmlhttp.responseText);
                        output.innerHTML = response.version;
                    } catch (e) {
                        output.innerHTML = 'Error parsing JSON: ' + e.message;
                    }
                } else {
                    output.innerHTML = 'Error: ' + xmlhttp.status;
                }
            }
        };
        xmlhttp.open("GET", "/api.php?action=version", true);
        xmlhttp.send();
    };

    const die1 = document.getElementById("die1");
    const roll = document.getElementById("roll");
    roll.onclick = function(e) {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                if (xmlhttp.status == 200) {
                    try {
                        const response = JSON.parse(xmlhttp.responseText);
                        die1.innerHTML = response.value;
                    } catch (e) {
                        die1.innerHTML = 'Error parsing JSON: ' + e.message;
                    }
                } else {
                    die1.innerHTML = 'Error: ' + xmlhttp.status;
                }
            }
        };
        xmlhttp.open("GET", "/api.php?action=roll", true);
        xmlhttp.send();
    };
    </script>
</body>
</html>
