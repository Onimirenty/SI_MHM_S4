<?php

$id = $_GET['id'];
$query = $this->db->get_where('Facture', array('id' => $id));
$Employe = $query->row();
?>

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
       <form id="msform" method="POST" action="up/facture.php">
            <!-- fieldsets -->
            <fieldset><h2 class="fs-title">FACTURE DE LA SOCIETE</h2>
              <h3 class="fs-subtitle">  Facture </h3>
<p>liste deroulante contact<p>
<label for="metier">Numero de Facture: </label>
              <input value="<?php echo "$facture->NumFacture" ?>" type="text" name="NumFacture" />
<label for="metier">vendeur: </label>
              <input value="<?php echo "$facture->vendeur" ?>" type="text" name="vendeur" />
           <label for="nombre">acheteur: </label>
            <input value="<?php echo "$facture->acheteur" ?>"type="text" name="acheteur" />
              
<label for="metier">ModePayement: </label>
     <input value="<?php echo "$facture->ModePayement" ?>" type="text" name="ModePayement" />
           
<label for="prix">prix: </label>
              <input value="<?php echo "$facture->prix" ?>" type="number" name="prix" />
           <label for="nombre">nombre: </label>
              <input value="<?php echo "$facture->nombre" ?>"type="number" name="nombre" />
    
           <label for="nombre">Date de Facture: </label>
              <input value="<?php echo "$facture->dateFacture" ?>"type="date" name="dateFacture" />
                



<input value="<?php echo "$facture->idContact" ?>" type="hidden"  name="idContact" />
      

                <input value="<?php echo "$facture->id" ?>" type="hidden"  name="id" />
       <button class="submit action-button" target="_top">Submit</a>
            </fieldset>
          </form>
  </div>
</div>
    </section>
    <script src="<?php echo $burl ?>assets/js/script.js"></script>

</body>
</html>