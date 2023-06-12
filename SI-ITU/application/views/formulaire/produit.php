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

    <title>Dashboard Sidebar Menu</title> 
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

            <i class="bx bx-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class="bx bx-search icon"></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="<?php echo site_url('welcome') ?>">
                            <i class="bx bx-bar-chart-alt-2 icon"></i>
                            <span class="text nav-text">Comptabilite</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="<?php echo site_url('select/Select/entreprise') ?>">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Identite Entreprise</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="<?php echo site_url('select/Select/employer') ?>">
                            <i class="bx bx-user icon"></i>
                            <span class="text nav-text">Employe</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="<?php echo site_url('select/Select/contact') ?>">
                            <i class="bx bx-phone icon"></i>
                            <span class="text nav-text">Contact</span>
                        </a>
                    </li>

                 

                    <li class="nav-link">
                        <a href="<?php echo site_url('select/Select/Produit') ?>">
                            <i class="bx bx-wallet icon"></i>
                            <span class="text nav-text">Produits</span>
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
<section class="home">


        <div class="row">
            <div class="col-md-12">

                <a href="#">
                <div class="col-sm-6">
                    <div class="textdiv" style="margin-left: -63%;">
                        <img src="<?php echo $burl ?>assets/img/images/societe.png" style="width: 45%;">
                        <p>Societe</p>
                    </div>
                </div>
            </a>

                <a href="#">
                <div class="col-sm-6">
                    <div class="textdiv" style="
">
                        <img src="<?php echo $burl ?>assets/img/images/bilan.png" style="width: 45%;">
                        <p>Bilan</p>
                    </div>
                </div>
            </a>
        <a href="#">
                <div class="col-sm-6">
                    <div class="btndiv">
                        <div class="textdiv" style="
                        margin-left: 84%;
                    ">
                                                <img src="<?php echo $burl ?>assets/img/images/resultat.png" style="width: 45%;">
                                            <p>Comptes</p>
                                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="col-sm-6">
                    <div class="textdiv" style="
                    margin-left: 171%;
                    width: 141%;
                ">
                                            <img src="<?php echo $burl ?>assets/img/images/balance.png" style="width: 45%;">
                                        <p>Balance</p>
                                      </div>
                </div>
            </a>
            <a href="<?php echo site_url('select/Select/journal') ?>">
                <div class="col-sm-6">
                    <div class="btndiv">
                        <div class="textdiv" style="
                        margin-left: 244%;
                    ">
                                                <img src="<?php echo $burl ?>assets/img/images/journal.png" style="width: 45%;">
                                            <p>Journal</p>
                                        </div>
                    </div>
                </div>
            </a>


            </div>

        </div>


        
        <div class="row">
            <div class="col-md-12">

            <a href="<?php echo site_url('select/Select/produit') ?>">
                         <div class="col-sm-6">
                    <div class="textdiv" style="
    background-color: #c7dbff00;
">
                        <img src="<?php echo $burl ?>/assets/img/images/retour.png" style="width: 45%;">
                        <p>Retour</p>
                    </div>
                </div>
            </a>    
</div>
</div>
        
        

        <style>
            body {
                font-family: montserrat, arial, verdana;
            }
            /*form styles*/
       
                #msform {
                width: 690px;
                margin: 50px auto;
                text-align: center;
                position: relative;
                }
              
                #msform fieldset {
                background: white;
                border: 0 none;
                border-radius: 3px;
                box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
                padding: 20px 30px;
                box-sizing: border-box;
                width: 80%;
                margin: 0 10%;
                
                /*stacking fieldsets above each other*/
                position: relative;
            }
            /*Hide all except first fieldset*/
            #msform fieldset:not(:first-of-type) {
                display: none;
            }
            /*inputs*/
            #msform input, #msform textarea {
                padding: 15px;
                border: 1px solid #ccc;
                border-radius: 3px;
                margin-bottom: 10px;
                width: 100%;
                box-sizing: border-box;
                font-family: montserrat;
                color: #2C3E50;
                font-size: 18px;
            }
            /*buttons*/
            #msform .action-button {
                width: 100px;
                background: #27AE60;
                font-weight: bold;
                color: white;
                border: 0 none;
                border-radius: 1px;
                cursor: pointer;
                padding: 10px;
                margin: 10px 5px;
              text-decoration: none;
              font-size: 18px;
            }
            #msform .action-button:hover, #msform .action-button:focus {
                box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
            }
            /*headings*/
            .fs-title {
                font-size: 15px;
                text-transform: uppercase;
                color: #2C3E50;
                margin-bottom: 10px;
            }
            .fs-subtitle {
                font-weight: normal;
                font-size: 27px;
                color: #666;
                margin-bottom: 20px;
            }
            /*progressbar*/
            #progressbar {
                margin-bottom: 30px;
                overflow: hidden;
                /*CSS counters to number the steps*/
                counter-reset: step;
            }
            #progressbar li {
            list-style-type: none;
            color: black;
            text-transform: uppercase;
            font-size: larger;
            width: 33.33%;
            float: left;
            position: relative;
        }
            #progressbar li:before {
                content: counter(step);
                counter-increment: step;
                width: 20px;
                line-height: 20px;
                display: block;
                font-size: 10px;
                color: #333;
                background: white;
                border-radius: 3px;
                margin: 0 auto 5px auto;
            }
            
            /*progressbar connectors*/
            #progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: white;
                position: absolute;
                left: -50%;
                top: 9px;
                z-index: -1; /*put it behind the numbers*/
            }
            #progressbar li:first-child:after {
                /*connector not needed before the first step*/
                content: none; 
            }
            /*marking active/completed steps green*/
            /*The number of the step and the connector before it = green*/
            #progressbar li.active:before,  #progressbar li.active:after{
                background: #27AE60;
                color: white;
            }
            label {
                margin-right: 85%;
                display: inline-block;
                margin-bottom: 0.5rem;
            }
            
            
            </style>
        
        <!-- multistep form -->
        <form id="msform" action="<?php echo site_url('insert/Insert/produit')?>" method="POST"><!-- progressbar -->
           <!-- fieldsets -->
            <fieldset><h2 class="fs-title">STOCK DE LA SOCIETE</h2>
              <h3 class="fs-subtitle">Insertion Stock</h3>
<p>liste deroulante societe<p>
<label for="Produit">Produit: </label>
              <input type="text" name="nomproduit" />

<label for="Prix">Prix: </label>
              <input type="number" name="prix" />
		   <label for="nombre">nombre: </label>
              <input type="number" name="nombre" />
              
          <button type="submit"  class="submit action-button" target="_top">Submit</button>

            </fieldset>
          </form>
  <script>
        // Get all fieldsets
        var fieldsets = document.querySelectorAll("#msform fieldset");
        
        // Get all buttons with class "next" and "previous"
        var nextButtons = document.querySelectorAll(".next");
        var prevButtons = document.querySelectorAll(".previous");
        
        // Initialize a counter for the current fieldset
        var currentFieldset = 0;
        
        // Add click event listeners to "Next" buttons
        for (var i = 0; i < nextButtons.length; i++) {
          nextButtons[i].addEventListener("click", function() {
            // Hide the current fieldset
            fieldsets[currentFieldset].style.display = "none";
            // Increment the current fieldset counter
            currentFieldset++;
            // Show the next fieldset
            if (currentFieldset < fieldsets.length) {
              fieldsets[currentFieldset].style.display = "block";
              // Update the progress bar
              updateProgressBar(currentFieldset);
            }
            // If the current fieldset is the last one, change the "Next" button to "Submit"
            if (currentFieldset == fieldsets.length - 1) {
              nextButtons[currentFieldset].value = "Submit";
            }
          });
        }
        
        // Add click event listeners to "Previous" buttons
        for (var i = 0; i < prevButtons.length; i++) {
          prevButtons[i].addEventListener("click", function() {
            // Hide the current fieldset
            fieldsets[currentFieldset].style.display = "none";
            // Decrement the current fieldset counter
            currentFieldset--;
            // Show the previous fieldset
            if (currentFieldset >= 0) {
              fieldsets[currentFieldset].style.display = "block";
              // Update the progress bar
              updateProgressBar(currentFieldset);
            }
            // If the current fieldset is not the last one, change the "Submit" button back to "Next"
            if (currentFieldset < fieldsets.length - 1) {
              nextButtons[currentFieldset].value = "Next";
            }
          });
        }
        
        // Update the progress bar
        function updateProgressBar(currentFieldset) {
          var progressBar = document.getElementById("progressbar");
          var progressItems = progressBar.querySelectorAll("li");
          for (var i = 0; i < progressItems.length; i++) {
            // Mark the current fieldset as active
            if (i == currentFieldset) {
              progressItems[i].classList.add("active");
            } else {
              progressItems[i].classList.remove("active");
            }
          }
        }
        
        
        
        </script>
        
    </section>
    

    <script src="<?php echo $burl ?>assets/js/script.js"></script>

</body>
</html>
