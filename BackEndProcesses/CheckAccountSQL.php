
<?php
    function GetAccountType(){
        $db = new SQLite3('D:\xampp\Data\BubbleDatabase.db');
        $stmt = $db->prepare('SELECT AccountID FROM Users WHERE UserID=:uID');
        $stmt->bindParam(':uID', $_SESSION['uID'], SQLITE3_TEXT);

        $result = $stmt->execute();

        $rows_array = [];
        while ($row=$result->fetchArray())
        {
            $rows_array[]=$row;
        }

        
        return $rows_array[0]["AccountID"];
    }
?>