<header class="navbar-header">
    <div class="navbar-left">
        <?php
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['type'] == 2){
                echo '<a href="index.php?action=users">List of users</a>';
            }
        }
        ?>
        <a href="index.php" >List of books</a>
    </div>


    <div class="navbar-right">
        <?php
        if(isset($_SESSION['user'])){
            echo "<a>". $_SESSION['user']['firstname']. " " . $_SESSION['user']['lastname']."</a>";
            echo '<a href="index.php?action=disconnect&type=disconnect" >Disconnect</a>';
        }else{
            echo '<a href="index.php?action=login&type=login" >Login</a>'.
                 '<a href="index.php?action=register&type=register" >Register</a>';
        }
        ?>

    </div>

</header>
