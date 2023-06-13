<?php
class Analytique extends CI_model
{
    function dv($A, $B)
    {
        $c = $A / $B;
        return $c;
    }

    // Other functions in the Analytique class...
    
    function pourcentage($nombre, $pourcentage)
    {
        $a = 0;
        $o = 0;
        if ($pourcentage <= 100 && $pourcentage >= 0) {
            $a = $nombre * $pourcentage;
            $o = $this->dv($a, 100);
        } else {
            Error("pourcentage non valide");
        }
        return $o;
    }
// charge pour la production d'une unite
function CPU($chargeTotal,$NombreUnite)
{
    $o = $this->dv($chargeTotal,$NombreUnite);
    return $o;
}
// charge pour la production d'une unite part centre
function CPUPC($chargeTotalDeCentre,$NombreUnite)
{
    $o =  $this->dv($chargeTotalDeCentre,$NombreUnite);
    return $o;
}

//seuille de rentabilite(nombre d'unite a vendre pour ne pas etre en fallite)
function SR($CPU,$NombreUnite,$prixDeVenteParUnite)
{
    $hu = ($CPU*$NombreUnite);
    $o = $this->dv($hu,$prixDeVenteParUnite);
    return $o;
}
}

?>
