<?php
class Room {
    // Attributs de la classe
    public $id;
    public $floor_id;
    public $name;
    public $capacity;


    // Constructeur de la classe
    public function __construct($id = null, $floor_id = null, $name = null, $capacity = null) {
        $this->id = $id;
        $this->floor_id = $floor_id;
        $this->name = $name;
        $this->capacity = $capacity;
    }

        // Getter pour le floor_id
        public function getFloor_id(): ?string
        {
            return $this->floor_id;
        }
    
        // Setter pour le floor_id
        public function setFloor_id(string $floor_id): static 
        {
            $this->floor_id = $floor_id;
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

        // Getter pour le capacity
        public function getCapacity(): ?string
        {
            return $this->capacity;
        }
    
        // Setter pour le capacity
        public function setCapacity(string $capacity): static 
        {
            $this->capacity = $capacity;
            return $this;
        }

    // Méthode pour afficher les informations de l'étudiant
    public function displayInfo() {
        echo "ID: " . $this->id . "<br>";
        echo "Noméro d'étage " . $this->floor_id . "<br>";
        echo "Nom de la Salle " . $this->name . "<br>";
        echo "Capacité " . $this->capacity . "<br>";
    }
}

?>