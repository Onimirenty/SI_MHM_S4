<?php 

$JournalJ = $this->db->get('journalbanque')->result();
$devise = $this->db->get('Devise')->result();

    $burl= site_url();
    include 'journalT.php';

?>

      
      <table align="center" style="
    background-color: silver;
 
    width: 85%;
    margin-top: 2%;
">


  <!-- Ligne 1 --------------------------------------->
  <form  action="<?php echo site_url('insert/Insert/journalbanque')?>" method="POST"><!-- progressbar -->
       
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
