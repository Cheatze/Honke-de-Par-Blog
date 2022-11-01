<?php 
session_start();
include_once "includes/database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" type="image/png" href="files/favicon-16x16.png"/>
    <title>Honke de Par</title>
</head>
<body>

    <?php
        include_once 'includes/header.php';
    ?>

    <?php
        include_once 'includes/nav.php';
    ?>

    <div class="container content">
        <div class="row">
            <div class="column col-lg-2" ></div>
        <!--<section>-->
            <div id="artikel" class="column col-lg-7" style="background-color:#bbb;">
                <h3>Het waarom van Honke</h3>
                <p>Hallo,</p>
                <br>
                <p>
                    Ik ben Honke. Ik bivakkeer al jaren in het hoofd van JJ. 
                    Ik noem hem JJ want Jan Johannes vind ik gewoon onhandig.  
                    In dat hoofd voel ik me veilig. 
                    Ik kan daar van alles bedenken en doen zonder afgerekend te worden. 
                    Voor JJ is dat wel iets minder. Hij heeft niet altijd de controle over zijn eigen doen en laten. 
                    Soms noemt hij zichzelf zelfs Honke.
                </p>
                <br>
                <p>
                    Ik heb een mooi leven. 
                    Ik doe eigenlijk altijd waar ik zin in heb. 
                    Ik vul mijn dagen met gamen, met de hond wandelen, een praatje maken, een beetje filosoferen en kijken naar andere mensen. 
                    Dit leidt soms tot gedoe in de vorm van een gedachte, een gedicht, een lied, een beeld, een project of een verhaal.
                </p>
                <br>
                <p>
                    Ik hoop wel dat JJ zich wat minder bezig gaat houden met politiek. 
                    Het kost veel tijd en hij bereikt ook best wel wat maar volgens mij ben ik één van de weinigen die dat in de gaten heeft.   
                    Hij kan zijn tijd veel beter aan mij besteden.
                </p>
                <br>
                <p>
                Om van het gedoe af te komen is er deze website
                </p>
            </div>
        <!--</section>-->
        <!--<aside>-->
            <div class="column col-lg-3">
                <h3></h3>
                <p></p>
            </div>
        <!--</aside>-->
        </div>
    </div>


    <footer></footer>
    <script type="text/javascript">

    </script>

    <script type="text/javascript" src="scripts/setdatum.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>