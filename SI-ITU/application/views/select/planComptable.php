<?php
        $date = "2022-01-01";
        $query = $this->db->get('identite_Entreprise');
        $id_E = $query->result();
        $comptes = $this->db->get('v_Compte')->result();
?>
<html class=""><head>
    <meta charset="UTF-8">
    <style>
        body {

    font-family: 'lato', sans-serif;
    -webkit-font-smoothing: antialiased;
    background: linear-gradient(270deg, #0070fbeb, #8fe1f4);
    padding: 0;
    margin: 0;
    height: 100vh;
        }

        .wrapper-card {
            display: flex;
            flex-wrap: nowrap;
            margin: 40px auto;
            width: 77%;
        }

        .card {
            background: #fff;
            border-radius: 3px;
            box-shadow: 0 1px 1px transparent;
            flex: 1;
            margin: 8px;
            position: relative;
            text-align: center;
            transition: all 0.5s ease-in-out;
        }

        .card.popular {
            margin-top: -10px;
            margin-bottom: -10px;
        }

        .card.popular .card-title h3 {
            color: #3498db;
            font-size: 22px;
        }

        .card.popular .card-price {
            margin: 50px;
        }

        .card.popular .card-price h1 {
            color: #3498db;
            font-size: 60px;
        }

        .card.popular .card-action button {
            background-color: #3498db;
            border-radius: 80px;
            color: #fff;
            font-size: 17px;
            margin-top: -15px;
            padding: 15px;
            height: 80px;
        }

        .card.popular .card-action button:hover {
            background-color: #2386c8;
            font-size: 23px;
        }



        .card-ribbon {
            position: absolute;
            overflow: hidden;
            top: -10px;
            left: -10px;
            width: 114px;
            height: 112px;
        }

        .card-ribbon span {
            position: absolute;
            display: block;
            width: 160px;
            padding: 10px 0;
            background-color: #3498db;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
            color: #fff;
            font-size: 13px;
            text-transform: uppercase;
            text-align: center;
            left: -35px;
            top: 25px;
            transform: rotate(-45deg);
        }

        .card-ribbon::before,
        .card-ribbon::after {
            position: absolute;
            z-index: -1;
            content: '';
            display: block;
            border: 5px solid #2980b9;
            border-top-color: transparent;
            border-left-color: transparent;
        }



        .card-title h3 {
            color: rgba(0, 0, 0, 0.3);
            font-size: 15px;
            text-transform: uppercase;
        }

        .card-title h4 {
            color: rgba(0, 0, 0, 0.6);
        }

        .card-price {
            margin: 60px 0;
        }

        .card-price h1 {
            font-size: 46px;
        }

        .card-price h1 sup {
            font-size: 15px;
            display: inline-block;
            margin-left: -20px;
            width: 10px;
        }

        .card-price h1 small {
            color: rgba(0, 0, 0, 0.3);
            display: block;
            font-size: 11px;
            text-transform: uppercase;
        }

        .card-description ul {
            display: block;
            list-style: none;
            margin: 60px 0;
            padding: 0;
        }

        .card-description li {
            color: rgba(0, 0, 0, 0.6);
            font-size: 15px;
            margin: 0 0 15px;
        }

        .card-description li::before {
            font-family: FontAwesome;
            content: "\f00c";
            padding: 0 5px 0 0;
            color: rgba(0, 0, 0, 0.15);
        }

        .card-action button {
            background: transparent;
            border: 2px solid #3498db;
            border-radius: 30px;
            color: #3498db;
            cursor: pointer;
            display: block;
            font-size: 15px;
            font-weight: bold;
            padding: 20px;
            width: 100%;
            height: 60px;
            text-transform: uppercase;
            transition: all 0.3s ease-in-out;
        }

        .card-action button:hover {
            background-color: #3498db;
            box-shadow: 0 2px 4px #196090;
            color: #fff;
            font-size: 17px;
        }
    </style>
</head>
<body>



    <div class="wrapper-card" style="background-color: white;">
        <div class="card" style="">
            <div class="card-title" style="width: 17%;float: left;">
                <h2 style="margin-top: 37%;"><?php echo $id_E[0]->nomSociete; ?></h2>
            </div>

            <div class="card-title" style="">
                <h1 style="font-size: xxx-large;">
                    Plan des comptes
                </h1>
            </div>
        </div>
    </div>


    <div class="wrapper-card">
        <div class="card" style="max-width: 100%;background-color: #324960;color: white;">
        <div class="card-title" style="width: 47%;/* float: left; */position: relative;top: 35%;right: -26%;border-right: 3px solid;height: 100%;border-left: 3px solid;">
                <h2 style="position: relative;color:white">intitule de compte </h2>
            </div>

            <div class="card-title" style="/* width: -webkit-fill-available; */">
                <h2 style="width: 25%;color:white ">numero de compte</h2>
            </div>
            <div class="card-title" style="width: 35%;float: left;/* border-right: 3px solid; */height: 100%;position: relative;left: 71%;top: -32%;">
                <h2 style="color:white;">compte tier</h2>
            </div>
        </div>

    </div>
    
    <div class="wrapper-card">
        <div class="card">
            <div class="card-title" style="width: 100% ;">
            <?php
                    
                    foreach ($comptes as $compte) 
                    {
            ?>
                        <h4><?php echo $compte->intitule   ;?></h4>
            <?php
                    }
            ?>
        </div>


        <div class="card-title" style="
    position: absolute;
    left: 11%;
">
 <?php
                    
                    foreach ($comptes as $compte) 
                    {
            ?>
                        <h4><?php echo $compte->numeroCompte   ;?></h4>
            <?php
                    }
            ?>
        </div>
        <div class="card-title" style="
    position: absolute;
    width: 14%;
    left: 83%;
">
        <?php
                    
                    foreach ($comptes as $compte) 
                    {
            ?>
                        <h4><?php echo $compte->compteTier  ;?></h4>
            <?php
                    }
            ?>
        </div>
    </div>

</div>


</body>
</html>
