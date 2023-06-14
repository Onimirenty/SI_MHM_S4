<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Balance extends CI_Model 
{


    public function s()
    {
        return "hello";
    }    
    public function getBalance() 
    {
        $this->db->SELECT_sum('valeur');
        $this->db->where('natureTransaction', 'debit');
        $this->db->where_in('position', array('actif', 'charge'));
        $query_debit = $this->db->get('transactions');
        $total_debit = $query_debit->row()->valeur;
    
        $this->db->SELECT_sum('valeur');
        $this->db->where('natureTransaction', 'credit');
        $this->db->where_in('position', array('passif', 'vente'));
        $query_credit = $this->db->get('transactions');
        $total_credit = $query_credit->row()->valeur;
    
        $balance = $total_debit - $total_credit;
    
        return $balance;
    }
    
    public function get_all_transactions() {
        $this->db->SELECT('*');
        $this->db->FROM('transactions');
        $query = $this->db->get();
        $transactions = $query->result();
        
        $balance = 0;
        
        foreach ($transactions as $transaction) {
            if ($transaction->position == 'actif' || $transaction->position == 'charge') {
                if ($transaction->natureTransaction == 'debit') {
                    $balance -= $transaction->valeur;
                } else {
                    $balance += $transaction->valeur;
                }
            } elseif ($transaction->position == 'passif' || $transaction->position == 'charge' || $transaction->position == 'vente') {
                if ($transaction->natureTransaction == 'debit') {
                    $balance += $transaction->valeur;
                } else {
                    $balance -= $transaction->valeur;
                }
            }
        }
        
        return $balance;
    }


public function getPassif($data){
$passif = array();



}

    public function getTransactions($date)
    {
        $transactions = array(); // initialisation du tableau des transactions
        date_default_timezone_set('Europe/Paris');
        $date_str = $date;
        $date = new DateTime($date_str);
        $date = $date->format('Y-m-d');
        // echo $date;
        $sql = "SELECT t.*, c1.intitule_Sous_compte AS compte1, c2.intitule_Sous_compte AS compte2
        FROM transactions t
        LEFT JOIN Compte c1 ON c1.id = t.idCompte1
        LEFT JOIN Compte c2 ON c2.id = t.idCompte2
        WHERE t.dates < '" .$date ."'"
        ;
        
        $query = $this->db->query($sql, array($date));

        $sql2=" SELECT *
                FROM Solde 
                JOIN Compte on Solde.idCompte = Compte.id 
                JOIN transactions on Solde.idCompte = transactions.idCompte1 
            WHERE Solde.dates = '" .$date ."'"
        ;
        $query2 = $this->db->query($sql2,array($date));
        
        if ($query) 
        {
            $balance = 0;
            foreach ($query->result() as $row) 
            {
                if($row->position == 'passif')
                {
                    $diffSolde=0;
                    $diff = $row->natureTransaction == 'debit' ? $row->valeur * -1 : $row->valeur;
                    
                    foreach($query2->result() as $row2)
                    {
                        if($row2->idCompte1 == $row->idCompte1)
                        {
                            $diffSolde = $row2->Solde + $diff;
                            $req3="update Solde set Solde = {$diffSolde} where idCompte = {$row->idCompte1}";
                            $this->db->query($req3);
                        }
                    }
                }
                else
                {
                    $diffSolde=0;
                    $diff = $row->natureTransaction == 'debit' ? $row->valeur : $row->valeur * -1;
                    foreach($query2->result() as $row2)
                    {
                        if($row2->idCompte1 == $row->idCompte1)
                        {
                            $diffSolde = $row2->Solde + $diff;
                            $req3="update Solde set Solde = {$diffSolde} where idCompte = {$row->idCompte1}";
                            $this->db->query($req3);
                        }
                    }
                }
                $balance += $diff;
                $alance=abs($balance);

                // echo "Opération : {$row->operation} | Compte 1 : {$row->compte1} |  Compte 2 : {$row->compte2} | Valeur : {$row->valeur} | nature : {$row->natureTransaction}  | Balance : {$alance} <br>";
                $transaction = array(
                    'Opération' => $row->operation,
                    'idCompte1' => $row->idCompte1,
                    'Compte1' => $row->compte1,
                    'Compte2' => $row->compte2,
                    'Valeur' => $row->valeur,
                    'position' => $row->position,
                    'nature' => $row->natureTransaction,
                    'Balance' => $balance
                );
                
                array_push($transactions, $transaction);
            }
            
            return $transactions;
        } 
        else 
        {
            echo "Erreur : Impossible de récupérer les transactions.";
        }
}

public function insertTransaction($operation="", $idCompte1, $idCompte2, $valeur, $natureTransaction,$position, $dates)
{
    $data = array(
        'operation' => $operation,
        'idCompte1' => $idCompte1,
        'idCompte2' => $idCompte2,
        'valeur' => $valeur,
        'natureTransaction' => $natureTransaction,
        'position' => $position,
        'dates' => $dates
    );
    
    $this->db->insert('transactions', $data);


    return $this->db->insert_id(); // Retourne l'ID de la transaction nouvellement insérée

}

public function getNomCompteById($Id) {
    $this->db->select('intitule_Sous_compte');
    $this->db->from('Compte');
    $this->db->where('id', $Id);
    $query = $this->db->get();
    $result = $query->row();
    return $result->intitule_Sous_compte;
}

    
    
}
?>