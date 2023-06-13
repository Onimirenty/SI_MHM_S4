<?php
$burl = site_url();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Recherche multicritères</title>
</head>

<body>
    <h1>Recherche multicritères</h1>

    <form method="POST" action="<?php echo $burl ?>Recherche/rechercher">
        <label for="date_debut">Date de début :</label>
        <input type="date" id="date_debut" name="date_debut"><br>

        <label for="date_fin">Date de fin :</label>
        <input type="date" id="date_fin" name="date_fin"><br>

        <label for="num_facture">Numéro de facture :</label>
        <input type="text" id="num_facture" name="num_facture"><br>

        <label for="montant_min">Montant minimum :</label>
        <input type="number" step="0.01" id="montant_min" name="montant_min"><br>

        <label for="montant_max">Montant maximum :</label>
        <input type="number" step="0.01" id="montant_max" name="montant_max"><br>

        <label for="produit">Produit :</label>
        <select name="idProduit"></select>
            <?php 
            foreach ($produits as $produit) 
            {
            ?>
                <option value="<?php echo $produit->id; ?>">
                    <?php echo $produit->nom; ?>
                </option>
            <?php
            }
            ?>
        </select>
        <input type="text" id="produit" name="produit"><br>

        <label for="client">Client :</label>
        <input type="text" id="client" name="client"><br>

        <label for="contact">Contact :</label>
        <input type="text" id="contact" name="contact"><br>

        <input type="submit" value="Rechercher">
    </form>
</body>

</html>