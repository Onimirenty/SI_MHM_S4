<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delete extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // info compta
    public function comptabilite()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('InfoComptabilite');

        // $this->load->view('select/infoComptabilite');

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

        // $this->load->view('select/contact');

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

        // $this->load->view('select/employer');

        $data['categorie'] = "S";
        $data['content'] = "select/employe";
        $this->load->view('templates/template', $data);
    }

    public function identite_Entreprise()
    {
        $id = $this->input->get('id');
        $this->db->where('id', $id);
        $this->db->delete('identite_Entreprise');

        // $this->load->view('select/entreprise');

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

        // $this->load->view('select/facture');


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

        // $this->load->view('select/produit');

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

        // $this->load->view('select/stock');
        $data['categorie'] = "S";
        $data['content'] = "select/stock";
        $this->load->view('templates/template', $data);
    }
}
