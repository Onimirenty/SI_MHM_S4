<?php
$facture = $this->db->get('Facture')->result();
?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>FACTURES</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>IDContact</th>
          <th>NumFacture</th>
          <th>vendeur</th>
          <th>acheteur</th>
          <th>ModePayement</th>
          <th>prix</th>
          <th>nombre</th>
          <th>dateFacture</th>
        </tr>
        <?php foreach($facture as $factures): ?>
          <tr>
            <td><?php echo $factures->idContact; ?></td>
            <td><?php echo $factures->NumFacture; ?></td>
            <td><?php echo $factures->vendeur; ?></td>
            <td><?php echo $factures->acheteur; ?></td>
            <td><?php echo $factures->ModePayement; ?></td>
            <td><?php echo $factures->prix; ?></td>
            <td><?php echo $factures->nombre; ?></td>
            <td><?php echo $factures->dateFacture; ?></td>
            <td>
              <a href="<?php echo site_url('update/Update/Facture?id='.$factures->id) ?>" class="btn btn-info">Modifier</a>
              <a onclick="return confirm('EST TU SUR DE VOULOIR EFFACER CETTE LIGNE?')" href="<?php echo site_url('delete/Delete/facture?id='.$factures->id) ?>" class='btn btn-danger'>Effacer </a>
           </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

    <script src="<?php echo $burl ?>assets/js/script.js"></script>

   
</body>
</html>