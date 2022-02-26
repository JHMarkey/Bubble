<?php 
    require("../Templates/Head.php");
    require("../Templates/Header.php");

session_start();
$result = $_SESSION['uID'];
?>

<div class="container pb-5">
    <main role="main" class="pb-3">
       <h2>User Creation Result</h2><br>

    <div style = "height: 300px;">
        <?php
            if($result){
                echo "Successfully created new user, you User Name is: ".$_SESSION["uID"];
            }
            else{
                echo "Error";
            }
        ?>
        <div><a href="ProfilePage.php">View Profile</a></div>
    </div>
</div>

<?php
    require("../Templates/Footer.php");
?>