<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facture extends CI_Model {
    public $id;
    public $NumFactre;
    public $vendeur;
    public $acheteur;
    public $idContact;
    public $ModePayement;
    public $prix;
    public $Nombre;
    public $idproduit;
    public $idstocke;

    public function __construct($id = NULL, $NumFactre = NULL, $vendeur = NULL, $acheteur = NULL, $idContact = NULL, $ModePayement = NULL, $prix = NULL, $Nombre = NULL, $idproduit = NULL, $idstocke = NULL) {
        parent::__construct();
        $this->id = $id;
        $this->NumFactre = $NumFactre;
        $this->vendeur = $vendeur;
        $this->acheteur = $acheteur;
        $this->idContact = $idContact;
        $this->ModePayement = $ModePayement;
        $this->prix = $prix;
        $this->Nombre = $Nombre;
        $this->idproduit = $idproduit;
        $this->idstocke = $idstocke;
    }

    // getters
    public function getId() {
        return $this->id;
    }

    public function getNumFactre() {
        return $this->NumFactre;
    }

    public function getVendeur() {
        return $this->vendeur;
    }

    public function getAcheteur() {
        return $this->acheteur;
    }

    public function getIdContact() {
        return $this->idContact;
    }

    public function getModePayement() {
        return $this->ModePayement;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getNombre() {
        return $this->Nombre;
    }

    public function getIdProduit() {
        return $this->idproduit;
    }

    public function getIdStocke() {
        return $this->idstocke;
    }

    // setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setNumFactre($NumFactre) {
        $this->NumFactre = $NumFactre;
    }

    public function setVendeur($vendeur) {
        $this->vendeur = $vendeur;
    }

    public function setAcheteur($acheteur) {
        $this->acheteur = $acheteur;
    }

    public function setIdContact($idContact) {
        $this->idContact = $idContact;
    }

    public function setModePayement($ModePayement) {
        $this->ModePayement = $ModePayement;
    }
    public function setPrix($prix){
        $this->Prix = $prix;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setIdproduit($idproduit){
        $this->idproduit = $idproduit;
    }
    public function setstocke($idstocke){
        $this->idstocke = $idstocke;
        
    }
    public function update($id, $numFacture, $idContact, $vendeur, $acheteur,
    $prix, $modePaiement, $nombre, $dateFacture)
    {
        $data = array(
            'vendeur' => $vendeur,
            'NumFacture' => $numFacture,
            'acheteur' => $acheteur,
            'ModePayement' => $modePaiement,
            'nombre' => $nombre,
            'prix' => $prix,
            'idContact' => $idContact,
            'dateFacture' => $dateFacture
        );
        $this->db->where('id', $id);
        $this->db->update('facture', $data);
    }
}