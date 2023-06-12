<?php 
class Desise extends CI_Model 
    {
        /*
            converti une valeur en une autre devise selon une date
            a condition que les deux existent dans la base 
        */
        function trade($valeur,$date,$devise)
        {
            $de=strtolower($devise);
            $date = date('d/m/Y', strtotime($date));
            
            $req = "trade_view.dates = %s and trade_view.devise_etrangere = %f";
            $result = sprintf($req, $date, $de);
            $devise=$this->Dao->getByCondition("trade_view",$result);

            return $valeur * $devise[0]['taux'];
        }
    }
?>