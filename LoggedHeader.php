<?php
  require("../BackEndProcesses/CheckAccountSQL.php");
?>

<body style = "margin-top: 0">
  <div class = "header">
    <div class="inner_header">
      <div class="logo_container">
        <h1>Bubble</h1>
      </div>
      <ul class = "navigation">
        <a href = "ProfilePage.php"><li>View Profile</li></a>        
	    </ul>
      <ul class = "navigation">
       
      <?php
        $ID = GetAccountType();
        if ($ID = 5){
          echo("<a href = \"AdminPage.php\"><li>Admin Page</li></a> ");
        } else if ($ID != 1){
          echo("<a href = \"EditUserPage.php\"><li>View Analytics</li></a> ");
        }
      ?>
      </ul>
    </div>
  </div>