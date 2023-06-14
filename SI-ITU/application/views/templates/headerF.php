<?php 
    $burl= site_url();
?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="<?php echo $burl ?>/assets/css/style.css">

    <!----===== Boxicons CSS ===== -->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $burl ?>/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $burl ?>/assets/css/left.css">
    <link rel="stylesheet" href="<?php echo $burl ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $burl ?>/assets/fontawesome-5/css/all.min.css">
   
   <title>SI</title> 
</head>
<body>
   <nav class="sidebar close">
       <header>
           <div class="image-text">
               <span class="image">
                   <img src="<?php echo $burl ?>/assets/img/images/logo.png" alt="">
               </span>

               <div class="text logo-text">
                   <span class="name">HMM</span>
                   <span class="profession">Web developer</span>
               </div>
           </div>

           <i class="bx bx-chevron-right toggle"><i class="fas fa-chevron-right"></i></i>
       </header>

       <div class="menu-bar">
           <div class="menu">

               <li class="search-box">
                   <i class="bx bx-search icon"><i class="fas fa-search"></i></i>
                   <input type="text" placeholder="Search...">
               </li>

               <ul class="menu-links">
                   <li class="nav-link">
                       <a href="<?php echo site_url('welcome') ?>">
                           <i class="bx bx-bar-chart-alt-2 icon"><i class="fas  fa-hand-holding-usd"></i></i>
                           <span class="text nav-text">Comptabilite</span>
                       </a>
                   </li>

                   <li class="nav-link">
                       <a href="<?php echo site_url('select/Select/entreprise') ?>">
                           <i class="bx bx-home-alt icon"><i class="fas fa-home"></i></i>
                           <span class="text nav-text">Identité Entreprise</span>
                       </a>
                   </li>

                   <li class="nav-link">
                       <a href="<?php echo site_url('select/Select/employer') ?>">
                           <i class="bx bx-user icon"><i class="fas fa-users"></i></i>
                           <span class="text nav-text">Employe</span>
                       </a>
                   </li>

                   <li class="nav-link">
                       <a href="<?php echo site_url('select/Select/contact') ?>">
                           <i class="bx bx-phone icon"><i class="fas fa-phone"></i></i>
                           <span class="text nav-text">Contact</span>
                       </a>
                   </li>

                   <li class="nav-link">
                       <a href="<?php echo site_url('select/Select/Produit') ?>">
                           <i class="bx bx-wallet icon"><i class="fas fa-tag"></i></i>
                           <span class="text nav-text">Produits</span>
                       </a>
                   </li>
                   
                   <li class="nav-link">
                       <a href="<?php echo site_url('select/Select/centre') ?>">
                           <i class="bx bx-wallet icon"><i class="fas fa-file-invoice"></i></i>
                           <span class="text nav-text">charge/p/centre</span>
                       </a>
                   </li>

                   <li class="nav-link">
                       <a href="<?php echo site_url('select/Select/chargeProduit') ?>">
                           <i class="bx bx-wallet icon"><i class="fas fa-file-invoice-dollar"></i></i>
                           <span class="text nav-text">charge/produit </span>
                       </a>
                   </li>
                
                   <li class="nav-link">
                       <a href="<?php echo site_url('select/Select/seuilRentabilite') ?>">
                           <i class="bx bx-wallet icon"><i class="fas fa-chart-line"></i></i>
                           <span class="text nav-text">seuil Rentabilité</span>
                       </a>
                   </li>
                   <li class="nav-link">
                       <a href="<?php echo site_url('select/Select/diagrame') ?>">
                           <i class="bx bx-wallet icon"><i class="fas fa-chart-pie"></i></i>
                           <span class="text nav-text">Diagrame 1</span>
                       </a>
                   </li>
                   <li class="nav-link">
                       <a href="<?php echo site_url('select/Select/diagrame2') ?>">
                           <i class="bx bx-wallet icon"><i class="fas fa-chart-pie"></i></i>
                           <span class="text nav-text">Diagramme 2</span>
                       </a>
                   </li>



               </ul>
           </div>
                   <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class="bx bx-log-out icon"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>

        </div>

    </nav>

     
<div class="row">
            <div class="col-md-12">
                    <div class="col-sm-6">
                        <div class="textdiv" style="margin-left: -63%;">
                        <a href="<?php echo site_url('select/Select/entreprise') ?>">
               
                        <img src="<?php echo $burl ?>assets/img/images/societe.png" style="width: 55%;">
           
                        <p>Societe</p>
                        </a>
           
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="textdiv" style="margin-left: 4%;">
                        <a href="<?php echo site_url('select/Select/compte') ?>">
           
                        <img src="<?php echo $burl ?>assets/img/images/resultat.png" style="width: 55%;">
                            <p>Comptes</p>
                            </a>
           
                        </div>
                    </div>
                
                    <div class="col-sm-6"style="margin-left: 5%;">
                        <div class="textdiv">
                        <a href="<?php echo site_url('select/Select/balance') ?>">
           
                        <img src="<?php echo $burl ?>assets/img/images/balance.png" style="width: 51%;">
                            <p>Balance</p>
                            </a>
           
                        </div>
                    </div>
                    <div class="col-sm-6"style="margin-left: 4%;">
                    <a href="<?php echo site_url('select/Select/journal') ?>">
               
                    <div class="textdiv" >
                       
                        <img src="<?php echo $burl ?>assets/img/images/journal.png" style="width: 55%;">
                            <p>Journal</p>
                            
                    </a>

                        </div>
                    </div>
                    <div class="col-sm-6"style="margin-left: 4%;">
                    <div class="textdiv">
                    <a href="<?php echo site_url('select/Select/bilan') ?>">
                        
                    <img src="<?php echo $burl ?>assets/img/images/bilan.png" style="width: 55%;">
                            <p>Bilan</p>
                            </a>

                        </div>
                    </div>
            
        </div>
    </div>

    <div class="row">
       
               <div class="col-md-12">
            <a href="<?php echo site_url('Formulaire/Formulaire/infoComptabilite') ?>"> <div class="col-sm-6">
                <div class="textdiv" style="background-color: #c7dbff00;">
                        <p style="background: yellow;color: black;border-radius: 6%;">Ajouter</p>
                    </div>
                </div>
            </a>    
        </div>
</div>