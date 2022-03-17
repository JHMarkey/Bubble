<?php 
    require("../Templates/Head.php");
    require("../Templates/AdminPageHeader.php");
    include("../BackEndProcesses/ViewUserSQL.php");
?>

<div class="container pb-5">
    <main role="main" class="pb-3">
        <h2 class = "title" style = "padding-top:25px">View Users</h2><br>
				<div class="row">
            <div class="col-10">
                <table class="table table-striped">
                    <thead>   
                        <td>Action</td>                    
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Password</td>
                        <td>Email</td>
                        <td>Gender</td>
                        <td>Telephone</td>
                        <td>AccountID</td>
                        <td>Ad Preference</td>    
                        <td>Employment Status</td>       
                        <td>Verified</td>               
                    </thead>

                    <?php
                        $user = getUsers();                        
                        for ($i=0; $i<count($user); $i++):
                            $uID = $user[$i]['UserID'];
                    ?>
                    <tr>  
                              
                        <td>                                                   
                            <a href="DeleteUser.php?uid=<?php echo $uID; ?>">Delete</a>                        
                        </td>          
                        <td><?php echo $user[$i]['UserFirstName']?></td>
                        <td><?php echo $user[$i]['UserLastName']?></td>
                        <td><?php echo $user[$i]['UserPassword']?></td>
                        <td><?php echo $user[$i]['UserEmail']?></td>
                        <td><?php echo $user[$i]['Gender']?></td>
                        <td><?php echo $user[$i]['UserTele']?></td>
                        <td><?php echo $user[$i]['AccountID']?></td>
                        <td><?php echo $user[$i]['AdvertisementPreference']?></td>
                        <td><?php echo $user[$i]['UserEmployment']?></td>	
                        <td><?php echo $user[$i]['Verified']?></td>						
                    </tr>
                    <?php endfor;?>
                </table>    
            </div>
        </div>	  
   </main>
</div>

<?php
    require("../Templates/Footer.php");
?>