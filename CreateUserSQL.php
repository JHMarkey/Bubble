<?php

function createUserID(){
    $fName = substr($_POST['UserFirstName'],0 ,2);
    $lName = substr($_POST['UserLastName'],0 ,2);    
    $date = date("d");
    $ending = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

    session_start();
    $_SESSION["uID"] = strtoupper($lName.$fName.$date.$ending);
}

function checkPassword(){
    $created = false;
    $db = new SQLite3('D:/xampp/Data/BubbleDatabase.db');
    $sql = 'SELECT UserPassword FROM Users WHERE(UserPassword = :pwd)';
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':pwd', $_POST['Pwd']);

    $db->close();
    unset($db);

    $stmt->execute();

    if($stmt){
        $created = true;        
    }

    return $created;
    
}

function createUser(){    
    createUserID();

    $db = new SQLite3('D:/xampp/Data/BubbleDatabase.db');
    $created = false;
    $sql = 'INSERT INTO Users(UserID, AccountID, UserFirstName, UserLastName, UserEmail, UserPassword, Gender, UserTele, UserEmployment, AdvertisementPreference)VALUES (:uID, :aID, :uFName, :uLName, :uEmail, :uPwd, :gender, :uTele, :uEmp, :aPref);';
    $stmt = $db->prepare($sql);
    
    $stmt->bindParam(':uID',$_SESSION["uID"], SQLITE3_TEXT);    
    $stmt->bindParam(':aID',$_SESSION["AccountID"], SQLITE3_NUM);
    $stmt->bindparam(':uFName', $_POST["UserFirstName"], SQLITE3_TEXT);
    $stmt->bindParam(':uLName', $_POST["UserLastName"], SQLITE3_TEXT);
    $stmt->bindParam(':uEmail', $_POST["UserEmail"], SQLITE3_TEXT);
    $stmt->bindParam(':uPwd', $_POST["Pwd"], SQLITE3_TEXT);
    $stmt->bindParam(':gender', $_POST["Gender"], SQLITE3_TEXT);
    $stmt->bindParam(':uTele', $_POST["UserTele"], SQLITE3_TEXT);    
    $stmt->bindParam(':uEmp', $_POST["EmpStatus"], SQLITE3_TEXT);
    $stmt->bindParam(':aPref', $_POST["AdPref"], SQLITE3_TEXT);

    $_SESSION["UserFName"] = $_POST["UserFirstName"];
    $_SESSION["UserLName"] = $_POST["UserLastName"];
    $_SESSION["UserEmail"] = $_POST["UserEmail"];
    $_SESSION["pwd"] = $_POST["Pwd"];
    $_SESSION["Gender"] = $_POST["Gender"];
    $_SESSION["UserTele"] = $_POST["UserTele"];
    $_SESSION["empStatus"] = $_POST["EmpStatus"];
    $_SESSION["AdPref"] = $_POST["AdPref"];  

    $stmt->execute();
    $db->close();
    unset($db);
    
    if($stmt){
        $created = true;
    }

    return $created;
}