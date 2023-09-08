<?php
// Fonction pour récupérer les noms, la capacité, les étudiants et l'indication si une salle est pleine avec les étudiants présents
function find_full_rooms() {
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

    $rooms = array();

    $sql = "SELECT room.name AS room_name, room.capacity, student.id AS student_id, student.email, student.fullname
            FROM room
            LEFT JOIN grade ON room.id = grade.room_id
            LEFT JOIN student ON grade.id = student.grade_id
            ORDER BY room_name";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $room_name = $row["room_name"];
            if (!isset($rooms[$room_name])) {
                $rooms[$room_name] = array(
                    "name" => $room_name,
                    "capacity" => $row["capacity"],
                    "is_full" => "",
                    "students" => array()
                );
            }

            $is_full = ($rooms[$room_name]["capacity"] > 0 && count($rooms[$room_name]["students"]) >= $rooms[$room_name]["capacity"]) ? 'Oui' : 'Non';
            $rooms[$room_name]["is_full"] = $is_full;

            $rooms[$room_name]["students"][] = array(
                "id" => $row["student_id"],
                "email" => $row["email"],
                "fullname" => $row["fullname"]
            );
        }
    }

    // Fermer la connexion à la base de données
    $conn->close();

    return $rooms;
}

$rooms = find_full_rooms();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Liste des Salles et Étudiants</h1>
    <?php foreach ($rooms as $room) : ?>
        <h2>Salle: <?= $room['name'] ?></h2>
        <p>Capacité: <?= $room['capacity'] ?></p>
        <p>Est Pleine: <?= $room['is_full'] ?></p>
        <?php if (!empty($room["students"])) : ?>
            <h3>Étudiants:</h3>
            <ul>
                <?php foreach ($room["students"] as $student) : ?>
                    <li>
                        ID: <?= $student["id"] ?>,
                        E-mail: <?= $student["email"] ?>,
                        Nom Complet: <?= $student["fullname"] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>
