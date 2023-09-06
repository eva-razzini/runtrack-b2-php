<?php

// Déclaration de la fonction my_str_search 
function my_str_search(string $haystack, string $needle): int
{
    // Initialiser un compteur pour le nombre d'occurrences
    $occurrences = 0;
    
    // Parcourir chaque caractère de la chaîne haystack
    for ($i = 0; isset($haystack[$i]); $i++) {
        // Vérifier si le caractère courant est égal à la lettre recherchée (needle)
        if ($haystack[$i] === $needle) {
            // Incrémenter le compteur d'occurrences
            $occurrences++;
        }
    }
    
    // Retourner le nombre d'occurrences trouvé
    return $occurrences;
}

// Exemple d'utilisation de la fonction
$lettreRecherchee = 'a';
$chaine = 'La Plateforme';

$resultat = my_str_search($chaine, $lettreRecherchee);

// Afficher le résultat (facultatif, selon les instructions)
var_dump($resultat);

?>
