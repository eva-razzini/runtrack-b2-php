<?php

// Déclaration de la fonction my_str_reverse avec la signature demandée
function my_str_reverse(string $string): string
{
    // Initialiser une chaîne vide pour stocker la chaîne inversée
    $reversedString = '';

    // Obtenir la longueur de la chaîne d'origine
    $length = 0;
    while (isset($string[$length])) {
        $length++;
    }

    // Parcourir la chaîne d'origine de la fin vers le début
    for ($i = $length - 1; $i >= 0; $i--) {
        // Ajouter chaque caractère à la chaîne inversée
        $reversedString .= $string[$i];
    }

    // Retourner la chaîne inversée
    return $reversedString;
}

// Exemple d'utilisation de la fonction
$chaine = 'Hello';
$attendu = 'olleH';
$resultat = my_str_reverse($chaine) === $attendu;

// Afficher le résultat (facultatif, selon les instructions)
var_dump($resultat);

?>
