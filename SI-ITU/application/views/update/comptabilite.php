<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$id = $_GET['id'];
$this->db->where('id', $id);
$infoComptabilite = $this->db->get('infoComptabilite')->row();

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
       <form id="msform" action="<?php echo site_url('up/Update/infoComptabilite')?>" method="POST"><!-- progressbar -->
         
            <!-- fieldsets -->
            <fieldset><h2 class="fs-title">MODIFIER COMPTABILTE</h2>
           <input value="<?php echo "$infoComptabilite->capitale" ?>"type="number" name="capitale" />

<label for="NSTAT">NSTAT: </label>
              <input value="<?php echo "$infoComptabilite->NSTAT" ?>"type="text" name="NSTAT" />
              
<label for="NIF">NIF: </label>
              <input value="<?php echo "$infoComptabilite->NIF" ?>"type="text" name="NIF" />
              
<label for="NRCS">NRCS: </label>
              <input value="<?php echo "$infoComptabilite->NRCS" ?>"type="text" name="NRCS" />
      

            <input value="<?php echo "$infoComptabilite->id" ?>" type="hidden"  name="id" />
            <!-- Sroll bar here -->
                   <input  type="hidden"  name="idSociete"value="<?php echo "$infoComptabilite->idSociete" ?>" />
             <input value="<?php echo "$infoComptabilite->idDevise" ?>" type="hidden"  name="idDevise"value="<?php echo "$infoComptabilite->idDevise" ?>" />
       
       <button class="submit action-button" target="_top">Submit</a>
            </fieldset>
          </form>
  </div>
</div>
    </section>
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