<?php 
    require("../Templates/Head.php");
    require("../Templates/AdminPageHeader.php");

$uID = $_GET['uid'];
$db = new SQLite3('D:/xampp/Data/BubbleDatabase.db');
$sql = "SELECT UserID, UserFirstName, UserLastName FROM Users WHERE UserID = :uID";

$stmt = $db->prepare($sql);
$stmt->bindParam(':uID', $uID, SQLITE3_TEXT);

$Result = $stmt->execute();
$arrayResult = [];

while ($row = $Result->fetchArray()) {
    $arrayResult [] = $row;
}

if (isset($_POST['delete'])) {

    $db = new SQLite3('D:/xampp/Data/BubbleDatabase.db');

    $stmt = "DELETE FROM Users WHERE UserID = :uID";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':uID', $uID, SQLITE3_TEXT);

    $sql->execute();
    header("Location:AdminPage.php");
}

?>


<div class="gradient-custom" style="padding-top:3%; padding-bottom:5px;">    
    <div class="container emp-profile" style="margin-top:0;">
        <h2>Delete User <?php echo $uID; ?></h2><br>
        <h4 style="color: red;">Are you sure want to delete this user?</h4><br>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">First Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0]['UserFirstName']?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 f">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Last Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0]['UserLastName']?></label>
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <form method="post">
                    <input type="hidden" name="uid" value="<?php echo $uID ?>"><br>
                    <input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="AdminPage.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
    require("../Templates/Footer.php");
?>