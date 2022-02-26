<?php    
    require("../Templates/Head.php");
    require("../Templates/Header.php");
    include_once("../BackEndProcesses/CreateUserSQL.php");
    $errorfname = $errorlname = $errorpwd = $erroremail = $errortele = "";
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
            session_start();
            $_SESSION['AccountID'] = 1;
            $createUser = createUser();
            header('Location: userCreationSummary.php');
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
                                        <label class="form-label" for="UserFirstName">First Name</label>
                                        <span style="color:red"><?php echo $errorfname; ?></span>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <input type="text" id="UserLastName" name ="UserLastName" class="form-control form-control-lg" />
                                        <label class="form-label" for="UserLastName">Last Name</label>
                                        <span style="color:red"><?php echo $errorlname; ?></span>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline w-100">
                                        <input type="password" class="form-control form-control-lg"  id="Pwd" name ="Pwd" />
                                        <label for="Pwd" class="form-label">Password</label>
                                        <span style="color:red"><?php echo $errorpwd; ?></span>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <h6 class="mb-2 pb-1">Gender: </h6>

                                    <div class="form-check form-check-inline">
                                        <input
                                             class="form-check-input"
                                            type="radio"
                                            name="Gender"
                                            id="femaleGender"
                                            value="Female"
                                            checked
                                        />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input
                                        class="form-check-input"
                                        type="radio"
                                        name="Gender"
                                        id="maleGender"
                                        value="Male"
                                        />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input
                                        class="form-check-input"
                                        type="radio"
                                        name="Gender"
                                        id="otherGender"
                                        value="Other"
                                        />
                                        <label class="form-check-label" for="otherGender">Other</label>
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