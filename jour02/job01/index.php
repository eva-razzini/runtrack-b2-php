<?php
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

// Fonction pour récupérer tous les étudiants depuis la table student
function find_all_students($conn) {
    $students = array();
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }

    return $students;
}

$students = find_all_students($conn);

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Liste des Étudiants</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Grade</th>
            <th>Adresse email</th>
            <th>Nom</th>
            <th>Date anniversaire</th>
            <th>Genre</th>
        </tr>
        <?php foreach ($students as $student) : ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['grade_id'] ?></td>
                <td><?= $student['email'] ?></td>
                <td><?= $student['fullname'] ?></td>
                <td><?= $student['birthdate'] ?></td>
                <td><?= $student['gender'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
