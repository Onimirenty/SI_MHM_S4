<?php 
class Bilan extends CI_Model 
{
    public function ResultatBilanObsolete()
    {
        $query_actif = $this->db->query('SELECT SUM(valeur) as total_actif FROM transactions JOIN compte ON transactions.idCompte1 = compte.id WHERE compte.position = \'actif\' AND natureTransaction = \'debit\'');
        $result_actif = $query_actif->result_array();
        $total_actif = $result_actif[0]['total_actif'];

        $query_passif = $this->db->query('SELECT SUM(valeur) as total_passif FROM transactions JOIN compte ON transactions.idCompte2 = compte.id WHERE compte.position = \'passif\' AND natureTransaction = \'credit\'');
        $result_passif = $query_passif->result_array();
        $total_passif = $result_passif[0]['total_passif'];

        $resultat_bilan = $total_actif - $total_passif;
        $toto = array();
        $toto[] = $total_actif;
        $toto[] =$total_passif;
        return $resultat_bilan;
        // echo 'Total des actifs : ' . $total_actif . '<br>';
        // echo 'Total des passifs : ' . $total_passif . '<br>';
        // echo 'Résultat du bilan : ' . $resultat_bilan;
    }
    public function TotalActif($dates)
    {
        $query_actif = $this->db->query("SELECT SUM(valeur) as total_actif FROM transactions JOIN Compte ON transactions.idCompte1 = Compte.id WHERE transactions.position = 'actif' AND transactions.dates < '" . $dates . "'");
        $result_actif = $query_actif->result_array();
        $total_actif = $result_actif[0]['total_actif'];
        
        return $total_actif;
    }
    
    
    public function TotalPassif($dates)
    {
        $query_passif = $this->db->query("SELECT SUM(valeur) as total_passif FROM transactions JOIN Compte ON transactions.idCompte1 = Compte.id WHERE transactions.position = 'passif' AND transactions.dates < '" . $dates . "'");
        $result_passif = $query_passif->result_array();
        $total_passif = $result_passif[0]['total_passif'];

        return $total_passif;
    }

    
    public function BilanSociete($dates)
    {
        $act =$this->TotalActif($dates);
        $pas = $this->TotalPassif($dates);
        return abs( $act - $pas );
    }
    public function TotalResultat($dates)
    {
        $query_charge = $this->db->query("SELECT SUM(valeur) as total_charge FROM transactions JOIN Compte ON transactions.idCompte1 = Compte.id WHERE Compte.position = 'charge' AND transactions.dates < '" . $dates . "'");
        $result_charge = $query_charge->result_array();
        $total_charge = $result_charge[0]['total_charge'];

        $query_vente = $this->db->query("SELECT SUM(valeur) as total_vente FROM transactions JOIN Compte ON transactions.idCompte1 = Compte.id WHERE Compte.position = 'vente' AND transactions.dates < '" . $dates . "'");
        $result_vente = $query_vente->result_array();
        $total_vente = $result_vente[0]['total_vente'];
        
        return $total_vente - $total_charge ;
    }
}
?>