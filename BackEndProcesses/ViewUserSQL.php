<?php

function getUsers (){
    $db = new SQLite3('D:/xampp/Data/BubbleDatabase.db');
    $sql = "SELECT * FROM Users";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();

    $arrayResult = [];
    while ($row = $result->fetchArray()){
        $arrayResult [] = $row;
    }
    return $arrayResult;
}