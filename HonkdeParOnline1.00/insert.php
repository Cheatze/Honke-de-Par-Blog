<?php 
session_start();
include_once "includes/database.php";
include_once "includes/utilities.php";


if(!isset($_SESSION['username'])){

    header('location: index.php');
}


if(isset($_POST['insertWenk'])){
    

    $wenk = $_POST['wenk'];

    $sqlInsert = "INSERT INTO wenken (wenk)
    VALUES (:wenk)";

    //use PDO prepare to sanitize data
    $statement = $db->prepare($sqlInsert);
    
    
    try {
       $statement->execute(array(':wenk' => $wenk)); 
    } catch (Exception $e) {
        echo 'and the error is: ',  $e->getMessage(), "\n";
    }

    $success = "<br><h3>Insert success!</h3>";

}

if(isset($_POST['blogPost'])){


    $year = date('y');
    $m = date('m');
    $month = monthInDutch($m);
    $day = date('d');
    //$month = "Janurari";
    $title = $_POST['title'];
    $content = $_POST['ckeditor'];

    $error = 0;

    //

    if($title==""){
        echo "<script type='text/javascript'>alert('You forgot the title');</script>";
        $error = 1;
    }elseif($content==""){
        echo "<script type='text/javascript'>alert('You forgot the content');</script>";
        $error = 1;
    }

    $Tlenght = strlen($title);
    $Clenght = strlen($content);

    if($Tlenght >= 100){
        echo "<script type='text/javascript'>alert('Die title is te lang, probeer minder dan honderd tekens.');</script>";
        $error = 1;
    }elseif($Clenght >= 4000){
        echo "<script type='text/javascript'>alert('Die post is te lang, probeer minder dan 4000 tekens.');</script>";
        $error = 1;
    }


    if($error == 0){

        $sqlInsert = "INSERT INTO blogposts (title, content, year, month, day) 
        VALUES (:title, :content, :year, :month, :day)";
    
        //use PDO prepare to sanitize data
        $statement = $db->prepare($sqlInsert);
    
        //$statement->execute(array(':Name' => $name, ':Players' => $players, 
        //':filename' => $fileToUpload, 'owner' => $owner));
    
        $statement->execute(array(':title' => $title, ':content' => $content, 
        ':year' => $year, ':month' => $month, ':day' => $day));
    
        //add another success php bit above blog form
        $success2 = "<br><h3>Insert success!</h3>";

        //or instead add a redirect
        header('location: index.php');

    }



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
    <!--<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>-->

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
                    <form name="wenken" action="https://tjitze.fc.school/insert.php" method="POST" onsubmit="return validateWenk()" enctype="">
                        <div class="form-group">
                            <label for="exampleInputDescription">Nieuwe Wenk</label>
                            <textarea name="wenk" rows="3" cols="40"></textarea>
                        </div>
                        <button type="submit" name="insertWenk" value="insertWenk"  class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>

            <!-- practically for padding -->
            <div class="column col-lg-2"></div>

        </div>
        <div class="row">

            <!-- practically for padding cols="30" rows="10" -->
            <div class="column col-lg-1" ></div>

            <div id="artikel" class="collum col-lg-10" style="background-color:#bbb; margin-top:20px;">
                <p>Nieuwe Blogpost</p>
                <div class="container" style="height: 350px;"><!--onsubmit="return validateBlogPost()"-->
                    <form name="blogposts" action="" method="POST" onsubmit="return validateBlogPost()" enctype="multipart/form-data">
                        <label for="text">Title:</label>
                        <input type="text" name="title">
                        <label for="textarea">Content:</label>
                        <textarea name="ckeditor"></textarea>
                        <button type="submit" name="blogPost" class="btn btn-primary">Submit</button>
                    </form>
                </div>   

            </div>

            
        
            <!-- practically for padding -->
            <div class="column col-lg-1" ></div>
        </div>

    </div>


    <footer></footer>
    <script type="text/javascript">

    </script>

    <script type="text/javascript" src="scripts/setdatum.js"></script>

    <script src=""></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
      CKEDITOR.replace( 'ckeditor' );
    </script>
</body>
</html>