<?php 
session_start();
include_once "includes/database.php";
include_once "includes/utilities.php";

if(!isset($_SESSION['username'])){
    header('location: index.php');
}

$id = $_GET['id'];

$queryw = "SELECT * FROM wenken WHERE id = '$id'";

$statement = $db->prepare($queryw);

$statement->execute(array());

$rowk = $statement->fetch();

$contentw = $rowk["wenk"];

if(isset($_POST['editWenk'])){

    
    $wenk = $_POST['wenk'];

    if($wenk!=""){

        $sqlEdit = "UPDATE wenken SET wenk = :wenk WHERE id = :id";

        //$sqlInsert = "INSERT INTO wenken (wenk) VALUES (:wenk)";

        //use PDO prepare to sanitize data
        $statement = $db->prepare($sqlEdit);

        $statement->execute(array(':wenk' => $wenk, 'id' => $id));
        //$statement->execute(array(':wenk' => $wenk));

        $success = "<br><h3>Edit success!</h3>";

        //redirect to oude wenken lijst of refresh?
        header("location: editwenk.php?id=$id");

    }else{
        echo '<script>alert("Een lege wenk kan niet")</script>';
    }

}


//the delete code
if(isset($_POST['deletebtn'])){


    $sqlDelete = "DELETE FROM wenken WHERE id = :id";

    //use PDO prepare to sanatize data
    $statement = $db->prepare($sqlDelete);

    //execute the statment
    $statement->execute(array('id' => $id));

    header('location: oudewenken.php');
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

            <!-- practically for padding -->
            <div class="column col-lg-2" ></div>
        
            <div id="artikel" class="column col-lg-7" style="background-color:#bbb;">

            <!--Insert forms-->
                <?php 
                    if(isset($success)){
                        echo $success;
                        unset($success);
                    }
                ?>

                <div class="container">
                    <form name="wenken" action="" method="POST" onsubmit="return validateWenk()" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputDescription">Edit Wenk</label>
                            <textarea name="wenk" id='reset' value="<?php echo"$contentw" ?>"   rows="3" cols="40"></textarea>
                        </div>
                        <button type="submit" name="editWenk" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

            <!-- practically for padding -->
            <div class="column col-lg-2"></div>

        </div>


    </div>

    <div class='container content'>
        <div class='row'>
            <div class='column col-lg-2'></div>
            <div id='artikel' class='column col-lg-7' style='background-color:#bbb; color:Navy;'>
                <h3>Delete</h3>
                <form name='delete' method='post' action=''>
                    <button type='submit' name='deletebtn' value='del' lass='btn btn-primary' onclick="return confirm('Are you sure you want to delete?')">Delete entry</button>
                </form>
            </div>
            <div class='column col-lg-3' style=''></div>
        </div>
    </div>

    <footer></footer>
    <script type="text/javascript">

    </script>

    <script type="text/javascript" src="scripts/setdatum.js"></script>

    <script src=""></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>

      document.getElementById("reset").innerHTML = "<?php echo htmlspecialchars($contentw); ?>";
    </script>
</body>
</html>