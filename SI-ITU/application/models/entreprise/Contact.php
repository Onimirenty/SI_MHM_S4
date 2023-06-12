<?php
class Contact extends CI_Model
{
    private $id;
    private $idsociete;
    private $adresse;
    private $telephone;
    private $mail;
    private $siege;

    public function __construct($id = "", $idsociete = "", $adresse = "", $telephone = "", $mail = "", $siege = "")
    {
        $this->id = $id;
        $this->idsociete = $idsociete;
        $this->adresse = $adresse;
        $this->telephone = $telephone;
        $this->mail = $mail;
        $this->siege = $siege;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIdsociete()
    {
        return $this->idsociete;
    }

    public function setIdsociete($idsociete)
    {
        $this->idsociete = $idsociete;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    public function getSiege()
    {
        return $this->siege;
    }

    public function setSiege($siege)
    {
        $this->siege = $siege;
    }

    public function update($id = "", $idsociete = "", $adresse = "", $telephone = "", $mail = "", $siege = "")
    {
        $this->db->set('idSociete', $idsociete);
        $this->db->set('adresse', $adresse);
        $this->db->set('telephone', $telephone);
        $this->db->set('mail', $mail);
        $this->db->set('siege', $siege);
        $this->db->where('id', $id);
        $this->db->update('contact');
    }
}
