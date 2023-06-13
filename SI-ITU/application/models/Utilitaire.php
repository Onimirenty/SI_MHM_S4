<?php
class Utilitaire extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // verifie si il ya une cle local et si sa vaeur est vrai
    public function verificationCleLocal($cheminFichier)
    {
        $cle = "itu";
        if (file_exists($cheminFichier)) {
            $contenu = file_get_contents($cheminFichier);
            $str1 = trim($contenu);
            $str2 = trim($cle);
            if ($str1 == $str2) {
                return true;
            } else {
            // Error("Le fichier n'existe pas.");
            return false;
            }
        }
        
        return false;
        
    }
    // Fonction de vérification de login
    public function verifyLoginClient($email, $mdp)
    {
        $query = $this->db->get_where('client_compte', array('email' => $email, 'mdp' => $mdp));
        $result = $query->row();
        if($result == null)
        {
            return false;
        }
        return true;
    }
    public function verifyLoginAdmin($email, $mdp,$cheminFichier)
    {
        $query = $this->db->get_where('admin_compte', array('email' => $email, 'mdp' => $mdp));
        $result = $query->row();
        $cle=$this->Utilitaire->verificationCleLocal($cheminFichier);
        if($result == null || $cle == false)
        {
            return false;
        }
        // return $result;
        return true;
    }
    
    // Fonction d'inscription
    public function register($nom, $email, $mdp)
    {
        $data = array(
            'nom' => $nom,
            'email' => $email,
            'mdp' => $mdp
        );
        $this->db->insert('client_compte', $data);
    }
}
?>