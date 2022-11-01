<nav>
    <div class="container">
        <a href="">n.t.z.d</a>
        <a class="stripe">-</a>
        <a href="index.php">blog</a>
        <a class="stripe">-</a>
        <a href="oudewenken.php">oude wenken</a>
        <a class="stripe">-</a>
        <a href="info.php">het waarom</a>
        <?php
              if(isset($_SESSION['username'])){
                echo '<a class="stripe">-</a>';
                echo '<a href="insert.php"> Insert </a>';
                echo '<a class="stripe">-</a>';
                echo '<a href="logout.php"> Logout</a>';
              }
              if(!isset($_SESSION['username'])){
                echo '<a class="stripe">-</a>';
                echo '<a href="login.php"> Login</a>';
              }
        ?>
    </div>
</nav>