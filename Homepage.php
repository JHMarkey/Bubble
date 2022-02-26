<?php
    require("../Templates/Head.php");
    include("../BackEndProcesses/LoginSQL.php");
    if(isset($_SESSION['AccountID'])){
        session_abort();
    }
    
$errorpwd = $erroremail = "";

if (isset($_POST['submit'])) {

    if ($_POST["email"] == "") {
        $message = "Please Input Email Address.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } 
      
    if ($_POST["pwd"] == "") {
        $message = "Please Input Password.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }


    if($_POST["pwd"] != "" && $_POST["email"] != ""){
        $array_user = verifyUsers(); 
        if ($array_user != null) {
            
        $_SESSION['email'] = $array_user[0]['UserEmail'];
        $_SESSION['pwd'] =$array_user[0]['UserPassword'];
        
               
        header("Location: ProfilePage.php"); 
        exit();              
        }
        else{
            $message = "Incorrect Email Address or Password.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}
?>

<Body>
    <div class="welcome_page_container">
        <div class="inner_container">
            <div class="wrapper">
                <div class="logo_container">
                    <h1>Bubble</h1>
                </div>
                <div class="tag_container">
                    <h1>Create a bubble with all the people you love.</h1>
                </div>
            </div>
            <div class="login_container">   
                <div class="bubble">
                <div id="login">                    
                    <div class="container">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-6">
                                <div id="login-box" class="col-md-12">                                    
                                    <form id="login-form" class="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="email" class="text-info" style="color:black">Email:</label><br>
                                            <input type="text" name="email" id="email" class="form-control">
                                            <span class="text-danger"><?php echo $erroremail; ?></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="text-info" style="color:black">Password:</label><br>
                                            <input type="text" name="pwd" id="pwd" class="form-control">
                                            <span class="text-danger"><?php echo $errorpwd; ?></span>
                                        </div>                                        
                                        <div class="form-group col-md-5">
                                            <input class="btn btn-primary" type="submit" value="Login" name="submit" style="width: 100px">                                            
                                        </div>
                                    </form>
                                    <div id="register-link" class="text-right">
                                        <a href="CreateUserPage.php" class="text-info">Register here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class = "business_account">
                    <span><a href="PaymentPlanPage.php">Create a Page</a></span> for a Brand.
                </div>
            </div>
        </div>
    </div>
    

    <?php
        require("../Templates/Footer.php");
    ?>
