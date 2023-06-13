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
    
    
    public function createProduit($produit) {
        // Insérer le produit dans la base de données
        $this->db->insert('produits', $produit);
        return $this->db->insert_id(); // Retourne l'ID du produit créé
    }
    
    public function updateProduit($produit) {
        // Mettre à jour le produit dans la base de données
        $this->db->where('id', $produit->getId());
        $this->db->update('produits', $produit);
        return $this->db->affected_rows(); // Retourne le nombre de lignes affectées
    }
    
    public function deleteProduit($id) {
        // Supprimer le produit de la base de données
        $this->db->where('id', $id);
        $this->db->delete('produits');
        return $this->db->affected_rows(); // Retourne le nombre de lignes affectées
    }
    
    public function getProduitById($id) {
        // Récupérer le produit à partir de l'ID
        $this->db->where('id', $id);
        $query = $this->db->get('produits');
        return $query->row(); // Retourne le produit sous forme d'objet
    }
    
    public function getAllProduit() {
        $query = $this->db->get('produits');
        return $query->result();
    }
    public function getAllProduitAsOject() {
        $query = $this->db->get('produits');     
        $produits = array();
    
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $produit = new Produit($row->id, $row->nompoduit, $row->prix, $row->nombre);
                $produits[] = $produit;
            }
        }
    
        return $produits;
    }

}
?>