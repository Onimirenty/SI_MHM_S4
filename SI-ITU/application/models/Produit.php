<?php
class Produit extends CI_model{
    public $id;
    public $nompoduit;
    public $prix;
    public $nombre;

     public function __construct($id, $nompoduit, $prix, $nombre) {
        $this->id = $id;
        $this->nompoduit = $nompoduit;
        $this->prix = $prix;
        $this->nombre = $nombre;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNompoduit() {
        return $this->nompoduit;
    }

    public function setNompoduit($nompoduit) {
        $this->nompoduit = $nompoduit;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}
?>