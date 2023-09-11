<?php

require_once '../class/floor.php';
require_once '../class/grade.php';
require_once '../class/room.php';


// Instance avec tous les paramètres
$grade1 = new Grade(1, 8, "Bachelor 1", new DateTime("2023-01-09"));

// Instance vide
$grade2 = new Grade();

// Instance avec tous les paramètres
$room1 = new Room(1, 1, "RDC Food and Drinks", 90);

// Instance vide
$room2 = new Room();

// Instance avec tous les paramètres
$floor1 = new Floor(11, "Rez-de-chaussée", 0);

// Instance vide
$floor2 = new Floor();

var_dump($grade1);
var_dump($grade2);
var_dump($room1);
var_dump($room2);
var_dump($floor1);
var_dump($floor2);

?>