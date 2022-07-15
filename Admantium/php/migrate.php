<?php
    $investorNAme = $_GET["investorName"];
    $projectName = $_GET["projectName"];

    $filename = '../projects.json';
    $json = file_get_contents($filename);
    $jsonData = json_decode($json, true);
    
    $projectDetails = $jsonData[0][$projectName]["investors"]["potential"];
    $temp = $jsonData[0][$projectName]["investors"]["potential"][$investorNAme];
    unset($jsonData[0][$projectName]["investors"]["potential"][$investorNAme]);
    $jsonData[0][$projectName]["investors"]["existing"][$investorNAme] = $temp;
    $jsonData = json_encode($jsonData);
    file_put_contents($filename,$jsonData);
    
    
?>