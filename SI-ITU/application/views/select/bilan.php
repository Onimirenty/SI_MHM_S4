<?php
    $comptes = $this->db->get('v_Compte')->result();
    $this->load->helper('form');
        $date = $dates;
        $query = $this->db->get('identite_Entreprise');
        $id_E = $query->result();
        $dta = $this->Balance->getTransactions($dates) ;
 
 ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>BILAN</h2>
    </div>
    <div class="card-body">
      <?php echo $dates; ?>
      <?php echo form_open('select/Select/bilan'); ?>
          <input type="date" name="inputDate">
        <input type="submit" value="Valider">
      <?php echo form_close(); ?>
      <table class="table table-bordered">
        <tr>
          <th>numero compte</th>
          <th>intitule</th>
          <th>Actif/Passif</th>
        </tr>
        <?php foreach ($comptes as $compte): ?>
          <tr>
            <td><?php echo $compte->numeroCompte   ; ?></td>
            <td><?php echo $compte->intitule       ; ?></td>
            <td><?php echo $compte->position       ; ?></td>
          </tr>
        <?php endforeach;?>
      </table>
      <h2>Total Actif : <?php echo $actif ?> </h2>
      <h2>Total Passif : <?php echo $passif ?> </h2>
      <h2>Total Resultat : <?php echo $resultat ?> </h2>
      <h2>Resultat Bilan : <?php echo $bilan ?> </h2>
    </div>
  </div>
</div>
    </section>
    
    <script src="<?php echo $burl ?>assets/js/script.js"></script>


</body>
</html>