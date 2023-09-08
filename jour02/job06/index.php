<?php
// Fonction pour récupérer les noms des grades et les étudiants associés triés par taille d'étudiants
function find_ordered_students() {
    // Connexion à la base de données 
    $servername = "localhost";
    $username = "pma";
    $password = "plomkiplomki";
    $dbname = "lp_official";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    $grades = array();

    $sql = "SELECT grade.name AS grade, student.id, student.email, student.fullname, student.gender, student.birthdate, COUNT(student.id) AS student_count
    FROM grade
    LEFT JOIN student ON grade.id = student.grade_id
    GROUP BY grade.name, student.id, student.email, student.fullname, student.gender, student.birthdate
    ORDER BY student_count DESC";
    
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $gradeName = $row["grade"]; // Correction ici
            if (!isset($grades[$gradeName])) {
                $grades[$gradeName] = array(
                    "students" => array()
                );
            }

            $grades[$gradeName]["students"][] = array(
                "id" => $row["id"],
                "email" => $row["email"],
                "fullname" => $row["fullname"],
                "gender" => $row["gender"],
                "birthdate" => $row["birthdate"]
                // Ajoutez ici d'autres colonnes de la table student si nécessaire
            );
        }
    }

    // Fermer la connexion à la base de données
    $conn->close();

    // Tri des grades par taille d'étudiants (du plus grand au plus petit)
    uasort($grades, function ($a, $b) {
        return count($b["students"]) - count($a["students"]);
    });

    return $grades;
}

$ordered_grades = find_ordered_students();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Promotions et Étudiants</title>
</head>
<body>
    <h1>Liste des Promotions et Étudiants</h1>
    <?php foreach ($ordered_grades as $gradeName => $gradeData) : ?>
        <h2>Promotion: <?= $gradeName ?></h2>
        <?php if (!empty($gradeData["students"])) : ?>
            <h3>Étudiants:</h3>
            <ul>
                <?php foreach ($gradeData["students"] as $student) : ?>
                    <li>
                        ID: <?= $student["id"] ?>,
                        E-mail: <?= $student["email"] ?>,
                        Nom Complet: <?= $student["fullname"] ?>,
                        Genre: <?= $student["gender"] ?>,
                        Date de Naissance: <?= $student["birthdate"] ?>
                        <!-- Ajoutez ici d'autres données de colonnes si nécessaire -->
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>

