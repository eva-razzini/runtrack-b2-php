<?php

// Informations de connexion à la base de données
$servername = "localhost";
$username = "pma";
$password = "plomkiplomki";
$dbname = "lp_official";

// Fonction pour récupérer un étudiant par ID
function findOneStudent(int $id) {
    global $servername, $username, $password, $dbname;

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM students WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $studentData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$studentData) {
            return null;
        }

        // Créer une instance de la classe Student en utilisant les données récupérées
        $student = new Student($studentData['id'], $studentData['name'], $studentData['email']);
        return $student;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

// Fonction pour récupérer une note par ID
function findOneGrade(int $id) {
    global $servername, $username, $password, $dbname;

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM grades WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $gradeData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$gradeData) {
            return null;
        }

        // Créer une instance de la classe Grade en utilisant les données récupérées
        $grade = new Grade($gradeData['id'], $gradeData['value']);
        return $grade;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

// Fonction pour récupérer un étage par ID
function findOneFloor(int $id) {
    global $servername, $username, $password, $dbname;

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM floors WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $floorData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$floorData) {
            return null;
        }

        // Créer une instance de la classe Floor en utilisant les données récupérées
        $floor = new Floor($floorData['id'], $floorData['name']);
        return $floor;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

// Fonction pour récupérer une chambre par ID
function findOneRoom(int $id) {
    global $servername, $username, $password, $dbname;

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM rooms WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $roomData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$roomData) {
            return null;
        }

        // Créer une instance de la classe Room en utilisant les données récupérées
        $room = new Room($roomData['id'], $roomData['number']);
        return $room;
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données : " . $e->getMessage());
    }
}

// Autres fonctions pour récupérer des données

?>
