<?php
class Student {
    // Attributs de la classe
    public $id;
    public $grade_id;
    public $email;
    public $fullname;
    public $birthdate;
    public $gender;

    // Constructeur de la classe
    public function __construct($id = null, $grade_id = null, $email = null, $fullname = null, $birthdate = null, $gender = null) {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
    }

    // Getter pour le grade_id
    public function getGrade_id(): ?string
    {
        return $this->grade_id;
    }

    // Setter pour le grade_id
    public function setGrade_id(string $grade_id): static 
    {
        $this->grade_id = $grade_id;
        return $this;
    }

    // Getter pour le fullname
    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    // Getter pour le email
    public function getEmail(): ?string
    {
        return $this->email;
    }
    
    // Setter pour le email
    public function setEmail(string $email): static 
    {
        $this->email = $email;
        return $this;
    }

    // Setter pour le fullname
    public function setFullname(string $fullname): static 
    {
        $this->fullname = $fullname;
        return $this;
    }

    // Getter pour le birthdate
    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    // Setter pour le birthdate
    public function setBirthdate(string $birthdate): static 
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    // Getter pour le gender
    public function getGender(): ?string
    {
        return $this->gender;
    }

    // Setter pour le gender
    public function setGender(string $gender): static 
    {
        $this->gender = $gender;
        return $this;
    }

    // Méthode pour afficher les informations de l'étudiant
    public function displayInfo() {
        echo "ID: " . $this->id . "<br>";
        echo "Grade ID: " . $this->grade_id . "<br>";
        echo "Email: " . $this->email . "<br>";
        echo "Fullname: " . $this->fullname . "<br>";
        echo "Birthdate: " . $this->birthdate . "<br>";
        echo "Gender: " . $this->gender . "<br>";
    }
}

?>