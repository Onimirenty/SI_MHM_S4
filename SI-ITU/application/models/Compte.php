<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte extends CI_Model 
{
        public $idCompteGeneral;
        public $idCompte; 
        public $intitule;
        public $numero;
        public $solde;
        public $sous_compte;
        public $compteTier;

    public function __construct($compteParent, $idCompte, $intitule,
    $numero,$solde,$sous_compte,$compteTier
    )
    {
        $this->compteParent = $compteParent;
        $this->idCompte = $idCompte;
        $this->intitule = $intitule;
        $this->numero = $numero;
        $this->solde = $solde;
        $this->sous_compte = $sous_compte;
        $this->compteTier = $compteTier;
    }
        
    
        public function getIdCompteGeneral()
        {
                return $this->idCompteGeneral;
        }

        public function setIdCompteGeneral($idCompteGeneral): self
        {
                $this->idCompteGeneral = $idCompteGeneral;

                return $this;
        }

        public function getIdCompte()
        {
                return $this->idCompte;
        }

        public function setIdCompte($idCompte): self
        {
                $this->idCompte = $idCompte;

                return $this;
        }

        public function getIntitule()
        {
                return $this->intitule;
        }

        public function setIntitule($intitule): self
        {
                $this->intitule = $intitule;

                return $this;
        }

        public function getNumero()
        {
                return $this->numero;
        }

        public function setNumero($numero): self
        {
                $this->numero = $numero;

                return $this;
        }

        public function getSolde()
        {
                return $this->solde;
        }

        public function setSolde($solde): self
        {
                $this->solde = $solde;

                return $this;
        }

        public function getSousCompte()
        {
                return $this->sous_compte;
        }

        public function setSousCompte($sous_compte): self
        {
                $this->sous_compte = $sous_compte;

                return $this;
        }

        public function getCompteTier()
        {
                return $this->compteTier;
        }

        public function setCompteTier($compteTier): self
        {
                $this->compteTier = $compteTier;

                return $this;
        }

        public function getAllCompteAsAssosiativeArray()
        {
            // $this->load->model('Dao');
                $this->Dao->getAll('compte');
        }

}

?>