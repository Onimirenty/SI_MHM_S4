<?php
class TVA extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function getTVA()
    {
        $query = $this->db->get('TVA');
        $tva = $query->row()->taux;
        return $tva;
    }
    public function PrixHT($prixTTC)
    {
        $query = $this->db->get('TVA');
        $tva = $query->row()->taux;

        // Calcul du prix hors taxe
        $prixHT = $prixTTC / (1 + $tva);
        
        return $prixHT;
    }

    public function PrixTTC($prixHT)
    {
        $query = $this->db->get('TVA');
        $tva = $query->row()->taux;

        // Calcul du prix toutes taxes comprises
        $prixTTC = $prixHT * (1 + $tva);
        
        return $prixTTC;
    }
}


?>