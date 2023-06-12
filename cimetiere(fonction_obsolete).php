<?php 
    /*
        / *
            retourne la balance depuis la table transactions
        * /
        public function get_all_transactions()
        {
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
    */
?>