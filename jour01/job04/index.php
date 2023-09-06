<?php

// Déclaration de la fonction my_fizz_buzz avec la signature demandée
function my_fizz_buzz(int $length): array
{
    // Initialiser un tableau vide pour stocker les résultats
    $result = [];

    // Parcourir de 1 à la longueur spécifiée
    for ($i = 1; $i <= $length; $i++) {
        // Vérifier si la valeur est un multiple de 3 et/ou de 5
        if ($i % 3 === 0 && $i % 5 === 0) {
            $result[] = 'FizzBuzz'; // Si c'est un multiple de 3 et 5, ajouter 'FizzBuzz'
        } elseif ($i % 3 === 0) {
            $result[] = 'Fizz'; // Si c'est un multiple de 3, ajouter 'Fizz'
        } elseif ($i % 5 === 0) {
            $result[] = 'Buzz'; // Si c'est un multiple de 5, ajouter 'Buzz'
        } else {
            $result[] = $i; // Sinon, ajouter la valeur telle quelle
        }
    }

    // Retourner le tableau résultant
    return $result;
}

// Exemple d'utilisation de la fonction
$length = 15; // Par exemple, générer un tableau de longueur 15
$resultat = my_fizz_buzz($length);

// Afficher le résultat (facultatif, selon les instructions)
var_dump($resultat);

?>
