<?php
require_once('_config.php');

use app\yatzy\Dice;

switch ($_GET["action"] ?? "version") {
case "roll":
    $d = new Dice(1);
    $data = ["value" => $d->rollDice()];
    break;
case "version":
default:
    $data = ["version" => "1.0"];
}

header("Content-Type: application/json");
echo json_encode($data);
?>