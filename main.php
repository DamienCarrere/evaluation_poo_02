<?php

require_once(__DIR__ . "/races/Elfe.php");
require_once(__DIR__ . "/races/Orc.php");
require_once(__DIR__ . "/races/Humain.php");
require_once(__DIR__ . "/game/GameEngine.php");

// $domeDuTonnerre[] = new Orc("Brian");
// $domeDuTonnerre[] = new Elfe("Damien");
// $domeDuTonnerre[] = new Humain("Pierre");
// $domeDuTonnerre[] = new Orc("Chloé");
// $domeDuTonnerre[] = new Elfe("Valentin");
// $domeDuTonnerre[] = new Humain("Wahid");
// $domeDuTonnerre[] = new Orc("Jordan");
// $domeDuTonnerre[] = new Elfe("Ezster");
// $domeDuTonnerre[] = new Humain("Nicolas");
// $domeDuTonnerre[] = new Orc("Carla");
// $domeDuTonnerre[] = new Elfe("Ludovic");
// $domeDuTonnerre[] = new Humain("Lolita");
// $domeDuTonnerre[] = new Orc("Élodie");
// $domeDuTonnerre[] = new Elfe("Joao");
// $domeDuTonnerre[] = new Humain("Yassine");
// $domeDuTonnerre[] = new Elfe("Enzo");


$game = new GameEngine();
$game->addFighters(
    new Orc("Brian"),
    new Elfe("Damien"),
    new Humain("Pierre"),
    new Orc("Chloé"),
    new Elfe("Valentin"),
    new Humain("Wahid"),
    new Orc("Jordan"),
    new Elfe("Ezster"),
    new Humain("Nicolas"),
    new Orc("Carla"),
    new Elfe("Ludovic"),
    new Humain("Lolita"),
    new Orc("Élodie"),
    new Elfe("Joao"),
    new Humain("Yassine"),
    new Elfe("Enzo")
);

$game->start();
