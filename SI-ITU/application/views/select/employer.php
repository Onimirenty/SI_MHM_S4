<?php
    // On récupère les données depuis le modèle
    $employe = $this->db->get('Employe')->result();
?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Employe</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>nom</th>
          <th>prenom</th>
          <th>dateNaissance</th>
          <th>metier</th>
          <th>salaire</th>
          <th>pouvoirExecutif</th>
        </tr>
        <?php foreach($employe as $employes): ?>
          <tr>
            <td><?php echo $employes->nom; ?></td>
            <td><?php echo $employes->prenom; ?></td>
            <td><?php echo $employes->dateNaissance; ?></td>
            <td><?php echo $employes->metier; ?></td>
            <td><?php echo $employes->salaire; ?></td>
            <td><?php echo $employes->pouvoirExecutif; ?></td>
            <td>
              <a href="<?php echo site_url('update/Update/employe?id='.$employes->id) ?>" class="btn btn-info">Modifier</a>
              <a onclick="return confirm('EST TU SUR DE VOULOIR EFFACER CETTE LIGNE?')" href="<?php echo site_url('delete/Delete/employe?id='.$employes->id) ?>" class='btn btn-danger'>Effacer </a>
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