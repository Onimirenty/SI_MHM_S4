<?php

    $header = "templates/header";
    if($categorie == "F")
    {
        //header pour les formulaire
        $header = "templates/headerF";
    }
    if($categorie == "S")
    {
        //header pour les select(visualisation de donnee)
        $header = "templates/headerS";
    }
    if($categorie == "U")
    {
        //header pour les update
        $header = "templates/headerU";
    }
    if($categorie == "D")
    {
        //header pour les suppression
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