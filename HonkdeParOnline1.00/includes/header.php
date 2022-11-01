<?php 
    //de wenk ophalen met het hoogste ID en in de wenk paragraph stoppen
    //kijk even naar vorige paginas waar ik iets ophaalde en neerzette


    //wenk ophalen met het hoogste id nummer
    //$query = "SELECT wenk FROM wenken WHERE MAX(id)";
    $query = "SELECT * FROM wenken ORDER BY id DESC LIMIT 1";

    $statement = $db->prepare($query);

    $statement->execute(array());

    $row = $statement->fetch();

    $wenk = "";
    if($row!=""){
        $wenk = $row["wenk"];
    }
    
    //$wenk = "Wat u niet wil dat nu geschied doe dat dan ook vandaag nog niet";

    //retrieve results from query
    //$wenk = $db->query($query);

    //dit werkt niet
    //echo "<script type='text/javascript'>alert($wenk);</script>";
    //dit werkt wel
    //echo "<h1>$wenk</h1>";

    //<!--<p id="wenk">
    //<?php //echo $wenk;
    //</p>-->

    //<p id='wenk'>Wat u niet wil dat nu geschied </br>
    //doe dat dan ook vandaag nog niet</p>

?>
<header>
        <div class="container">
        <div class="row ">
            <?php
            echo "
                <div id='Lcol' class='column col-lg-6' >
                    <div id='left'>
                    <p id='date'><span id='day' style='font-weight:bold'>Maandag</span> <span id='monthday'>28</span> <span id='month'>november</span> <span id='year' style='font-size: larger;'>2021</span></p>
                    <p id='quote'>Wenk van de week</p>
                    <br>
                    <!--latest wenk here-->
                    <p id='wenk' style='width: 245px;'> $wenk
                    </p>

                </div>";
            ?>
            </div>
                <div id="Mcol" class="column col-lg-4" >
                    <h1 id="title">Honke de Par</h1>
                </div>
            <div id="Rcol" class="column col" >
                <img src="files/Honke.png" alt="" style="width:145px;">
            </div>
          </div>
        </div>
    </header>
