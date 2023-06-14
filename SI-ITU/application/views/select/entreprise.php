
<?php
// On récupère les données depuis la base de données
$query = $this->db->get('identite_Entreprise');
$identite_Entreprise = $query->result();
?>

<div class="container">
<div class="card mt-5">
  <div class="card-header">
    <h2>Identité de l'Entreprise</h2>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>Logo</th>
        <th>Nom de la société</th>
        <th>Objet de la société</th>
        <th>Date de création</th>
        <th>Lieu d'exercice</th>
        <th>Modifier / Supprimer </th>            
      </tr>
      <?php foreach($identite_Entreprise as $identite): ?>
        <tr>
          <td><?php echo $identite->logo; ?></td>
          <td><?php echo $identite->nomSociete; ?></td>
          <td><?php echo $identite->objetSociete; ?></td>
          <td><?php echo $identite->dateCreation; ?></td>
          <td><?php echo $identite->LieuExercice; ?></td>
          <td>
          &nbsp;&nbsp;&nbsp; <a href="<?php echo site_url('update/Update/Entreprise?id='.$identite->id) ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
           &nbsp;&nbsp;&nbsp; <a onclick="return confirm('Es-tu sûr de vouloir effacer cette ligne ?')" href="<?php echo site_url('delete/Delete/identite_Entreprise?id='.$identite->id) ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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