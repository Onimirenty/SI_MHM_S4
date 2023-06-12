<?php
class Employe extends CI_Model 
{
    private $id;
    private $nom;
    private $prenom;
    private $dateNaissance;
    private $idDepartement;
    private $metier;
    private $salaire;
    private $pouvoirExecutif;
    private $idSociete;
    private $identite;

    public function __construct($id, $nom, $prenom, $dateNaissance, 
$idDepartement, $metier, $salaire, $pouvoirExecutif, $idSociete, $identite) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateNaissance = $dateNaissance;
        $this->idDepartement = $idDepartement;
        $this->metier = $metier;
        $this->salaire = $salaire;
        $this->pouvoirExecutif = $pouvoirExecutif;
        $this->idSociete = $idSociete;
        $this->identite = $identite;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getDateNaissance() {
        return $this->dateNaissance;
    }

    public function setDateNaissance($dateNaissance) {
        $this->dateNaissance = $dateNaissance;
    }

    public function getIdDepartement() {
        return $this->idDepartement;
    }

    public function setIdDepartement($idDepartement) {
        $this->idDepartement = $idDepartement;
    }

    public function getMetier() {
        return $this->metier;
    }

    public function setMetier($metier) {
        $this->metier = $metier;
    }

    public function getSalaire() {
        return $this->salaire;
    }

    public function setSalaire($salaire) {
        $this->salaire = $salaire;
    }

    public function getPouvoirExecutif() {
        return $this->pouvoirExecutif;
    }

    public function setPouvoirExecutif($pouvoirExecutif) {
        $this->pouvoirExecutif = $pouvoirExecutif;
    }

    public function getIdSociete() {
        return $this->idSociete;
    }

    public function setIdSociete($idSociete) {
        $this->idSociete = $idSociete;
    }

    public function getIdentite() {
        return $this->identite;
    }

    public function setIdentite($identite) {
        $this->identite = $identite;
    }

    public function update($id,$nom, $prenom, $dateNaissance, 
    $idDepartement, $metier, $salaire, $pouvoirExecutif, $idSociete) 
    {
        $data = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'dateNaissance' => $dateNaissance,
            'idDepartement' => $idDepartement,
            'metier' => $metier,
            'salaire' => $salaire,
            'pouvoirExecutif' => $pouvoirExecutif,
            'idSociete' => $idSociete
        );
        $this->db->where('id', $id);
        $this->db->update('Employe', $data);
    }
}
?>