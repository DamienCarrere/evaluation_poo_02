<?php

require_once(__DIR__ . "/races/Elfe.php");
require_once(__DIR__ . "/races/Orc.php");
require_once(__DIR__ . "/races/Humain.php");
require_once(__DIR__ . "/game/GameEngine.php");

$domeDuTonnere = [];
$domeDuTonnere[] = new Orc("Brian");
$domeDuTonnere[] = new Elfe("Damien");
$domeDuTonnere[] = new Humain("Pierre");
$domeDuTonnere[] = new Orc("Chloé");
$domeDuTonnere[] = new Elfe("Valentin");
$domeDuTonnere[] = new Humain("Wahid");
$domeDuTonnere[] = new Orc("Jordan");
$domeDuTonnere[] = new Elfe("Ezster");
$domeDuTonnere[] = new Humain("Nicolas");
$domeDuTonnere[] = new Orc("Carla");
$domeDuTonnere[] = new Elfe("Ludovic");
$domeDuTonnere[] = new Humain("Lolita");
$domeDuTonnere[] = new Orc("Élodie");
$domeDuTonnere[] = new Elfe("Joao");
$domeDuTonnere[] = new Humain("Yassine");
$domeDuTonnere[] = new Elfe("Enzo");


$game = new GameEngine();
foreach ($domeDuTonnere as $fighter) {
    $game->addFighters($fighter);
}


$game->start();
