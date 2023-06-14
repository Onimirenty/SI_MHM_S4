<?php
// $date = "2022-01-01";
$this->load->helper('form');
$date = $dates;
$query = $this->db->get('identite_Entreprise');
$id_E = $query->result();
$dta = $this->Balance->getTransactions($dates);


?>

<body>



    <div class="wrapper-card" style="background-color: white;">
        <div class="card" style="">
            <div class="card-title" style="width: 17%;float: left;">
                <h2 style="margin-top: 37%;">
                    <?php echo $id_E[0]->nomSociete; ?>
                </h2>
            </div>

            <div class="card-title" style="">
                <h1 style="font-size: xxx-large;">
                    Balance des comptes
                </h1>
                <h2>Intitulé des comptes</h2>
            </div>
        </div>
        <div class="card-title" style="left: -7%;position: relative;">
            <h4 style="color: #000000a8;">
                <?php echo $dates; ?>
                <?php echo form_open('select/Select/balance'); ?>
                <input type="date" name="inputDate">
                <input type="submit" value="Valider">
                <?php echo form_close(); ?>
            </h4>
        </div>
    </div>


    <div class="wrapper-card">
        <div class="card" style="max-width: 32%;background-color: #324960;color: white;">
            <div class="card-title" style="position: absolute;left: 50%;top: 26%;/* color: wheat; */">
                <h2 style="color: white;">Numero de compte</h2>
            </div>
            <div class="card-title" style="/* width: -webkit-fill-available; */">
                <h2
                    style="width: 47%;/* float: left; */border-right: 3px solid white;color: white;position: relative;top: 38%;">
                    Intitulé des comptes
                </h2>
            </div>
        </div>
        <div class="card" style="max-width: 32%;background-color: #324960;color: white;">
            <h2 style="color:white">Mouvements</h2>

            <div style="width: 50%;float: left;margin-top: -4.7%;" class="card-title">
                <h2
                    style="color:white;border-right: 3px solid;position: relative;top: 32%;/* margin-bottom: -1%; *//* padding-bottom: 11%; */">
                    Débits</h2>
            </div>

            <div class="card-title">
                <h2 style="color:white;position: relative;left: 18%;top: -92%;">Crédits</h2>
            </div>

        </div>
        <div class="card" style="max-width: 32%;background-color: #324960;color: white;">
            <h2 style="color:white">Soldes</h2>

            <div style="width: 50%;float: left;margin-top: -4.7%;" class="card-title">
                <h2
                    style="color:white;border-right: 3px solid;position: relative;top: 32%;/* margin-bottom: -1%; *//* padding-bottom: 11%; */">
                    Débits</h2>
            </div>

            <div class="card-title">
                <h2 style="color:white;position: relative;left: 18%;top: -92%;">Crédits</h2>
            </div>

        </div>
    </div>

    <div class="wrapper-card">
        <div class="card">
            <div class="card-title" style="width: 161%;float: left;border-right: 3px solid black;">
                <?php

                foreach ($dta as $transaction) {
                    ?>
                    <h4>
                        <?php echo $transaction['idCompte1']; ?>
                    </h4>
                    <?php
                    echo "<br>";
                }
                ?>
                <br>
                <br>
                <br>
                <div>
                    <?php
                    echo "<br>";
                    echo "<h4> total: </h4>";
                    echo "<br>";
                    ?>
                </div>
            </div>


            <div class="card-title" style="width: 50%;position: absolute;border-right: 3px solid black;">

                <?php

                foreach ($dta as $transaction) {
                    ?>
                    <h4>
                        <?php echo $transaction['Compte1']; ?>
                    </h4>
                    <?php
                    echo "<br>";
                }
                ?>

            </div>
        </div>


        <div class="card">
            <div class="card-title" style="width: 50%;float: left;border-right: 3px solid black;">
                <?php

                foreach ($dta as $transaction) {
                    $nat = $transaction['nature'];


                    if ($nat == "debit") {
                        echo "<h4>" . $transaction['Valeur'] . "</h4>";
                    } else {
                        echo "<h4> --- </h4>";
                    }
                    echo "<br>";
                    ?>
                    <?php
                ?>
                <br>
                <br>
                <br>
                <div>
                    <?php
                    echo "<br>";
                    echo "<h4>" . $transaction['Balance'] . "</h4>";
                    echo "<br>";
                }
                    ?>
                </div>

            </div>

            <div class="card-title" style="position: absolute;top: 0%;left: 63%;">
                <?php

                foreach ($dta as $transaction) {
                    $nat = $transaction['nature'];
                    if ($nat == "credit") {
                        echo "<h4>" . $transaction['Valeur'] . "</h4>";
                    } else {
                        echo "<h4> --- </h4>";
                    }
                    echo "<br>";
                    ?>

                    <?php
                }

                ?>

            </div>
        </div>

        <div class="card">
            <div class="card-title" style="width: 50%;float: left;border-right: 3px solid black;">
                <?php

                foreach ($dta as $transaction) {
                    $nat = $transaction['nature'];


                    if ($nat == "debit") {
                        echo "<h4>" . $transaction['Valeur'] . "</h4>";
                    } else {
                        echo "<h4> --- </h4>";
                    }
                    echo "<br>";
                    ?>
                    <?php
                }
                ?>

            </div>

            <div class="card-title" style="position: absolute;top: 0%;left: 63%;">
                <?php

                foreach ($dta as $transaction) {
                    $nat = $transaction['nature'];
                    $pos = $transaction['position'];
                    if ($nat == "credit") {
                        echo "<h4>" . $transaction['Valeur'] . "</h4>";
                    } else {
                        echo "<h4> --- </h4>";
                    }
                    echo "<br>";
                    ?>

                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    <div class="wrapper-card">

    </div>


</body>

</html>