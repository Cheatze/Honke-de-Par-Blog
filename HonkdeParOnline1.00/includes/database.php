<?php
// $host = '';
 $username = '';
 $dsn = ;
 $password = ;

 
 try{

    $db = new PDO($dsn, $username, $password);

    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    //echo "Connected? Good.";

}catch(PDOException $ex){

    echo "Connection failed." . "<br>" . $ex->getMessage();

}

 ?>
