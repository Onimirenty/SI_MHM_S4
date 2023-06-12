<?php

$id = $_GET['id'];
$query = $this->db->get_where('Employe', array('id' => $id));
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
         <form id="msform" action="<?php echo site_url('up/Update/employe')?>" method="POST"><!-- progressbar -->
          <!-- fieldsets -->
            <fieldset><h2 class="fs-title">INFO EMPLOYE</h2>
<label for="Nom">Nom: </label>
              <input value="<?php echo "$Employe->nom" ?>" type="text" name="nom" />
<label for="prenom">prenom: </label>
              <input value="<?php echo "$Employe->prenom" ?>" type="text" name="prenom" />
           <p>date de Naissance </p>
              <input value="<?php echo "$Employe->dateNaissance" ?>" type="date" name="dateNaissance" />
<label for="metier">metier: </label>
              <input value="<?php echo "$Employe->metier" ?>"type="text" name="metier" />
<label for="salaire">salaire: </label>
              <input value="<?php echo "$Employe->salaire" ?>"type="number" name="salaire" />
       <label for="salaire">Pouvoir Executif: </label>
              <input value="<?php echo "$Employe->pouvoirExecutif" ?>"type="text" name="pouvoirExecutif" />
      

            <input value="<?php echo "$Employe->id" ?>" type="hidden"  name="id" />
            <!-- Sroll bar here -->
                  <input value="<?php echo "$Employe->idDepartement" ?>" type="hidden"  name="idDepartement"value="<?php echo "$Employe->idDepartement" ?>" />
                    <input value="<?php echo "$Employe->idSociete" ?>" type="hidden"  name="idSociete"value="<?php echo "$Employe->idSociete" ?>" />
       <button class="submit action-button" target="_top">Submit</a>
            </fieldset>
          </form>
  </div>
</div>
    </section>

    <script src="<?php echo $burl ?>assets/js/script.js"></script>

</body>
</html>