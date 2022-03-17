<?php    
    require("../Templates/Head.php");
    session_start();
    require("../Templates/LoggedHeader.php");
    require("../backEndProcesses/EditUserSQL.php");
    
    $errorfname = $errorlname = $errortele = "";
    $allFields = true; 

    if (isset($_POST['confirm'])) {        
        if ($_POST['UserFirstName'] == "") {
            $errorfname = "First name is mandatory";
            $allFields = false;
        }
        if ($_POST['UserLastName'] == "") {
            $errorlname = "Last name is mandatory";
            $allFields = false;
        }        
        if ($_POST['UserTele'] == "") {
            $errortele = "Telephone is mandatory";
            $allFields = false;
        }        
        if ($allFields) {            
            EditUser();
            header("Location: ProfilePage.php");          
        }
    }
?>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit User</h3>
                        <form method = "post">

                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" id="UserFirstName" class="form-control form-control-lg" name ="UserFirstName" value=<?php echo($_SESSION["UserFName"]) ?> />
                                        <label class="form-label" for="UserFirstName">First Name</label>
                                        <span style="color:red"><?php echo $errorfname; ?></span>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" id="UserLastName" name ="UserLastName" class="form-control form-control-lg" value=<?php echo($_SESSION["UserLName"])?> />
                                        <label class="form-label" for="UserLastName">Last Name</label>
                                        <span style="color:red"><?php echo $errorlname; ?></span>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2" >
                                    <div class="form-outline">
                                        <input type="tel" id="UserTele" name ="UserTele" class="form-control form-control-lg" value=<?php echo($_SESSION["UserTele"])?> />
                                        <label class="form-label" for="UserTele">Phone Number</label>
                                        <span style="color:red"><?php echo $errortele; ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">

                                    <select class="select form-control-lg" name="EmpStatus">
                                        <option value="1" disabled>Employment Status</option>
                                        <option value="Emp">Currently Employed</option>
                                        <option value="NotEmp">Currently Unemployed</option>
                                        <option value="NoLook">Not Looking For Job Opportunites</option>
                                        <option value="PreferNot">Prefer Not to Say</option>
                                    </select>
                                    <label class="form-label select-label">Employment Status</label>

                                </div>
                            </div>

                            <div class="row" sytle="padding-top:25px">
                                <div class="col-12" style="padding-top:25px">

                                    <select class="select form-control-lg" name="AdPref">
                                        <option value="1" disabled>Advertisments</option>
                                        <option value="Show">Show Ads</option>
                                        <option value="Hide">Hide Ads</option>                    
                                    </select>
                                    <label class="form-label select-label">Advertisments</label>

                                    <div class="mt-4 pt-2">
                                        <input class="btn btn-primary btn-lg" type="submit" value="Submit" id="confirm" name="confirm"/>
                                    </div>
                                </div>
                            </div>            
                        </form>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>