<?php

// Déclaration de la fonction my_array_sort avec la signature demandée
function my_array_sort(array $arrayToSort, string $order): array
{
    // Vérifier que le deuxième paramètre est "ASC" ou "DESC"
    if ($order !== "ASC" && $order !== "DESC") {
        // Retourner le tableau d'origine si l'ordre n'est pas valide
        return $arrayToSort;
    }

    // Tri dans l'ordre croissant (ASC)
    if ($order === "ASC") {
        sort($arrayToSort);
    }
    // Tri dans l'ordre décroissant (DESC)
    elseif ($order === "DESC") {
        rsort($arrayToSort);
    }

    // Retourner le tableau trié
    return $arrayToSort;
}

// Exemple d'utilisation de la fonction
$array1 = [2, 24, 12, 7, 34];
$array2 = [8, 5, 23, 89, 6, 10];
$array3 = [ 'v', 'a', 'k', 'b'];
$order1 = "ASC"; // Par exemple, trier dans l'ordre croissant
$order2 = "DESC"; // Par exemple, trier dans l'ordre décroissant
$resultat1 = my_array_sort($array1, $order1);
$resultat2 = my_array_sort($array2, $order2);
$resultat3 = my_array_sort($array3, $order1);
$resultat4 = my_array_sort($array3, $order2);

// Afficher le résultat (facultatif, selon les instructions)
var_dump($resultat1);
var_dump($resultat2);
var_dump($resultat3);
var_dump($resultat4);

?>
