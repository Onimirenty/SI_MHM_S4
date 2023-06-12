<?php
$this->load->model('Balance');
$this->load->helper('form');

$dta = $this->Balance->getTransactions($dates) ;

$contact = $this->db->get('Produit')->result();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/dist/css/bootstrap.min.css">
    <title>charge/Produit/Centre</title>
</head>
<body>
    <h2 class="text-center" style="margin: 36px;color: var(--bs-blue);">Charge par Produit par centre</h2><br>
    <h4 style="color: #000000a8;">
                <?php echo $dates; ?>
                <?php echo form_open('select/Select/centre'); ?>
                <input type="date" name="inputDate">
                <input type="submit" value="Valider">
                <?php echo form_close(); ?>
            </h4>
    <h5 class="text-center">voici les charges par produit par centre</h5><br><br>
    <div class="text-center">
    <table class="table table-striped" border=2>
  <thead>
    <tr>
      <th rowspan="2" scope="col">#</th>
      <th rowspan="2" scope="col">Produit</th>
      <th scope="col" >Nature</th>
      <th rowspan="2" scope="col">Charge total</th>
      <th scope="col">Plantation</th>
      <th scope="col">Usine</th>
      <th rowspan="2" scope="col">Nombre d'unité produite</th>
      <th rowspan="2" scope="col">Charge par unité</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php 
      
      ?>
      
      <th rowspan="2"scope="row">1</th>
      <td rowspan="2"><?php echo $contact[0]->nomProduit ;?></td>
      <td>v</td>
      <td rowspan="2"><?php echo $passif  ?></td>
      <?php
            $var = $this->Analytique->pourcentage($passif,80) ;
            $fixe = $this->Analytique->pourcentage($passif,20) ;
      ;?>
      
      <td><?php echo  $this->Analytique->pourcentage( $var,30) ?></td>
      <td><?php echo  $this->Analytique->pourcentage($var,70) ?></td>
      <td rowspan="2"><?php echo $contact[0]->nombre ;?> </td>
      <td rowspan="2"><?php echo $this->Analytique->CPU($passif,$contact[0]->nombre) ;?></td>
    </tr>
    <tr>
      <td>f</td>
      <td><?php echo  $this->Analytique->pourcentage( $fixe,30) ?></td>
      <td><?php echo  $this->Analytique->pourcentage($fixe,70) ?></td>
    
    </tr>
  </tbody>
</table>

    </div>
</body>
</html>