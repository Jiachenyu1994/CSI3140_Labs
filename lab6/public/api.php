<?php
require_once __DIR__ . '/_config.php';
require_once __DIR__ . '/../app/models/Dice.php'; 

$action = $_GET['action'] ?? 'version';

switch ($action) {
    case 'roll':
        $d = new Dice(1); // Passing an id to the constructor
        $d->rollDice(); // Roll the die
        $data = ['value' => $d->getDiceValue()]; // Get the value of the die
        break;
    case 'version':
    default:
        $data = ['version' => '1.0'];
        break;
}

header('Content-Type: application/json');
echo json_encode($data);
?>
