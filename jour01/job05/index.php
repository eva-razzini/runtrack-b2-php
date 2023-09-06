<?php

// Déclaration de la fonction my_is_prime avec la signature demandée
function my_is_prime(int $number): bool
{
    // Un nombre inférieur à 2 n'est pas premier
    if ($number < 2) {
        return false;
    }

    // Parcourir les entiers de 2 à la racine carrée du nombre
    for ($i = 2; $i * $i <= $number; $i++) {
        // Si le nombre est divisible par un entier entre 2 et sa racine carrée, il n'est pas premier
        if ($number % $i === 0) {
            return false;
        }
    }

    // Si aucune division exacte n'a été trouvée, le nombre est premier
    return true;
}

// Exemple d'utilisation de la fonction
$resultat1 = my_is_prime(3);
$resultat2 = my_is_prime(12);

// Afficher le résultat (facultatif, selon les instructions)
var_dump($resultat1);
var_dump($resultat2);

?>
