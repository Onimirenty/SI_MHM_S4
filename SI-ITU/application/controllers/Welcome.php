<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$identite_entreprise = $this->db->get('identite_Entreprise')->result();
        $devise = $this->db->get('Devise')->result();
        
        $data['identite_entreprise'] = $identite_entreprise;
        $data['devise'] = $devise;
		$data['content'] = "select/contact";
		$data['categorie'] = "S";
		$this->load->view('templates/template',$data);
		
	}
		
	
}
