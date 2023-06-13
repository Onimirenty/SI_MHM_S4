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
    // Effectuer la requête pour rechercher les factures selon les critères spécifiés    public function rechercherFactures($date_debut, $date_fin, $num_facture, $montant_min, $montant_max)
    public function rechercherFactures($date_debut, $date_fin, $num_facture, $montant_min, $montant_max,$idProduit)
    {
        $this->db->select('*');
        $this->db->from('facture');
    
        $date_debut = empty($date_debut) ? '1970-01-01' : $date_debut;
        $date_fin = empty($date_fin) ? '2050-01-01' : $date_fin;
    
        $this->db->where('dates >=', $date_debut);
        $this->db->where('dates <=', $date_fin);
    
        if (!empty($num_facture)) {
            $this->db->like('numFacture', $num_facture);
        }
        $trillion = bcpow('10', '12');
        $montant_min = empty($montant_min) ? 1 : $montant_min;
        $montant_max = empty($montant_max) ? $trillion : $montant_max;
        
        if (!empty($montant_min) && $montant_min >= 0) {
            $this->db->where('montant >=', $montant_min);
        } else {
            show_error("valeur negative non permit sur le montant minimum");
        }
    
        if (!empty($montant_max) && $montant_max >= 0) {
            $this->db->where('montant <=', $montant_max);
        } else {
            show_error("valeur negative non permit sur le montant maximum");
        }
        if(!empty($idProduit) && $idProduit > 0) {
            $this->db->where('idProduit', $idProduit);
        }
        
        if(!empty($idSociete) && $idSociete > 0) {
            $this->db->where('idSociete', $idSociete);
        }
        $query = $this->db->get();

        return $query->result();
    }
    

    
}
?>