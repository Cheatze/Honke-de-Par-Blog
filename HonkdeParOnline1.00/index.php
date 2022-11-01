<?php 
session_start();
include_once "includes/database.php";
include_once "includes/utilities.php";

$querybp = "SELECT * FROM blogposts ORDER BY id DESC LIMIT 1";

$statement = $db->prepare($querybp);

$statement->execute(array());

$rowbp = $statement->fetch();

$title = "";
$content = "";
if($rowbp != ""){
    $title =$rowbp["title"];
}
if($rowbp != ""){
    $content = $rowbp["content"];
}



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
            <div class="column col-lg-2"></div>
        <!--<section>-->
            <div id="artikel" class="column col-lg-7" style="background-color:#bbb; color:Navy;">
                <h3><?php if($title!=""){ echo"$title"; }?></h3>
                <p><?php echo"$content" ?></p>
            </div>
        <!--</section>-->
        <!--<aside>-->
            <div class="column col-lg-3" style="background-color:#ccc; padding:25px;">
                <?php include_once 'includes/history.php';?>
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