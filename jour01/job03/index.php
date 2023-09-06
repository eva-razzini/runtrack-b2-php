<?php

// Déclaration de la fonction my_is_multiple avec la signature demandée
function my_is_multiple(int $divider, int $multiple): bool
{
    // Vérifier si $multiple est un multiple de $divider
    return $multiple % $divider === 0;
}

// Exemples d'utilisation de la fonction
$resultat1 = my_is_multiple(2, 4) === true;
$resultat2 = my_is_multiple(2, 5) === false;

// Afficher les résultats (facultatif, selon les instructions)
var_dump($resultat1);
var_dump($resultat2);

?>
