<?php

?>

<!DOCTYPE html>
<html>

<head>
    <title>Résultats de la recherche</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    <h2>Résultats de la recherche</h2>

    <?php if (empty($resultats)): ?>
        <p>Aucun résultat trouvé.</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Date</th>
                <th>Numéro de facture</th>
                <th>Designation</th>
                <th>Produit</th>
                <th>Societe</th>
                <th>Contact</th>
                <th>Mode de Paiement</th>
                <th>Unité</th>
                <th>Prix Unitaire</th>
                <th>Quantité</th>
                <th>Montant</th>
            </tr>
            <?php foreach ($resultats as $resultat): ?>
                <tr>
                    <td>
                        <?php echo $resultat->dates; ?>
                    </td>
                    <td>
                        <?php echo $resultat->numFacture; ?>
                    </td>
                    <td>
                        <?php echo $resultat->designation; ?>
                    </td>
                    <td>
                        <?php echo $this->Dao->getById('Produit', $resultat->idproduit)->nomProduit; ?>
                    </td>
                    <td>
                        <?php echo $this->Dao->getById('identite_Entreprise', $resultat->idSociete)->nomSociete; ?>
                    </td>
                    <td>
                        <?php echo $this->Dao->getById('Contact', $resultat->idContact)->mail; ?>
                    </td>
                    <td>
                        <?php echo $resultat->modePayement; ?>
                    </td>
                    <td>
                        <?php echo $resultat->unite; ?>
                    </td>
                    <td>
                        <?php echo $resultat->prixUnitaire; ?>
                    </td>
                    <td>
                        <?php echo $resultat->quantite; ?>
                    </td>
                    <td>
                        <?php echo $resultat->montant; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>
