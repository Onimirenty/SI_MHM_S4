<?php
/* 
    *    @author:    mirenty 1890,mickael 1819,Hasina 1762
    *     S'il vous plait veuillez lire readMe.md
    *
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Select extends CI_Controller
{

    public function infoComptabilite()
    {
        $data['categorie']="S";
        $data['content'] = "select/infoComptabilite";
		$this->load->view('templates/template',$data);
    }
    public function contact()
    {
        $data['categorie']="S";
        $data['content'] = "select/contact";
		$this->load->view('templates/template',$data);
    }
    public function compte()
    {
        $data['categorie']="E";
        $data['content'] = "select/planComptable";
		$this->load->view('templates/template',$data);
    }
    public function employer()
    {
        $data['categorie']="S";
        $data['content'] = "select/employer";
		$this->load->view('templates/template',$data);
    }
    public function entreprise()
    {
        $data['categorie']="S";
        $data['content'] = "select/entreprise";
		$this->load->view('templates/template',$data);
        
    }
    public function facture ()
    {
        $data['categorie']="S";
        $data['content'] = "select/facture";
		$this->load->view('templates/template',$data);
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
    
    public function journalcaisse()
    {
        $data['categorie']="U";
        $data['content'] = "select/journalcaisse";
		$this->load->view('templates/template',$data);
    }
    
    
    public function journalanouveau()
    {
        $data['categorie']="U";
        $data['content'] = "select/journalanouveau";
		$this->load->view('templates/template',$data);
    }
    public function Produit()
    {
        $data['categorie']="S";
        $data['content'] = "select/Produit";
		$this->load->view('templates/template',$data);
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
        $this->load->view('templates/template', $data);
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
        $data['categorie']="S";
        $data['content'] = "select/chargeProduit";
        $this->load->view('templates/template', $data);
    }
    public function balance()
    {
        $inputDate = $this->input->post('inputDate');
        $data['categorie']="E";
        $data['content'] = "select/balance";
        $data['dates'] = $inputDate;		
        $this->load->view('templates/template',$data);
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

    

    public function sr()
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
        $data['categorie']="S";
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
        $data['categorie']="S";
        $data['content'] = "select/diagrame";
        $this->load->view('templates/template', $data);
    }
}


?>