<?php
class Grade {
    // Attributs de la classe
    public $id;
    public $room_id;
    public $name;
    public $year;


    // Constructeur de la classe
    public function __construct($id = null, $room_id = null, $name = null, $year = null) {
        $this->id = $id;
        $this->room_id = $room_id;
        $this->name = $name;
        $this->year = $year;
    }

        // Getter pour le room_id
        public function getRoom_id(): ?string
        {
            return $this->room_id;
        }
    
        // Setter pour le room_id
        public function setRoom_id(string $room_id): static 
        {
            $this->room_id = $room_id;
            return $this;
        }
    
        // Getter pour le name
        public function getName(): ?string
        {
            return $this->name;
        }
    
        // Setter pour le name
        public function setName(string $name): static 
        {
            $this->name = $name;
            return $this;
        }

        // Getter pour le year
        public function getYear(): ?string
        {
            return $this->year;
        }
    
        // Setter pour le year
        public function setYear(string $year): static 
        {
            $this->year = $year;
            return $this;
        }

    // Méthode pour afficher les informations de l'étudiant
    public function displayInfo() {
        echo "ID " . $this->id . "<br>";
        echo "Salle référence " . $this->room_id . "<br>";
        echo "Promotion " . $this->name . "<br>";
        echo "Année " . $this->year . "<br>";
    }

    public function getStudents() {
        // Informations de connexion à la base de données
        $servername = "localhost";
        $username = "pma";
        $password = "plomkiplomki";
        $dbname = "lp_official";

        try {
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM students WHERE promotion_id = :promotion_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':promotion_id', $this->id, PDO::PARAM_INT);
            $stmt->execute();
            $students = [];
            while ($studentData = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $student = new Student($studentData['id'], $studentData['name'], $studentData['email']);
                $students[] = $student;
            }
            return $students;
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
}
?>