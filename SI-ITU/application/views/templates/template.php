<?php

    $header = "templates/header";
    if($categorie == "F")
    {
        $header = "templates/headerF";
    }
    if($categorie == "S")
    {
        $header = "templates/headerS";
    }
    if($categorie == "U")
    {
        $header = "templates/headerU";
    }
    if($categorie == "D")
    {
        $header = "templates/headerD";
    }
    if($categorie == "E")
    {
        $header = "templates/headerE";
    }
  
    $this->load->view($header);	
    $this->load->view($content);
    $this->load->view("templates/footer");
?>