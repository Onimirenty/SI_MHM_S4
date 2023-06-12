<?php
    // On récupère les données de la base de données
    $this->load->database();
    $query = $this->db->get('InfoComptabilite');
    $Comptabilite = $query->result();
?>
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>INFO COMPTABILITE</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>capitale</th>
                    <th>NIF</th>
                    <th>NSTAT</th>
                    <th>NRCS</th>
                </tr>
                <?php foreach($Comptabilite as $Comptabilites): ?>
                    <tr>
                        <td><?php echo $Comptabilites->capitale; ?></td>
                        <td><?php echo $Comptabilites->NIF; ?></td>
                        <td><?php echo $Comptabilites->NSTAT; ?></td>
                        <td><?php echo $Comptabilites->NRCS; ?></td>
                        <td>
                            <a href="<?php echo site_url('update/Update/comptabilite?id='.$Comptabilites->id) ?>" class="btn btn-info">Modifier</a>
                            <a onclick="return confirm('EST TU SUR DE VOULOIR EFFACER CETTE LIGNE?')" href="<?php echo site_url('delete/Delete/comptabilite?id='.$Comptabilites->id) ?>" class='btn btn-danger'>Effacer </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
</section>

<script src="<?php echo base_url() ?>assets/js/script.js"></script>
</body>
</html>
