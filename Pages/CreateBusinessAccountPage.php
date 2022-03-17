<?php    
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception; 
     
    require ('../PHPMailer-master/src/Exception.php'); 
    require ('../PHPMailer-master/src/PHPMailer.php'); 
    require ('../PHPMailer-master/src/SMTP.php'); 
    require("../Templates/Head.php");
    require("../Templates/Header.php");
    include("../BackEndProcesses/CreateBusinesssAccountSQL.php");
    $errorconame  = $errorpwd = $erroremail = $errortele = "";
    $allFields = true;
    $_SESSION['AccountID'] = $_GET['AccountID'];
    $filler = "Business"; ;
    $errorfname = $errorlname = $errorpwd = $erroremail = $errortele = "";
    $allFields = true; 

    if (isset($_POST['confirm'])) {   
        session_start();
        echo($_SESSION["uID"]." ".$_GET["AccountID"]." ".$_POST["UserFirstName"]." ".$filler." ". $_POST["UserEmail"]." ".$_POST["Pwd"]." ".$filler." ".$_POST["UserTele"]." ".$_POST["EmpStatus"]." ".$filler);     
        if ($_POST['UserFirstName'] == "") {
            $errorfname = "First name is mandatory";
            $allFields = false;
        }
        if ($_POST['Pwd'] == "") {
            $errorpwd = "Password is mandatory";
            $allFields = false;
        }
        if (!checkPassword()) {
            $errorpwd = "Password already in use.";
            $allFields = false;
        }
        if ($_POST['UserTele'] == "") {
            $errortele = "Telephone is mandatory";
            $allFields = false;
        }
        if ($_POST['UserEmail'] == "") {
            $erroremail = "Email Address is mandatory";
            $allFields = false;
        }
        if ($allFields) {
            $mail = new PHPMailer; 
 
            $mail->isSMTP();                            // Set mailer to use SMTP 
            $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers 
            $mail->SMTPAuth = true;                     // Enable SMTP authentication 
            $mail->Username = 'BubbleMSMA@gmail.com';   // SMTP username 
            $mail->Password = 'Bubble&123';             // SMTP password 
            $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted 
            $mail->Port = 587;                          // TCP port to connect to 

            $mail->setFrom('BubbleMSMA@gmail.com', 'Bubble'); 
            $mail->addReplyTo('BubbleMSMA@gmail.com', 'Bubble');

            $mail->addAddress($_POST['UserEmail']);     

            $mail->isHTML(true); 

            $mail->Subject = 'User Verification'; 

            $mail_content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                     <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        </head>
                        <body>
                            <div>
                                <p>' . $_POST["UserFirstName"] . ', thank you for registering to Bubble .</p>
                                <p>Please click the following link to proceed to the Confirmation Page "<a href ="http://localhost/Dashboard/bubble/pages/userCreationSummary.php">www.Bubble.com</a>"</p>
                            </div>
                        </body>
                     </html>';
            
            $mail->Body = $mail_content;
            


            session_start();
            $_SESSION['AccountID'] = 1;
            
            if($mail->send()){
                $createUser = createUser();
                header('Location: VerifyUserPage.php');
            }
            else{
                $erroremail = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;           
            }
        }
    }
?>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                        <form method = "post">

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="UserFirstName" class="form-control form-control-lg" name ="UserFirstName"/>
                                        <label class="form-label" for="UserFirstName">Company Name</label>
                                        <span style="color:red"><?php echo $errorconame; ?></span>
                                    </div>
                                </div>    
                                
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="password" class="form-control form-control-lg"  id="Pwd" name ="Pwd" />
                                        <label for="Pwd" class="form-label">Password</label>
                                        <span style="color:red"><?php echo $errorpwd; ?></span>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="email" id="UserEmail" name ="UserEmail" class="form-control form-control-lg" />
                                        <label class="form-label" for="UserEmail">Email</label>
                                        <span style="color:red"><?php echo $erroremail; ?></span>
                                    </div>

                                </div>
                                    <div class="col-md-6 mb-4 pb-2" >

                                    <div class="form-outline">
                                        <input type="tel" id="UserTele" name ="UserTele" class="form-control form-control-lg" />
                                        <label class="form-label" for="UserTele">Phone Number</label>
                                        <span style="color:red"><?php echo $errortele; ?></span>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <select class="select form-control-lg" name="EmpStatus">
                                        <option value="1" disabled>Employment Status</option>
                                        <option value="Employing">Currently Employing</option>
                                        <option value="NotEmploying">Currently Not Employing</option>
                                    </select>
                                    <label class="form-label select-label">Employing Status</label>
                                </div>
                            </div>

                            <div class="row" sytle="padding-top:25px">                                
                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" id="confirm" name="confirm"/>
                                </div>
                            </div>      
                        </form>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>