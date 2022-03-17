<?php
    function EditUser(){
        $db = new SQLite3('D:/xampp/Data/BubbleDatabase.db');
        $sql = 'UPDATE Users SET UserFirstName = :UFName, UserLastName = :ULName, UserTele = :tele, UserEmployment = :uEmp, AdvertisementPreference = :AdPref WHERE UserID = :uID';
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':UFName', $_POST['UserFirstName'], SQLITE3_TEXT);
        $stmt->bindParam(':ULName', $_POST['UserLastName'], SQLITE3_TEXT);
        $stmt->bindParam(':tele', $_POST['UserTele'], SQLITE3_TEXT);
        $stmt->bindParam(':uEmp', $_POST['UserEmployment'], SQLITE3_TEXT);
        $stmt->bindParam(':AdPref', $_POST['AdvertisementPreference'], SQLITE3_TEXT);
        $stmt->bindParam(':uID', $_SESSION['UserID'], SQLITE3_TEXT); 

        $result = $stmt->execute();

        $_SESSION["UserFName"] = $_POST["UserFirstName"];
        $_SESSION["UserLName"] = $_POST["UserLastName"];
        $_SESSION["Usertele"] = $_POST["UserTele"];
    }

?>