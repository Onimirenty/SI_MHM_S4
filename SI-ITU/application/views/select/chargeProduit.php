<?php
$this->load->model('Balance');
$this->load->helper('form');

$dta = $this->Balance->getTransactions($dates) ;

$produit= $this->db->get('Produit')->result();
$stock= $this->db->get('Stock')->result();
$query = $this->db->get('identite_Entreprise');
$id_E = $query->result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/dist/css/bootstrap.min.css">
    <title>Charge par produit</title>
</head>
<body>
    <h2 class="text-center" style="margin: 36px;color: var(--bs-blue);">Charge par Produit par centre</h2><br>
    <h5 class="text-center">voici les charges par produit</h5><br><br>
    <h4 style="color: #000000a8;">
                <?php echo $dates; ?>
                <?php echo form_open('select/Select/chargeProduit'); ?>
                <input type="date" name="inputDate">
                <input type="submit" value="Valider">
                <?php echo form_close(); ?>
            </h4>
    <div class="text-center">
        <table class="table table-striped">
            <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Quantite</th>
              <th scope="col">unite d'ouvre</th>
              <th scope="col">prix par Unite</th>
              <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <?php 
                    $nb = $stock[0]->nombre ;
                    $cpu = $stock[0]->PrixUnitaire;
                    $nbPAV =$produit[0]->nombre ;
                    $cpu = $produit[0]->PrixUnitaire;
              ?>
              <th scope="row">charge directe(MP)</td>
              <td><?php echo $nb;?></td>
              <td>kg</td>
              <td><?php echo $cpu ?></td>
              <td><?php echo ($cpu * $nb)?></td>
            </tr>
            <tr>
              <th scope="row">charge de production</td>
              <td><?php echo $nbPAV  ?></td>
              <td></td>
              <td><?php echo ($passif/$nb)  ;?></td>
              <td><?php echo ($passif/$nb) * $passif  ;?></td>
            </tr>
            <tr>
                <th scope="row">total</th>
                <td><?php echo $nbPAV ; ?><</td>
                <td></td>
                <td><?php echo $cpu + ($passif/$nb) ; ?></td>
                <td><?php echo (($passif/$nb) * $passif + ($cpu * $nb) ) ?></td>
              </tr>
  
            </tbody>
        </table>
    </div>
</body>
</html>