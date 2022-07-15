<?php
    session_start();
    $username = $_GET["username"];
    $password = $_GET["password"];
    $role = $_GET["role"];
    $filename = '../'.$role.'Admin.json';
    // echo $filename;
    $json = file_get_contents($filename);
    $jsonData = json_decode($json,TRUE);
    $Admins = $jsonData[0];
    // print_r($Admins);
    if(array_key_exists($username,$Admins)){
        if($Admins[$username]["password"] == $password){
            $_SESSION["role"] = $role;
            $_SESSION["username"] = $username;
            if($role == "project"){
                $_SESSION["projectname"] = $Admins[$username]["project"];
            }
            echo "Success"; 
        }

        else{
            echo "Incorrect Password";
        }
    }
    else{
        echo "No Such User";
    }
    
?>