<?php
class Floor {
    // Attributs de la classe
    public $id;
    public $name;
    public $level;

    // Constructeur de la classe
    public function __construct($id = null, $name = null, $level = null) {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
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

    // Getter pour le level
    public function getLevel(): ?string
    {
        return $this->level;
    }

    // Setter pour le level
    public function setLevel(string $level): static 
    {
        $this->level = $level;
        return $this;
    }

    // Méthode pour afficher les informations de l'étudiant
    public function displayInfo() {
        echo "ID: " . $this->id . "<br>";
        echo "Nom: " . $this->name . "<br>";
        echo "Etage: " . $this->level . "<br>";
    }
}

?>