<?php

// Exécution de la requête de sélection
$query = $this->db->get('stocke');
$stocke = $query->result();

?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>STOCK</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>nom Stocke</th>
          <th>prix</th>
          <th>nombre</th>
          <th>Modifier / Supprimer </th>
        </tr>
        <?php foreach($stocke as $stockes): ?>
          <tr>
            <td><?php echo $stockes->nomStocke; ?></td>
            <td><?php echo $stockes->Prix; ?></td>
            <td><?php echo $stockes->nombre; ?></td>
            <td>
             &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('update/Update/stock?id='.$stockes->id) ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
             &nbsp;&nbsp;&nbsp; <a onclick="return confirm('EST TU SUR DE VOULOIR EFFACER CETTE LIGNE?')" href="<?php echo site_url('delete/Delete/stock?id='.$stockes->id) ?>" class='btn btn-danger'><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<section>

    <script src="<?php echo $burl ?>assets/js/script.js"></script>

</body>
</html>
