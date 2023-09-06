<?php

// Déclaration de la fonction my_closest_to_zero avec la signature demandée
function my_closest_to_zero(array $array): int
{
    // Vérifier si le tableau est vide
    if (empty($array)) {
        throw new InvalidArgumentException("Le tableau ne peut pas être vide.");
    }

    // Initialiser la valeur la plus proche de zéro avec le premier élément du tableau
    $closest = $array[0];

    // Parcourir les autres éléments du tableau
    foreach ($array as $number) {
        // Calculer la valeur absolue du nombre actuel
        $absoluteNumber = abs($number);

        // Calculer la valeur absolue de la valeur la plus proche actuelle
        $absoluteClosest = abs($closest);

        // Comparer la valeur absolue actuelle avec la valeur absolue la plus proche
        if ($absoluteNumber < $absoluteClosest) {
            // Si le nombre actuel est plus proche de zéro, le définir comme la valeur la plus proche
            $closest = $number;
        } elseif ($absoluteNumber === $absoluteClosest) {
            // Si les valeurs absolues sont égales, choisir la valeur positive
            if ($number > 0) {
                $closest = $number;
            }
        }
    }

    // Retourner la valeur la plus proche de zéro
    return $closest;
}

// Exemple d'utilisation de la fonction
$array = [5, -3, 2, -8, 1];
$resultat = my_closest_to_zero($array);

// Afficher le résultat (facultatif, selon les instructions)
echo "Le nombre le plus proche de zéro est : $resultat";

?>
