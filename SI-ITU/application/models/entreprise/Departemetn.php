<?php
class Departement extends CI_Model{
    public $id;
    public $description;

    public function __construct($id= "",$description = "")
    {
        $this->id = $id;
        $this->description = $description;
    }

    public function getId(){
        return $this->id;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setDescription($description){
        $this->description = $description;
    }
}
?>