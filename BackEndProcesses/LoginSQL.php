<?php
    function verifyUsers () {
        if (!isset($_POST['email']) or !isset($_POST['pwd'])) {
            return;  
        }

        $db = new SQLite3('D:\xampp\Data\BubbleDatabase.db');
        $stmt = $db->prepare('SELECT UserID, AccountID, UserFirstName, UserLastName, UserEmail, UserPassword, Gender, UserTele, UserEmployment, AdvertisementPreference FROM Users WHERE UserEmail=:email AND UserPassword=:pwd');
        $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
        $stmt->bindParam(':pwd', $_POST['pwd'], SQLITE3_TEXT);       

        $result = $stmt->execute();

        $rows_array = [];
        while ($row=$result->fetchArray())
        {
            $rows_array[]=$row;
        }

        session_start();
        $_SESSION["uID"] = $rows_array[0]["UserID"];
        $_SESSION["accountID"] = $rows_array[0]["AccountID"];
        $_SESSION["UserFName"] = $rows_array[0]["UserFirstName"];
        $_SESSION["UserLName"] = $rows_array[0]["UserLastName"];
        $_SESSION["UserEmail"] = $rows_array[0]["UserEmail"];
        $_SESSION["pwd"] = $rows_array[0]["UserPassword"];
        $_SESSION["Gender"] = $rows_array[0]["Gender"];
        $_SESSION["UserTele"] = $rows_array[0]["UserTele"];
        $_SESSION["empStatus"] = $rows_array[0]["UserEmployment"];
        $_SESSION["AdPref"] = $rows_array[0]["AdvertisementPreference"];        

        $db->close();
        unset($db);
        return $rows_array;
    }
?>
