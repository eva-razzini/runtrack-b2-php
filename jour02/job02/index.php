<?php
// Fonction pour récupérer un étudiant en fonction de l'e-mail
function find_one_student($email) {
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

    $student = array();
    $email = $conn->real_escape_string($email); // Éviter les injections SQL

    $sql = "SELECT * FROM student WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $student = $result->fetch_assoc();
    }

    // Fermer la connexion à la base de données
    $conn->close();

    return $student;
}

// Traitement du formulaire si l'e-mail est soumis
$studentInfo = array();

if (isset($_GET['input-email-student'])) {
    $email = $_GET['input-email-student'];
    $studentInfo = find_one_student($email);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rechercher un Étudiant par E-mail</title>
</head>
<body>
    <h1>Rechercher un Étudiant par E-mail</h1>
    <form method="get">
        <label for="input-email-student">E-mail de l'étudiant :</label>
        <input type="text" id="input-email-student" name="input-email-student">
        <input type="submit" value="Rechercher">
    </form>

    <?php if (!empty($studentInfo)) : ?>
        <h2>Informations de l'étudiant</h2>
        <ul>
            <li>ID : <?= $studentInfo['id'] ?></li>
            <li>Grade : <?= $studentInfo['grade_id'] ?></li>
            <li>Adresse email : <?= $studentInfo['email'] ?></li>
            <li>Nom : <?= $studentInfo['fullname'] ?></li>
            <li>Date anniversaire : <?= $studentInfo['birthdate'] ?></li>
            <li>Genre : <?= $studentInfo['gender'] ?></li>
        </ul>
    <?php endif; ?>
</body>
</html>