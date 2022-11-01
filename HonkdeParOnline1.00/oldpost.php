<?php 
session_start();
include_once "includes/database.php";
include_once "includes/utilities.php";

//use GET variable to get post uit de db met hetzelfde ID
//redirect back to index if GET variable is not set


$id = $_GET['id'];

$querybp = "SELECT * FROM blogposts WHERE id = '$id'";
//$querybp = "SELECT * FROM blogposts ORDER BY id DESC LIMIT 1";

$statement = $db->prepare($querybp);

$statement->execute(array());

$rowbp = $statement->fetch();

$title =$rowbp["title"];
$content = $rowbp["content"];

//the update code
if(isset($_POST['blogPost'])){

    $title2 = $_POST['title'];
    $content2 = $_POST['ckeditor'];

    if($title2!=""){

        $sqlEdit = "UPDATE blogposts SET title = :title WHERE id = :id";

        //use PDO prepare to sanitize data
        $statement = $db->prepare($sqlEdit);

        //execute the statement
        $statement->execute(array(':title' => $title2, 'id' => $id));

    }else{
        echo '<script>alert("Een lege title kan niet")</script>';
    }

    if($content2!=""){

        $sqlEdit = "UPDATE blogposts SET content = :content WHERE id = :id";

        //use PDO prepare to sanitize data
        $statement = $db->prepare($sqlEdit);

        //execute the statement
        $statement->execute(array(':content' => $content2, 'id' => $id));

    }else{
        echo '<script>alert("Vergeten iets in te voeren?")</script>';
    }



}

//the delete code
if(isset($_POST['deletebtn'])){

    //echo '<script language="javascript">alert("Got into delete.");</script>';
    //$id = $_SESSION['id'];

    $sqlDelete = "DELETE FROM blogposts WHERE id = :id";

    //use PDO prepare to sanatize data
    $statement = $db->prepare($sqlDelete);

    //execute the statment
    $statement->execute(array('id' => $id));

    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- JS form validation script-->
    <script type="text/javascript" src="scripts/validateforms.js"></script>


    <link rel="stylesheet" href="styles/style.css">

    <!-- ckeditor-->
    <script src="https://cdn.ckeditor.com/4.16.2/basic/ckeditor.js"></script>

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
            <div id="artikel" class="column col-lg-7" style="background-color:#bbb; color:Navy;">
                <h3><?php echo"$title" ?></h3>
                <p><?php echo"$content" ?></p>
            </div>
            <div class="column col-lg-3" style="background-color:#ccc; padding:25px;">
                <?php include_once 'includes/history.php';?>
            </div>
        </div>
    </div>

    <?php
        if(isset($_SESSION['username'])){
            //hier een edit form voor de blogpost en een delete knopje
            //include_once 'includes/editblogpost.php';
            include_once 'includes/editbutton.php';

        }
        if(isset($_POST['Edit'])){
            include_once 'includes/editblogpost.php';
        }
    ?>


    <script type="text/javascript">

    </script>

    <script type="text/javascript" src="scripts/setdatum.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
      CKEDITOR.replace( 'ckeditor' );

      document.getElementById("reset").innerHTML = "<?php echo htmlspecialchars($content); ?>";
    </script>
</body>
</html>