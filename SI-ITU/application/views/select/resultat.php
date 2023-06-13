<!DOCTYPE html>
<html>
<head>
    <title>Résultats de la recherche</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
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
                <th>Montant</th>
            </tr>
            <?php foreach ($resultats as $facture): ?>
                <tr>
                    <td><?php echo $facture->dates; ?></td>
                    <td><?php echo $facture->NumFacture; ?></td>
                    <td><?php echo $facture->prix; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
