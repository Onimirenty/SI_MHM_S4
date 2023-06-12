<?php
 
 // On récupère tous les contacts
 $query = $this->db->get('Produit');
 
 // On récupère les données depuis le modèle
    $produits = $query->result();

?>

    
<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <h2>PRODUITS</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>nomproduit</th>
                    <th>prix</th>
                    <th>nombre</th>
                </tr>
                
                <?php foreach($produits as $produit): ?>
                    <tr>
                        <td><?php echo $produit->nomProduit; ?></td>
                        <td><?php echo $produit->PrixUnitaire; ?></td>
                        <td><?php  echo $produit->nombre; ?></td>
                        <td>
                            <a href="<?= site_url('update/Update/produit?id='.$produit->id) ?>" class="btn btn-info">Modifier</a>
                            <a onclick="return confirm('EST TU SUR DE VOULOIR EFFACER CETTE LIGNE?')" href="<?= site_url('delete/Delete/produit?id='.$produit->id) ?>" class='btn btn-danger'>Effacer </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<section>
    <script src="<?= $burl ?>assets/js/script.js"></script>
</section>
