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
        <select id="produit" name="idProduit">
            <?php
            foreach ($produits as $produit) {
                ?>
                <option value="<?php echo $produit->id; ?>">
                    <?php echo $produit->nomProduit; ?>
                </option>
                <?php
            }
            ?>
        </select><br>
        <label for="client">Client :</label>
        <select id="client" name="idCLient">
            <?php
            foreach ($clients as $client) {
                ?>
                <option value="<?php echo $client->id; ?>">
                    <?php echo $client->nomSociete; ?>
                </option>
                <?php
            }
            ?>
        </select><br>
        <input type="submit" value="Rechercher">
    </form>
</body>

</html>