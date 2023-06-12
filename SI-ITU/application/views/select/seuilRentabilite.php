<?php
$this->load->model('Balance');
$this->load->helper('form');
$dta = $this->Balance->getTransactions($dates);
$produit = $this->db->get('Produit')->result();
$stock= $this->db->get('Stock')->result();
$nb = $stock[0]->nombre;
$cpu = $stock[0]->PrixUnitaire;
$nbPAV = $produit[0]->nombre;
$pvu = $produit[0]->PrixUnitaire;
$chargetotal=(($passif/$nb) * $passif + ($cpu * $nb) );
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/dist/css/bootstrap.min.css">
  <title>Seuil de Rentabilite</title>
</head>

<body>
  <h4 style="color: #000000a8;">
    <?php echo $dates; ?>
    <?php echo form_open('select/Select/sr'); ?>
    <input type="date" name="inputDate">
    <input type="submit" value="Valider">
    <?php echo form_close(); ?>
  </h4>
  <h2 class="text-center" style="margin: 36px;color: var(--bs-blue);">Seuil de Rentabilite</h2><br>
  <h5 class="text-center">voici notre seuil de Rentabilite</h5><br><br>
  <div class="text-center">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">stock</th>
          <th scope="col">Prix de vente par unite</th>
          <th scope="col">Nombre d'unite AV</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row"><?php echo $nbPAV ?></th>
          <td><?php echo $pvu?></td>
          <td><?php echo ($chargetotal/$pvu) ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>