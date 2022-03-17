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
        <a href = "FeedPage.php"><li>View Feed</li></a>        
	    </ul>

      <ul class = "navigation">       
        <?php
        try{
          
          $ID = GetAccountType();
          echo($ID);

          if ($ID == 5){
            echo("<a href = \"AdminPage.php\"><li>Admin Page</li></a> ");
          } else if ($ID != 1){
            echo("<a href = \"EditUserPage.php\"><li>View Analytics</li></a> ");
          }
          
        }catch(Exception $e){}   
        ?>
        <a href = "Homepage.php"><li>Logout</li></a> 
      </ul>
    </div>
  </div>