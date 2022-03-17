<?php
    function sendPost(){
        $time = date("d/M/Y");

        $db = new SQLite3('D:\xampp\Data\BubbleDatabase.db');
        $stmt = $db->prepare('INSERT INTO Posts (UserID, PostContent, PostTime) VALUES (:uID, :content, :time)');
        $stmt->bindParam(':uID', $_SESSION["uID"], SQLITE3_TEXT);
        $stmt->bindParam(':content', $_POST["PostArea"], SQLITE3_TEXT);
        $stmt->bindParam(':time', $time, SQLITE3_TEXT);

        $stmt->execute();
    }

    function getFriends(){
        $db = new SQLite3('D:/xampp/Data/Bubbledatabase.db');
        $stmt = $db->prepare('SELECT Friend2ID FROM Friends, Relationships WHERE Friend1ID = :uID AND Friends.RelationshipID = Relationships.RelatioshipID ORDER BY Relationships.RelationshipStrength DESC');
        $stmt->bindParam(':uID', $_SESSION["uID"], SQLITE3_TEXT);
        
        $result = $stmt->execute();
        
        $rows_array = [];
        while ($row=$result->fetchArray())
        {
            $rows_array[]=$row;
            
        }

        return $rows_array;
    }

    function getPost(){
        $friends = getFriends();
        for($i = 0; $i <count($friends); $i++){
            $db = new SQLite3('D:/xampp/Data/Bubbledatabase.db');
            $stmt = $db->prepare('SELECT PostContent, Posts.UserID, PostTime, Status, Users.UserFirstName, Users.UserLastName FROM Posts, Users WHERE Posts.UserID = :uID AND Posts.UserID = Users.UserID');
            $stmt->bindParam(':uID', $friends[$i]["Friend2ID"], SQLITE3_TEXT);
            
            $result = $stmt->execute();
            $numPosts = 0;
            $rows_array = [];
            while ($row=$result->fetchArray())
            {
                $rows_array[]=$row;
                $numPosts++;
            }
        }        

        $_SESSION["nPosts"] = $numPosts;
        return $rows_array;
    }

    
?>