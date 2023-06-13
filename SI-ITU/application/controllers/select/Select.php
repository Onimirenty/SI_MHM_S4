<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Select extends CI_Controller
{

    public function infoComptabilite()
    {
        $data['categorie']="S";
        $data['content'] = "select/infoComptabilite";

		$this->load->view('templates/template',$data);
        // $this->load->view('select/infoComptabilite');
    }
    public function contact()
    {
        $data['categorie']="S";
        $data['content'] = "select/contact";
		$this->load->view('templates/template',$data);
        // $this->load->view('select/contact');
    }
    public function compte()
    {
        $data['categorie']="E";
        $data['content'] = "select/planComptable";
		$this->load->view('templates/template',$data);
        // $this->load->view('select/contact');
    }
    public function employer()
    {
        $data['categorie']="S";
        $data['content'] = "select/employer";
		$this->load->view('templates/template',$data);
        // $this->load->view('select/employer');
    }
    public function entreprise()
    {
        $data['categorie']="S";
        $data['content'] = "select/entreprise";
		$this->load->view('templates/template',$data);
        // $this->load->view('select/entreprise');
        
    }
    public function facture ()
    {
        $data['categorie']="A";
        $data['content'] = "select/facture";
		$this->load->view('templates/template',$data);
        // $this->load->view('select/facture');
    }
    public function journal()
    {
        $data['categorie']="E";
        $data['content'] = "select/journal";
		$this->load->view('templates/template',$data);
    }
    public function journalachats()
    {
        $data['categorie']="U";
        $data['content'] = "select/journalachats";
		$this->load->view('templates/template',$data);
    }
    
    public function journalventes()
    {
        $data['categorie']="U";
        $data['content'] = "select/journalventes";
		$this->load->view('templates/template',$data);
    }
    
    public function journalbanque()
    {
        $data['categorie']="U";
        $data['content'] = "select/journalbanque";
		$this->load->view('templates/template',$data);
       
    }
    public function BondCommande()
    {
        $data['categorie']="B";
        $data['content'] = "select/BondCommande";
		$this->load->view('templates/template',$data);
       
    }
 
    public function journalcaisse()
    {
        $data['categorie']="U";
        $data['content'] = "select/journalcaisse";
		$this->load->view('templates/template',$data);
    }
    public function Facturation()
    {
        $data['categorie']="E";
        $data['content'] = "select/Facturation";
		$this->load->view('templates/template',$data);
    }
    
    
    public function journalanouveau()
    {
        $data['categorie']="U";
        $data['content'] = "select/journalanouveau";
		$this->load->view('templates/template',$data);
        $this->load->view('templates/journal');
    }
    public function Produit()
    {
        $data['categorie']="S";
        $data['content'] = "select/Produit";
		$this->load->view('templates/template',$data);
        // $this->load->view('select/Produit');
    }
    
    public function bilan() {
        $this->load->model('Bilan');
        // show_error($this->input->post('inputDate'));
        if($this->input->post('inputDate') == null )
        {
            $inputDate ='2090-02-06';
        }
        else
        {
            $inputDate = $this->input->post('inputDate');
        }
        $data['dates'] = $inputDate;
        $data['actif'] = $this->Bilan->TotalActif($inputDate);
        $data['passif'] = $this->Bilan->TotalPassif($inputDate);
        $data['resultat'] = $this->Bilan->TotalResultat($inputDate);
        $data['bilan'] = $this->Bilan->BilanSociete($inputDate);


        $data['categorie']="E";
        $data['content'] = "select/bilan";
        // $data['Id'] = $Id; 
        $this->load->view('templates/template', $data);
        // $this->load->view('Select/bilan');
    }
    public function chargeProduit()
    {
        $this->load->model('Analytique');
        $this->load->model('Bilan');
        
        $inputDate = $this->input->post('inputDate');
        if($this->input->post('inputDate') == null )
        {
            $inputDate ='2090-02-06';
        }
        else
        {
            $inputDate = $this->input->post('inputDate');
        }
        $data['dates'] = $inputDate;
        $data['passif'] = $this->Bilan->TotalPassif($inputDate);
        $data['categorie']="A";
        $data['content'] = "select/chargeProduit";
        $this->load->view('templates/template', $data);
    }
  
    
    public function balance()
    {
        $inputDate = $this->input->post('inputDate');
        // $this->db->from('transactions');
        // $this->db->select_min('dates');
        // $query = $this->db->get();
        // $date1 = new DateTime($inputDate);
        // if ($query->num_rows() > 0) 
        // {
        //     $row = $query->row();
        //     $dateLaPlusAncienne = $row->dates;
        //     $date2 = new DateTime($dateLaPlusAncienne);
        //     if ($date2> $date1)
        //     {
        //         $inputDate = $dateLaPlusAncienne;
        //     }
        // } 
        // else 
        // {
        //     show_error('Une erreur s\'est produite verifier le contenue de la table transaction.dates');
        // }

        $data['categorie']="E";
        $data['content'] = "select/balance";
        $data['dates'] = $inputDate;		
        $this->load->view('templates/template',$data);
        // $this->load->view('select/contact');
    }
   
   
    public function centre()
    {
        $this->load->model('Analytique');
        $this->load->model('Bilan');
        
        $inputDate = $this->input->post('inputDate');
        $data['dates'] = $inputDate;	
        if($this->input->post('inputDate') == null )
        {
            $inputDate ='2090-02-06';
        }
        else
        {
            $inputDate = $this->input->post('inputDate');
        }
        $data['dates'] = $inputDate;
        $data['passif'] = $this->Bilan->TotalPassif($inputDate);
        
        $data['categorie']="E";
        $data['content'] = "select/centre";
        $this->load->view('templates/template', $data);
    }



    public function seuilRentabilite()
    {
        $this->load->model('Analytique');
        $this->load->model('Bilan');
        
        $inputDate = $this->input->post('inputDate');
        $data['dates'] = $inputDate;	
        if($this->input->post('inputDate') == null )
        {
            $inputDate ='2090-02-06';
        }
        else
        {
            $inputDate = $this->input->post('inputDate');
        }
        $data['dates'] = $inputDate;
        $data['passif'] = $this->Bilan->TotalPassif($inputDate);
        
        $this->load->model('Analytique');
        $data['categorie']="A";
        $data['content'] = "select/seuilRentabilite";
        $this->load->view('templates/template', $data);
    }

    public function diagrame()
    {
        $this->load->model('Analytique');
        $this->load->model('Bilan');
        
        $inputDate = $this->input->post('inputDate');
        $data['dates'] = $inputDate;	
        if($this->input->post('inputDate') == null )
        {
            $inputDate ='2090-02-06';
        }
        else
        {
            $inputDate = $this->input->post('inputDate');
        }
        $data['dates'] = $inputDate;
        $data['passif'] = $this->Bilan->TotalPassif($inputDate);
        
        $this->load->model('Analytique');
        $data['categorie']="A";
        $data['content'] = "select/diagrame";
        $this->load->view('templates/template', $data);
    }

    public function diagrame2()
    {
        $this->load->model('Analytique');
        $this->load->model('Bilan');
        
        $inputDate = $this->input->post('inputDate');
        $data['dates'] = $inputDate;    
        if($this->input->post('inputDate') == null )
        {
            $inputDate ='2090-02-06';
        }
        else
        {
            $inputDate = $this->input->post('inputDate');
        }
        $data['dates'] = $inputDate;
        $data['passif'] = $this->Bilan->TotalPassif($inputDate);
        
        $this->load->model('Analytique');
        $data['categorie']="A";
        $data['content'] = "select/diagrame";
        $this->load->view('templates/template', $data);
    }

}


?>