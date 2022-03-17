<?php
    function verifyUser(){
        $db = new SQLite3('D:/xampp/Data/BubbleDatabase.db');
        $sql = 'UPDATE Users SET Verified = True WHERE UserID = :uID';
        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':uID', $_SESSION['uID']); 

        $result = $stmt->execute();    

        $rows_array = [];
        while ($row=$result->fetchArray())
        {
            $rows_array[]=$row;
        }

        return $rows_array;
    }

    

?>
