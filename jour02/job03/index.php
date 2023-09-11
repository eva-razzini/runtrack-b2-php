<?php
// Fonction pour insérer un nouvel étudiant dans la base de données
function insert_student($email, $fullname, $gender, $birthdate, $grade_id) {
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

    $email = $conn->real_escape_string($email); // Éviter les injections SQL
    $fullname = $conn->real_escape_string($fullname);
    $birthdate = $conn->real_escape_string($birthdate);

    $sql = "INSERT INTO student (email, fullname, gender, birthdate, grade_id) VALUES ('$email', '$fullname', '$gender', '$birthdate', '$grade_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvel étudiant ajouté avec succès.";
    } else {
        echo "Erreur lors de l'insertion de l'étudiant : " . $conn->error;
    }

    // Fermer la connexion à la base de données
    $conn->close();
}

// Traitement du formulaire si les données sont soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['input-email'];
    $fullname = $_POST['input-fullname'];
    $gender = $_POST['input-gender'];
    $birthdate = $_POST['input-birthdate'];
    $grade_id = $_POST['input-grade_id'];

    insert_student($email, $fullname, $gender, $birthdate, $grade_id);
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Ajouter un Étudiant</h1>
    <form method="post">
        <label for="input-email">E-mail :</label>
        <input type="email" id="input-email" name="input-email" required><br><br>

        <label for="input-fullname">Nom complet :</label>
        <input type="text" id="input-fullname" name="input-fullname" required><br><br>

        <label for="input-gender">Genre :</label>
        <select id="input-gender" name="input-gender">
            <option value="male">Homme</option>
            <option value="female">Femme</option>
        </select><br><br>

        <label for="input-birthdate">Date de naissance :</label>
        <input type="date" id="input-birthdate" name="input-birthdate" required><br><br>

        <label for="input-grade_id">ID du grade :</label>
        <input type="number" id="input-grade_id" name="input-grade_id" required><br><br>

        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
