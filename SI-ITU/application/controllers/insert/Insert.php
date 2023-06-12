<?php
/* 
    *    @author:    mirenty 1890,mickael 1819,Hasina 1762
    *     S'il vous plait veuillez lire readMe.md
    *
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Insert extends CI_Controller
{
    public function infoComptabilite()
    {

        $idSociete = $this->input->post('idSociete');
        $capitale = $this->input->post('capitale');
        $NIF = $this->input->post('NIF');
        $NSTAT = $this->input->post('NSTAT');
        $NRCS = $this->input->post('NRCS');
        $idDevise = $this->input->post('idDevise');
        $scanNIF = $this->input->post('scanNIF');
        $scanNSTAT = $this->input->post('scanNSTAT');
        $scanNRCS = $this->input->post('scanNRCS');

      $data1 = array(
            'idSociete' => $idSociete,
            'capitale' => $capitale,
            'NIF' => $NIF,
            'NSTAT' => $NSTAT,
            'NRCS' => $NRCS,
            'idDevise' => $idDevise,
        );
        $redirection=$this->db->insert('infocomptabilite',$data1);
       
        $data2 = array(
            'scanNIF' => $scanNIF,
            'scanNSTAT' => $scanNSTAT,
            'scanNRCS' => $scanNRCS,
        );
        $redirection2=$this->db->insert('scan',$data2);
        
        if($redirection && $redirection2)
        {
            $this->load->view('select/infoComptabilite');
        }
        else
        {
            $this->load->view('insertErreur');
        }
    }
    public function produit()
    {
        $nomproduit = $this->input->post('nomproduit');
        $prix = $this->input->post('prix');
        $nombre = $this->input->post('nombre');

        $data = array(
            'nomProduit' => $nomproduit,
            'PrixUnitaire' => $prix,
            'nombre' => $nombre,
        );
        $redirection=$this->db->insert('Produit',$data);
        
        if($redirection)
        {
            $this->load->view('select/produit');
        }
        else
        {
            $this->load->view('insertErreur');
        }
    }

    public function journalachats()
    {
        $Jour = $this->input->post('Jour');
        $NoPiece = $this->input->post('NoPiece');
        $ReferencePiece = $this->input->post('ReferencePiece');
        $NoCompteGenerale = $this->input->post('NoCompteGenerale');
        $CompteAuxiliaire = $this->input->post('CompteAuxiliaire');
        $LibelleEcriture = $this->input->post('LibelleEcriture');
        $DateEcheance = $this->input->post('DateEcheance');
        $Devise = $this->input->post('Devise');
        $Taux = $this->input->post('Taux');
        $Debits = $this->input->post('Debits');
        $Credits = $this->input->post('Credits');

        $data = array(
            'Jour' => $Jour,
            'NoPiece' => $NoPiece,
            'ReferencePiece' => $ReferencePiece,
            'NoCompteGenerale' => $NoCompteGenerale,
            'CompteAuxiliaire' => $CompteAuxiliaire,
            'LibelleEcriture' => $LibelleEcriture,
            'DateEcheance' => $DateEcheance,
            'Devise' => $Devise,
            'Taux' => $Taux,
            'Debits' => $Debits,
            'Credits' => $Credits,
        );
        $redirection=$this->db->insert('journalachats',$data);
        
        if($redirection)
        {
            $data['categorie']="U";
            $data['content'] = "select/journalachats";
            $this->load->view('templates/template',$data);
            
            }
        else
        {
            $this->load->view('insertErreur');
        }
    }


    public function journalcaisse()
    {
        $Jour = $this->input->post('Jour');
        $NoPiece = $this->input->post('NoPiece');
        $ReferencePiece = $this->input->post('ReferencePiece');
        $NoCompteGenerale = $this->input->post('NoCompteGenerale');
        $CompteAuxiliaire = $this->input->post('CompteAuxiliaire');
        $LibelleEcriture = $this->input->post('LibelleEcriture');
        $DateEcheance = $this->input->post('DateEcheance');
        $Devise = $this->input->post('Devise');
        $Taux = $this->input->post('Taux');
        $Debits = $this->input->post('Debits');
        $Credits = $this->input->post('Credits');

        $data = array(
            'Jour' => $Jour,
            'NoPiece' => $NoPiece,
            'ReferencePiece' => $ReferencePiece,
            'NoCompteGenerale' => $NoCompteGenerale,
            'CompteAuxiliaire' => $CompteAuxiliaire,
            'LibelleEcriture' => $LibelleEcriture,
            'DateEcheance' => $DateEcheance,
            'Devise' => $Devise,
            'Taux' => $Taux,
            'Debits' => $Debits,
            'Credits' => $Credits,
        );
        $redirection=$this->db->insert('journalcaisse',$data);
        
        if($redirection)
        {
            $data['categorie']="U";
        $data['content'] = "select/journalcaisse";
		$this->load->view('templates/template',$data);
        
           }
        else
        {
            $this->load->view('insertErreur');
        }
    }

    
    public function journalbanque()
    {
        $Jour = $this->input->post('Jour');
        $NoPiece = $this->input->post('NoPiece');
        $ReferencePiece = $this->input->post('ReferencePiece');
        $NoCompteGenerale = $this->input->post('NoCompteGenerale');
        $CompteAuxiliaire = $this->input->post('CompteAuxiliaire');
        $LibelleEcriture = $this->input->post('LibelleEcriture');
        $DateEcheance = $this->input->post('DateEcheance');
        $Devise = $this->input->post('Devise');
        $Taux = $this->input->post('Taux');
        $Debits = $this->input->post('Debits');
        $Credits = $this->input->post('Credits');

        $data = array(
            'Jour' => $Jour,
            'NoPiece' => $NoPiece,
            'ReferencePiece' => $ReferencePiece,
            'NoCompteGenerale' => $NoCompteGenerale,
            'CompteAuxiliaire' => $CompteAuxiliaire,
            'LibelleEcriture' => $LibelleEcriture,
            'DateEcheance' => $DateEcheance,
            'Devise' => $Devise,
            'Taux' => $Taux,
            'Debits' => $Debits,
            'Credits' => $Credits,
        );
        $redirection=$this->db->insert('journalbanque',$data);
        
        if($redirection)
        {
            $data['categorie']="U";
            $data['content'] = "select/journalbanque";
            $this->load->view('templates/template',$data);
            
            }
        else
        {
            $this->load->view('insertErreur');
        }
    }

    
    public function journalventes()
    {
        $Jour = $this->input->post('Jour');
        $NoPiece = $this->input->post('NoPiece');
        $ReferencePiece = $this->input->post('ReferencePiece');
        $NoCompteGenerale = $this->input->post('NoCompteGenerale');
        $CompteAuxiliaire = $this->input->post('CompteAuxiliaire');
        $LibelleEcriture = $this->input->post('LibelleEcriture');
        $DateEcheance = $this->input->post('DateEcheance');
        $Devise = $this->input->post('Devise');
        $Taux = $this->input->post('Taux');
        $Debits = $this->input->post('Debits');
        $Credits = $this->input->post('Credits');

        $data = array(
            'Jour' => $Jour,
            'NoPiece' => $NoPiece,
            'ReferencePiece' => $ReferencePiece,
            'NoCompteGenerale' => $NoCompteGenerale,
            'CompteAuxiliaire' => $CompteAuxiliaire,
            'LibelleEcriture' => $LibelleEcriture,
            'DateEcheance' => $DateEcheance,
            'Devise' => $Devise,
            'Taux' => $Taux,
            'Debits' => $Debits,
            'Credits' => $Credits,
        );
        $redirection=$this->db->insert('journalventes',$data);
        
        if($redirection)
        {
            $data['categorie']="U";
        $data['content'] = "select/journalventes";
		$this->load->view('templates/template',$data);
        
         }
        else
        {
            $this->load->view('insertErreur');
        }
    }
    
    
    public function journalanouveau()
    {
        $Jour = $this->input->post('Jour');
        $NoPiece = $this->input->post('NoPiece');
        $ReferencePiece = $this->input->post('ReferencePiece');
        $NoCompteGenerale = $this->input->post('NoCompteGenerale');
        $CompteAuxiliaire = $this->input->post('CompteAuxiliaire');
        $LibelleEcriture = $this->input->post('LibelleEcriture');
        $DateEcheance = $this->input->post('DateEcheance');
        $Devise = $this->input->post('Devise');
        $Taux = $this->input->post('Taux');
        $Debits = $this->input->post('Debits');
        $Credits = $this->input->post('Credits');
        
        $data = array(
            'Jour' => $Jour,
            'NoPiece' => $NoPiece,
            'ReferencePiece' => $ReferencePiece,
            'NoCompteGenerale' => $NoCompteGenerale,
            'CompteAuxiliaire' => $CompteAuxiliaire,
            'LibelleEcriture' => $LibelleEcriture,
            'DateEcheance' => $DateEcheance,
            'Devise' => $Devise,
            'Taux' => $Taux,
            'Debits' => $Debits,
            'Credits' => $Credits,
        );
        $redirection=$this->db->insert('journalanouveau',$data);
        
        if($redirection)
        {
            $data['categorie']="U";
            $data['content'] = "select/journalanouveau";
            $this->load->view('templates/template',$data);
            
            }
        else
        {
            $this->load->view('insertErreur');
        }
    }
    
    public function stock()
    {
        $nomproduit = $this->input->post('nomStocke');
        $prix = $this->input->post('prix');
        $nombre = $this->input->post('nombre');
        
        $data = array(
            'nomstocke' => $nomproduit,
            'Prix' => $prix,
            'nombre' => $nombre,
        );
        $redirection=$this->db->insert('stocke',$data);
        
        if($redirection)
        {
            $this->load->view('select/stocke');
        }
        else
        {
            $this->load->view('insertErreur');
        }
    
    }
    public function facture()
    {
        $NumFacture = $this->input->post("NumFacture");
        $vendeur = $this->input->post("vendeur");
        $acheteur = $this->input->post("acheteur");
        $dateFacture = $this->input->post("dateFacture");
        $ModePayement = $this->input->post("ModePayement");
        $prix = $this->input->post("prix");
        $nombre = $this->input->post("nombre");
        $idContact = $this->input->post("idContact");
        
            $data = array(
                'NumFacture' => $NumFacture,
                'vendeur' => $vendeur,
                'acheteur' => $acheteur,
                'idContact' => $idContact,
                'ModePayement' => $ModePayement,
                'prix' => $prix,
                'nombre' => $nombre,
                'dateFacture' => $dateFacture
            );
        
            $redirection=$this->db->insert('facture',$data);
            if($redirection)
            {
                $this->load->view('select/facture');
            }
            else
            {
                $this->load->view('insertErreur');
            }
    }
    
    public function contact()
    {
        $idSociete = $this->input->post('idSociete');
        $adresse = $this->input->post('adresse');
        $telephone = $this->input->post('telephone');
        $mail = $this->input->post('mail');
        
        $data = array(
            'idSociete' => $idSociete,
            'adresse' => $adresse,
            'telephone' => $telephone,
            'mail' => $mail,
        );
        
        $redirection=$this->db->insert('Contact',$data);
        if($redirection)
        {
            $this->load->view('select/contact');
        }
        else
        {
            $this->load->view('insertErreur');
        }
    }
    
    public function Employe()
    {
        $nom = $this->input->post("nom");
        $prenom = $this->input->post("prenom");
        $dateNaissance = $this->input->post("dateNaissance");
        $metier = $this->input->post("metier");
        $salaire = $this->input->post("salaire");
        $pouvoirExecutif = $this->input->post("pouvoirExecutif");
        $idDepartement = $this->input->post("idDepartement");
        $idSociete = $this->input->post("idSociete");
        
        $data = array(
            'nom' => $nom,
            'prenom' => $prenom,
            'dateNaissance' => $dateNaissance,
            'idDepartement' => $idDepartement,
            'metier' => $metier,
            'salaire' => $salaire,
            'pouvoirExecutif' => $pouvoirExecutif,
            'idSociete' => $idSociete
        );
        
        $redirection=$this->db->insert('Employe',$data);
        
        if($redirection)
        {
            $this->load->view('select/employer');
        }
        else
        {
            $this->load->view('insertErreur');
        }
        
    }
    
    public function identite_Entreprise()
    {
        $logo = $this->input->post("logo");
        $nomSociete = $this->input->post("nomSociete");
        $ObjetSociete = $this->input->post("ObjetSociete");
        $dateCreation = $this->input->post("dateCreation");
        $LieuExercice = $this->input->post("LieuExercice");
        
        $data = array(
            'logo' => $logo,
            'nomSociete' => $nomSociete,
            'ObjetSociete' => $ObjetSociete,
            'dateCreation' => $dateCreation,
            'LieuExercice' => $LieuExercice
        );
        
        $this->db->insert('identite_Entreprise',$data);
        
        if ($this->db->affected_rows() > 0) 
           {
            $this->load->view('select/entreprise');
        } 
        else 
        {
            echo 'Impossible de traiter les données.';
            $this->load->view('insertErreur');
        }
        
    }
}