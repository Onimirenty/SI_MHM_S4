<?php
/* 
    *    @author:    mirenty 1890,mickael 1819,Hasina 1762
    *     S'il vous plait veuillez lire readMe.md
    *
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Delete extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function comptabilite()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('InfoComptabilite');
        $data['categorie'] = "S";
        $data['content'] = "select/InfoComptabilite";
        $this->load->view('templates/template', $data);
    }
    
    ///contact
    public function contact()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('Contact');
        $data['categorie'] = "S";
        $data['content'] = "select/contact";
        $this->load->view('templates/template', $data);
    }
    
    ////employer
    public function employe()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('Employe');
        $data['categorie'] = "S";
        $data['content'] = "select/employe";
        $this->load->view('templates/template', $data);
    }
    
    public function identite_Entreprise()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('identite_Entreprise');
        $data['categorie'] = "S";
        $data['content'] = "select/entreprise";
        $this->load->view('templates/template', $data);
    
    }
    
    //facture
    public function facture()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('Facture');
        $data['categorie'] = "S";
        $data['content'] = "select/facture";
        $this->load->view('templates/template', $data);
    }
    
    //produit
    public function produit()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('Produit');
        $data['categorie'] = "S";
        $data['content'] = "select/produit";
        $this->load->view('templates/template', $data);
    }
    
    //stock
    public function stock()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('Stocke');
        $data['categorie'] = "S";
        $data['content'] = "select/stock";
        $this->load->view('templates/template', $data);
    }
}
