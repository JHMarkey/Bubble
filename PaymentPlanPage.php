<?php    
    require("../Templates/Head.php");
    require("../Templates/Header.php");
    session_start();
?>
<section class="vh-100 gradient-custom">
    <div style="padding-top: 200px">
        <div class="text-center">
            <div class="container">
                <div class="row pt-4">
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Basic</h4>
                            </div>
                            <div class="card-body">
                                <h1><b>$0 </b><small class="text-muted">/ mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Use us to Advertise</li>
                                    <li>Analytics on Posts</li>
                                    <li>Email support</li>
                                    <li>Help center access</li>
                                </ul>                                 
                                <a href="CreateBusinessAccountPage.php?AccountID=2">Sign Up For Free</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Advanced</h4>
                            </div>
                            <div class="card-body">
                                <h1><b>$15 </b><small class="text-muted">/ mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Stay Up to Date with Competetors</li>
                                    <li>Advanced analytics</li>
                                    <li>Priority email support</li>
                                    <li>Help center access</li>
                                </ul> 
                                <?php                                    
                                    $_SESSION['AccountID'] = 3;
                                ?>
                                <a href="CreateBusinessAccountPage.php?AccountID=3">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-header">
                                <h4 class="my-0 font-weight-normal">Premium</h4>
                            </div>
                            <div class="card-body">
                                <h1><b>$29 </b><small class="text-muted">/ mo</small></h1>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>Priorty on Posts</li>
                                    <li>Premium Analytics</li>
                                    <li>Phone and email support</li>
                                    <li>Help center access</li>
                                </ul> 
                                <?php                                    
                                    $_SESSION['AccountID'] = 4;
                                ?>
                                <a href="CreateBusinessAccountPage.php?AccountID=4">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    require("../Templates/Footer.php");
?>