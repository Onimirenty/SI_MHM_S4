<?php
$burl= site_url();
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
$var = $this->Analytique->pourcentage($chargetotal,80) ;
$fixe = $this->Analytique->pourcentage($chargetotal,20) ;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Diagramme en camembert</title>
  <script src="<?php echo $burl ?>/assets/js/chart.js"></script>
</head>
<body>
<h4 style="color: #000000a8;">
    <?php echo $dates; ?>
    <?php echo form_open('select/Select/sr'); ?>
    <input type="date" name="inputDate">
    <input type="submit" value="Valider">
    <?php echo form_close(); ?>
</h4>
  <canvas id="myChart" style="width: 400px; height: 400px;"></canvas>
  
  <script>
    function createPieChart(data) {
      var options = {
        responsive: true,
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 10,
            top: 10,
            bottom: 10
          }
        }
      };
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
      });
    }

    // Données du diagramme en PHP
    <?php
      $dataValues = [$var,$fixe];
    ?>

    // Création des données du diagramme en JavaScript
    var chartData = {
      labels: ['usine', 'plantation'],
      datasets: [{
        data: [<?php echo implode(',', $dataValues); ?>], // Les valeurs pour chaque catégorie
        backgroundColor: ['#FF6384', '#36A2EB'] // Couleurs de remplissage pour chaque catégorie
      }]
    };

    // Appel de la fonction pour créer le diagramme en camembert
    createPieChart(chartData);
  </script>
</body>
</html>
