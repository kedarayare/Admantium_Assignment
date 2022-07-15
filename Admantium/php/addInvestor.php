<?php  
    session_start();
    $investorName = $_GET["investorName"];
    $amount = $_GET["amount"];
    $projectName = $_GET["projectName"];
    $filename = '../projects.json';
    $json = file_get_contents($filename);
    $jsonData = json_decode($json, true);
    $temArry = array('amount' => $amount);
    $jsonData[0][$projectName]["investors"]["potential"][$investorName] = $temArry;
    $jsonData = json_encode($jsonData);
    file_put_contents($filename,$jsonData);
?>