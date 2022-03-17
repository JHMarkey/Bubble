<?php
    function verifyPost($postID){
        $status = "verified";

        $db = new SQLite3('D:/xampp/Data/Bubbledatabase.db');
        $stmt = $db->prepare('UPDATE Posts SET status = :status WHERE PostID = :pID');
        $stmt->bindParam(':pID', $postID, SQLITE3_TEXT);
        $stmt->bindParam(':status', $status, SQLITE3_TEXT);

        $stmt->execute();
    }

    function getUsers (){
        $db = new SQLite3('D:/xampp/Data/BubbleDatabase.db');
        $sql = "SELECT * FROM Posts";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute();
    
        $arrayResult = [];
        while ($row = $result->fetchArray()){
            $arrayResult [] = $row;
        }  
        return $arrayResult;  
    }
?>