<?php

require_once '../class/student.php';

// Instance avec tous les paramètres
$student = new Student(1, 1, "email@email.com", "Terry Cristinelli", new DateTime("1990-01-18"), "male");

// Instance avec seulement quelques paramètres
$student2 = new Student();

var_dump($student);
var_dump($student2);

?>