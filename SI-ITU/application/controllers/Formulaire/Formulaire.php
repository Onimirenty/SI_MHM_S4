<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulaire extends CI_Controller
{
    public function infoComptabilite()
    {
        //tableau d'objet
        $identite_entreprise = $this->db->get('identite_Entreprise')->result();
        $devise = $this->db->get('Devise')->result();

        $data['identite_entreprise'] = $identite_entreprise;
        $data['devise'] = $devise;

        $this->load->view('formulaire/infoComptabilite',$data);
    }
    public function contact()
    {
        $this->load->view('formulaire/contact');
    }
    public function employer()
    {
        $this->load->view('formulaire/employer');
    }
    public function entreprise()
    {
        $this->load->view('formulaire/entreprise');
        
    }
    public function facture ()
    {
        $this->load->view('formulaire/facture');
    }
    public function produit ()
    {
        $this->load->view('formulaire/produit');
    }
}
