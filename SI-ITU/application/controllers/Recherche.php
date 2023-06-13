<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recherche extends CI_Controller {

    public function search()
    {
        $produits=$this->db->get('Produit')->result();
        $data['produits'] =$produits;
        $data['content'] = "select/recherche";
		$data['categorie'] = "S";
		$this->load->view('templates/template',$data);
    }

    public function rechercher()
    {
        $this->load->model('Produit');
        $idProduit = $this->input->post('idProduit');
        $date_debut = $this->input->post('date_debut');
        $date_fin = $this->input->post('date_fin');
        $num_facture = $this->input->post('num_facture');
        $montant_min = $this->input->post('montant_min');
        $montant_max = $this->input->post('montant_max');
        
        $resultats = $this->Utilitaire->rechercherFactures($date_debut, $date_fin, $num_facture, $montant_min, $montant_max,$idProduit);
        $data['resultats'] = $resultats;
        $data['content'] = "select/resultat";
		$data['categorie'] = "S";
		$this->load->view('templates/template',$data);
    }

}
?>
