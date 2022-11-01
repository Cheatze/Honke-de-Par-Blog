<?php 
session_start();
include_once "includes/database.php";

//number of entries shown on a page
$results_per_page = 7;

if (isset ($_GET['page']) ) { 
    $page = $_GET['page'];  
} else {  
    $page = 1;   
}  

//determine the sql LIMIT starting number for the results on the displaying page  
$start_from = ($page-1) * $results_per_page;   

//Try : ORDER BY id DESC
//$query2 = "SELECT * FROM wenken";
$query2 = "SELECT * FROM wenken ORDER BY id DESC  LIMIT $start_from, $results_per_page"; 

//retrieve results from query
$Rowresult = $db->query($query2);

//get number of results
$number_of_result = $Rowresult->rowCount();

//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://kit.fontawesome.com/5b145bfb33.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="styles/style.css">

    <link rel="stylesheet" href="style/pagination.css">

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

                <div class="container">

                    <br>
                    <div>
                        <h1></h1>

                        <table class="table table-striped table-condensed table-bordered">

                            <thead>
                                <tr>
                                    <th><h4>Oude wenken</h4> </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach($db->query($query2) as $roww){
                                    $wenko = $roww['wenk'];
                                    $idw = $roww['id'];
                                ?>
                                <tr>
                                    <td>
                                        <?php 
                                            if(isset($_SESSION['username'])){
                                                echo "<a href='editwenk.php?id=$idw' style='color: green;'>$wenko</a><br>";
                                                //echo "<p style='color:blue;'>$wenko</p>";
                                            }else{
                                                echo "<p>$wenko</p>";
                                            }
                                        ?>
                                        
                                    </td>
                                </tr>
                                <?php }
                                ?>
                            </tbody>

                        </table>

                        <div class="pagination">
                            <?php
                                $query3 = "select count(*) from wenken"; 
                                $result = $db->query($query3);
                                $number_of_result = $result->rowCount();
                                $total_records = count($row);
                                
                                $sql = "SELECT count(*) FROM wenken"; 
                                $result2 = $db->prepare($sql); 
                                $result2->execute(); 
                                $number_of_rows = $result->fetchColumn(); 
                                //echo "<br>Total from new query = $number_of_rows";
                                
                                $total_records = $number_of_rows;
                                //echo "<br>TR = $total_records";

                                echo "<br>";

                                // Number of pages required.
                                //$total_pages should be more than 1
                                //But it is 1 later on
                                //echo "<br>Total records = $total_records";
                                $total_pages = ceil($total_records / $results_per_page);     
                                $pagLink = "";   

                                
                                if($page>=2){   
                                    echo "<a href='oudewenken.php?page=".($page-1)."'>  Prev </a>";   
                                } 

                                for($i=1; $i<=$total_pages; $i++){
                                    if($i == $page){
                                        $pagLink = "<a class = 'active' href='oudewenken.php?page="  
                                        .$i."'>".$i." </a>";  
                                    }else{
                                        $pagLink .= "<a href='oudewenken.php?page=".$i."'>   
                                        ".$i." </a>";  
                                    }
                                };

                                echo $pagLink;
                                
                                //two test echos
                                //echo "<br>before if, tp = $total_pages";
                                if($page<$total_pages){
                                    //echo "<br>Inside this if";
                                    echo "<a href='oudewenken.php?page=".($page+1)."'>  Next </a>";  
                                }
                            ?>
                        </div>

                        <div class="inline">
                            <input id="page" type="number" min="1" max="<?php echo $total_pages ?>"
                            placeholder="<?php echo $page.'/'.$total_pages; ?>" required>
                            <button onClick="go2Page();">Go</button>
                        </div>

                    </div>

                </div>

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

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script>
    function go2Page(){
        var page = document.getElementById("page").value;
        page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
        window.location.href = 'oudewenken.php?page='+page;  
      }
    </script>
</body>
</html>