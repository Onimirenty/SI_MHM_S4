<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogSign extends CI_Controller {


	public function logpage()
	{
		$data['content'] = "select/loginSign";
		$data['categorie'] = "S";
		$this->load->view('templates/template',$data);
	}
	public function log()
	{
		$email=$this->input->post('email');
		$mdp=$this->input->post('pwd');
		$path=$this->input->post('path');
		
		if($this->input->post('cle'))
		{
			if($this->Utilitaire->verifyLoginAdmin($email, $mdp,$path))
			{
				$identite_entreprise = $this->db->get('identite_Entreprise')->result();
				$devise = $this->db->get('Devise')->result();
				$data['identite_entreprise'] = $identite_entreprise;
				$data['devise'] = $devise;
				$data['content'] = "select/contact";
			}
			else if($this->Utilitaire->verifyLoginClient($email, $mdp))
			{
				$data['content'] = "select/contact";
			}
			else {
				$data['content'] = "select/loginSign";
			}

		}
		$data['categorie'] = "S";
		$this->load->view('templates/template',$data);
		
	}
	public function register()
	{
		$nom=$this->input->post('nom');
		$email=$this->input->post('email'); 
		$mdp=$this->input->post('pwd');
		$this->Utilitaire->register($nom,$email,$mdp);
		
		$data['content'] = "select/loginSign";
		$data['categorie'] = "S";
		$this->load->view('templates/template',$data);
	}
		
	
}
