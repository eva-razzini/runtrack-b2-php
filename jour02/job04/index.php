<?php
// Fonction pour récupérer les e-mails, les noms complets et les noms de promotions des étudiants
function find_all_students_grades() {
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

    $students = array();

    $sql = "SELECT student.email, student.fullname, grade.name FROM student JOIN grade ON student.grade_id = grade.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = array(
                "email" => $row["email"],
                "fullname" => $row["fullname"],
                "name" => $row["name"]
            );
        }
    }

    // Fermer la connexion à la base de données
    $conn->close();

    return $students;
}

$students_grades = find_all_students_grades();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Liste des Étudiants avec Promotions</h1>
    <table border="1">
        <tr>
            <th>E-mail</th>
            <th>Nom Complet</th>
            <th>Promotions</th>
        </tr>
        <?php foreach ($students_grades as $student) : ?>
            <tr>
                <td><?= $student['email'] ?></td>
                <td><?= $student['fullname'] ?></td>
                <td><?= $student['name'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
