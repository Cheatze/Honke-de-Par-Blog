<?php

//retrieve the entry with the highest year and asign that year to a variable

$queryY = "SELECT * FROM blogposts ORDER BY year DESC LIMIT 1";
$statement = $db->prepare($queryY);
$statement->execute(array());
$row = $statement->fetch();
$year = "";
if($row!=""){
    $year = $row["year"];
}

//sql query where month is month and year is year
//loop through the years and then the month and then a query for each month


?>
<div class="container">
    <br>
    <div>
        <table>
            <tbody>
                <?php
                    for($y = $year; $y >= 2022; $y--){
                        
                        echo "<p style='color: orangered; margin:0;padding-top:20px;'>$y</p>";
                        for($m = 1; $m <= 12; $m++){
                            $t = 1;
                            $month = monthInDutch($m);
                            
                            $query2 = "SELECT * FROM blogposts WHERE month = '$month' and year = '$y' ORDER BY id DESC";

                            foreach($db->query($query2) as $row) {
                                $title = $row['title'];
                                $id = $row['id'];
                                if($t == 1 && $month==$row['month']){
                                    echo "<p style='color: orangered; padding-top:25px;'>$month</p>";
                                    $t = 0;
                                }
                                echo "<a href='oldpost.php?id=$id' style='color: green;'>$title</a><br>";
   
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>