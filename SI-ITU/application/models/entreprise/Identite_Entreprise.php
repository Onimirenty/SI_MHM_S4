<?php
class Identite_Entreprise extends CI_Model {
    private $id;
    private $logo;
    private $nomSociete;
    private $objetSociete;
    private $dateCreation;
    private $lieuExercice;
    private $idContact;

    public function __construct($id, $logo, $nomSociete, $objetSociete, $dateCreation, $lieuExercice, $idContact) {
        $this->id = $id;
        $this->logo = $logo;
        $this->nomSociete = $nomSociete;
        $this->objetSociete = $objetSociete;
        $this->dateCreation = $dateCreation;
        $this->lieuExercice = $lieuExercice;
        $this->idContact = $idContact;
    }

    public function getId() {
        return $this->id;
    }

    public function getLogo() {
        return $this->logo;
    }

    public function setLogo($logo) {
        $this->logo = $logo;
    }

    public function getNomSociete() {
        return $this->nomSociete;
    }

    public function setNomSociete($nomSociete) {
        $this->nomSociete = $nomSociete;
    }

    public function getObjetSociete() {
        return $this->objetSociete;
    }

    public function setObjetSociete($objetSociete) {
        $this->objetSociete = $objetSociete;
    }

    public function getDateCreation() {
        return $this->dateCreation;
    }

    public function setDateCreation($dateCreation) {
        $this->dateCreation = $dateCreation;
    }

    public function getLieuExercice() {
        return $this->lieuExercice;
    }

    public function setLieuExercice($lieuExercice) {
        $this->lieuExercice = $lieuExercice;
    }

    public function getIdContact() {
        return $this->idContact;
    }

    public function setIdContact($idContact) {
        $this->idContact = $idContact;
    }
}

?>