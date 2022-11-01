<?php 
session_start();

include_once "includes/database.php";
include_once "includes/utilities.php";


if(isset($_POST['loginBtn'])){

    //array to hold errors
    $form_errors = array();

    //validate
    $required_fields = array('username', 'password');
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    if(empty($form_errors)){

        //collect form data
        $user = $_POST['username'];
        $password = $_POST['password'];

        //check if user exists in the database
        $sqlQuery = "SELECT * FROM user WHERE username = :username";

        $statement = $db->prepare($sqlQuery);
        $statement->execute(array(':username' => $user));

        if($row = $statement->fetch()){

            $id = $row['id'];
            $hashed_password = $row['password'];
            $username = $row['username'];

            if(password_verify($password, $hashed_password)){
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;
                header("location: index.php");
            }else{
                $result = "<p class='regerror'>Invalid username or password<p>";
            }
        }else{
            $result = "<p class='regerror'>Invalid username or password<p>";
        }
    }else{
        if(count($form_errors)==1){
            $result = "<p class='error'>There was one error in the form </p>";
        }else{
            $result = "<p class='error'>There were " . count($form_errors) . " errors in the form </p>";
        }
    }
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
            <div class="column col-lg-2" ></div>
        <!--<section>-->
            <div id="artikel" class="column col-lg-7">

                <div class="container">
                    <?php 
                        if(isset($result)) echo $result; 
                        if(!empty($form_errors)) echo show_errors($form_errors);
                    ?>
                </div>

                <form method="post" action="">
                    <div class="form-group ml-20px">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                    </div>
                    <button type="submit" name="loginBtn" class="btn btn-primary">Submit</button>
                </form>
                
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