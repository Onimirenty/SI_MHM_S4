<?php
/* 
    *    @author:    mirenty 1890,mickael 1819,Hasina 1762
    *     S'il vous plait veuillez lire readMe.md
    *
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Update extends CI_Controller
{
    public function infoComptabilite()
    {

        $id = $this->input->post('id');
        $capitale = $this->input->post('capitale');
        $NIF = $this->input->post('NIF');
        $NSTAT = $this->input->post('NSTAT');
        $NRCS = $this->input->post('NRCS');
        $data = array(
            'capitale' => $capitale,
            'NIF' => $NIF,
            'NSTAT' => $NSTAT,
            'NRCS' => $NRCS,
        );
        $this->db->where('id', $id);
        $this->db->update('InfoComptabilite', $data);
        $data['categorie'] = "S";
        $data['content'] = "select/InfoComptabilite";
        $this->load->view('templates/template', $data);
    }
    
    public function contact()
    {
        $id = $this->input->post('id');
        
        $adresse = $this->input->post('adresse');
        $telephone = $this->input->post('telephone');
        $mail = $this->input->post('mail');
        $data = array(
            'adresse' => $adresse,
            'telephone' => $telephone,
            'mail' => $mail,
        );
        
        $this->db->where('id', $id);
        $this->db->update('Contact', $data);
        $data['categorie'] = "S";
        $data['content'] = "select/contact";
        $this->load->view('templates/template', $data);
    }
    
    public function employe()
    {
        $id = $this->input->post('id');
        $dateNaissance = $this->input->post('dateNaissance');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $metier = $this->input->post('metier');
        $salaire = $this->input->post('salaire');
        $pouvoirExecutif = $this->input->post('pouvoirExecutif');
        
        $data = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'metier' => $metier,
            'salaire' => $salaire,
            'dateNaissance' => $dateNaissance,
            'pouvoirExecutif' => $pouvoirExecutif,

        );

        $this->db->where('id', $id);
        $this->db->update('Employe', $data);
        $data['categorie'] = "S";
        $data['content'] = "select/employe";
        $this->load->view('templates/template', $data);
    }

    public function facture()
    {
        $id = $this->input->post('id');
        $numFacture = $this->input->post('NumFacture');
        $idContact = $this->input->post('idContact');
        $vendeur = $this->input->post('vendeur');
        $acheteur = $this->input->post('acheteur');
        $prix = $this->input->post('prix');
        $modePaiement = $this->input->post('ModePayement');
        $nombre = $this->input->post('nombre');
        $dateFacture = $this->input->post('dateFacture');
        $this->load->model('Facture');
        $this->Facture->update($id, $numFacture, $idContact, $vendeur, $acheteur, $prix, $modePaiement, $nombre, $dateFacture);
        $data['categorie'] = "S";
        $data['content'] = "select/facture";
        $this->load->view('templates/template', $data);
    
    }
    
    public function identite_Entreprise()
    {
        $id = $this->input->post('id');
        $logo = $this->input->post('logo');
        $dateCreation = $this->input->post('dateCreation');
        $nomSociete = $this->input->post('nomSociete');
        $objetSociete = $this->input->post('objetSociete');
        $LieuExercice = $this->input->post('LieuExercice');
        
        $data = array(
            'logo' => $logo,
            'dateCreation' => $dateCreation,
            'nomSociete' => $nomSociete,
            'objetSociete' => $objetSociete,
            'LieuExercice' => $LieuExercice,
            'nomSociete' => $nomSociete,
        );
        $this->db->where('id', $id);
        $this->db->update('Adentite_Entreprise', $data);
        $data['categorie'] = "S";
        $data['content'] = "select/entreprise";
        $this->load->view('templates/template', $data);
    }
    
    public function produit()
    {
        $id = $this->input->post('id');
        $nomproduit = $this->input->post('nomproduit');
        $PrixUnitaire = $this->input->post('PrixUnitaire');
        $nombre = $this->input->post('nombre');
        
        $data = array(
            'nomproduit' => $nomproduit,
            'PrixUnitaire' => $PrixUnitaire,
            'nombre' => $nombre,
        );
        
        $this->db->where('id', $id);
        $this->db->update('produit', $data);
        $data['categorie'] = "S";
        $data['content'] = "select/produit";
        $this->load->view('templates/template', $data);
    }
    
    public function stock()
    {
        $id = $this->input->post('id');
        $nomStocke = $this->input->post('nomStocke');
        $prix = $this->input->post('prix');
        $nombre = $this->input->post('nombre');
        
        $data = array(
            'nomStocke' => $nomStocke,
            'Prix' => $prix,
            'nombre' => $nombre,
        );
        $this->db->where('id', $id);
        $this->db->update('stocke', $data);
        $data['categorie'] = "S";
        $data['content'] = "select/stock";
        $this->load->view('templates/template', $data);
    }

}
