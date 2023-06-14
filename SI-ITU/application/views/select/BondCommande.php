<?php 

$JournalJ = $this->db->get('journalventes')->result();
$devise = $this->db->get('Devise')->result();

    $burl= site_url();
  
?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Bond de Commande</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
  
        <th>  N° Facture </th>
  <th>Reference Société</th>
  <th> Référence Client</th>
 <th> Date </th>
  <th> Designation </th>
  <th> Unité</th>
  <th> Prix Unitaire</th>
 <th> Quantité </th>
  <th> Taxe Tout Compris </th>
  <th> Reference Bond Commande </th>

</tr>      </tr>
        <tr>
        <th>  N° Facture </th>
  <th>Reference Société</th>
  <th> Référence Client</th>
 <th> Date </th>
  <th> Designation </th>
  <th> Unité</th>
  <th> Prix Unitaire</th>
 <th> Quantité </th>
  <th> Taxe Tout Compris </th>
  <th> Reference Bond Commande </th>
</tr>

        <!--         
        <?php foreach($employe as $employes): ?>
          <tr>
            <td><?php echo $employes->nom; ?></td>
            <td><?php echo $employes->prenom; ?></td>
            <td><?php echo $employes->dateNaissance; ?></td>
            <td><?php echo $employes->metier; ?></td>
            <td><?php echo $employes->salaire; ?></td>
            <td><?php echo $employes->pouvoirExecutif; ?></td>
          </tr>
        <?php endforeach; ?> -->
      </table>
    </div>
  </div>
</div>







			
			<div class="div_saut_ligne" style="height:30px;">
			</div>				
			<div style="float:left;width:10%;height:40px;"></div>
			
			<div class="div_saut_ligne" style="height:30px;">
			</div>
			
			<div style="float:left;width:10%;height:350px;"></div>
			<div style="float:left;width:80%;height:350px;text-align:center;">
			<form id="formulaire" name="formulaire" method="post" action="rep_facture.php">
				<div class="titre_h1" style="height:63%;margin-top: -6%;">
					<div style="width:10%;height:50px;float:left;"></div>
					<div style="width:35%;height:50px;float:left;font-size:20px;font-weight:bold;text-align:left;color:#a13638;">
						<u>Signature</u><br />
					</div>
					<div style="width:10%;height:50px;float:left;"></div>
					<div style="width:10%;height:50px;float:left;"></div>

					<div style="width:10%;height:75px;float:left;"></div>
					<div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
					<br />
						
					</div>
					<div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
						<br />
						</div>
					<div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
					Client  <br />
					<p>signer</p>			
				</div>
				
										<div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
						<br />
						</div>

						<div style="width:15%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;">
						<br />
						</div>
						<div style="width:25%;height:75px;float:left;font-size:16px;font-weight:bold;text-align:left;
    margin-left: -22%;">
						Cache vendeur :<br />
						<p>cache</p>
			
					</div>					
					<div style="width:10%;height:75px;float:left;"></div>
					</div>		
					<div style="width:10%;height:75px;float:left;"></div>				

				</div>
			</div>









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
