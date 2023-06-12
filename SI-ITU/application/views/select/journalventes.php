<?php 

$JournalJ = $this->db->get('journalventes')->result();
$devise = $this->db->get('Devise')->result();

    $burl= site_url();
?>


<style>
  @charset "utf-8";

/* CSS Document */

.quote {
  margin: 40px;
  margin-left: 800px;
}

.QuoteModal {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  transition: opacity 300ms;
  visibility: hidden;
  opacity: 0;
}

.QuoteModal:target {
  visibility: visible;
  opacity: 1;
}

.popup_modal {
   
    position: relative;
    margin: 242px;
    margin-left: 0%;
    padding: 20px;
    box-sizing: border-box;
    width: 100%;
    background-color: #1e90ffdb;
}

.popup_modal .fclose {
  position: absolute;
  top: 20px;
  right: 30px;
  font-size: 20px;
  color: black;
}

</style>
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


            </style><div class="huhu" style="
    position: relative;
    left: -21%;
    width:1%;
">
    <a class="quote btn btn-lg btn-warning" href="#quote_modal" title="" style="
    position: relative;
    top: -73%;
    right: 48%;
">ECRITURE</a>
  </div>

<div id="quote_modal" class="QuoteModal">
    <div class="popup_modal">
      <div>
        <a href="#close" title="Close" class="fclose">X</a>
        <h3>Ecriture Journal</h3>
      </div>
      <div>
      
      <table align="center" style="
    background-color: silver;
 
    width: 85%;
    margin-top: 2%;
">

  <!-- Ligne 1 --------------------------------------->
  <form  action="<?php echo site_url('insert/Insert/journalventes')?>" method="POST"><!-- progressbar -->
       
  <tbody>  
    
    <tr style="
    background-color: silver;   
">
    <td> <input type="number"  name="Jour" placeholder="Jour"> </td>
    <td> <input type="text" size="10"name="NoPiece" placeholder="N°Piece"> </td>
    <td align="center" width="20" colspan="3" > <input type="text" size="10"name="ReferencePiece"placeholder="ReferencePiece">
    </td>
    <td> <input type="text" size="10" name="NoCompteGenerale"placeholder="N°CompteGenerale"> </td>
    <td> <input type="text" size="10" name="CompteAuxiliaire"placeholder="CompteAuxiliaire"> </td>
    <td align="center" width="20" colspan="3"> <input type="text" size="10"placeholder="Libelle" name="LibelleEcriture">
    </td><td> <input type="date" size="10" name="DateEcheance"placeholder="Date"> </td>
<td>
      <select id="options" name="Devise">
             <?php foreach ($devise as $devises): ?>
             <option value="<?php echo $devises->nomDevise; ?>"><?php echo $devises->nomDevise; ?></option>
        <?php endforeach;?>

     </td>
<td> <input type="text" size="10" name="Taux"placeholder="Taux"> </td>
     <td> <input type="text" size="10"name="Debits"placeholder="Debits"> </td>
     <td> <input type="text" size="10"name="Credits"placeholder="Credits"> </td>

   
  </tr>
  
   


           </table>   
             <div>
 <a></a>   <input type="submit" value="Valider" class="btn btn-warning">
    </form>
   
</div>
      </div>
     
    </div>
  </div>
  <table align="center" style="
    background-color: silver;
    margin-left: 3%;
    width: 85%;
    margin-top: 2%;
">


  <!-- Ligne 1 --------------------------------------->
  <tbody>  

<!--- Ligne 2 ---------------------------------------->
  <tr style="bgcolor=;/* background-color: transparent; */color: #ffffff;background: #324960;/* color: white; */">
  <td style="
  width: 7%;
"> Jour </td>
  <td style="
  width: 7%;
"> N° Piece </td>
  <td align="center" width="20" colspan="3" style="
  width: 16%;
"> Référence Piece</td>
 <td style="
  width: 11%;
"> N°Compte Generale </td>
  <td style="
  width: 11%;
"> Compte Auxiliaire </td>
  <td align="center" width="20" colspan="3" style="
  width: 11%;
"> Libéllé écriture</td>

  <td style="
  width: 10%;
"> Echéance</td>
 <td> Devise </td>
  <td> Taux </td>
  <td> Débits </td>
 <td> Crédits </td>

</tr>


  <?php foreach($JournalJ as $JournalJs): ?>
 
 <tr style="
   background-color: white;
">              
   <td> <?php echo $JournalJs->Jour; ?> </td>
   <td><?php echo $JournalJs->NoPiece; ?>  </td>
   <td align="center" width="20" colspan="3"> <?php echo $JournalJs->ReferencePiece; ?> </td>
  <td><?php echo $JournalJs->NoCompteGenerale; ?>  </td>
   <td> <?php echo $JournalJs->CompteAuxiliaire; ?>  </td>
   <td align="center" width="20" colspan="3"><?php echo $JournalJs->LibelleEcriture; ?> </td>
  
   <td><?php echo $JournalJs->DateEcheance; ?> </td>
  <td><?php echo $JournalJs->Devise; ?>  </td>
   <td> <?php echo $JournalJs->Taux; ?> </td>
   <td> <?php echo $JournalJs->Debits; ?>  </td>
  <td><?php echo $JournalJs->Credits; ?> </td>
 
 </tr>

  <?php endforeach; ?>
</tbody></table>

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


</body></html>
