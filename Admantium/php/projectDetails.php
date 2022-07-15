<?php
    session_start();
    $padmin = $_SESSION["username"];
    $projectname = $_SESSION["projectname"];
    $filename = '../projects.json';
    $json = file_get_contents($filename);
    $jsonData = json_decode($json, true);
    $projectDetails = $jsonData[0][$projectname];
    echo '<div class="projectTitle">
                <span id="projTitle">'.$projectname.'</span>
            </div>
            <div class="existingInvestors">
                <h2>Existing Investors</h2>';
    $existing = $projectDetails["investors"]["existing"];
    
     //Loop to loop through each existing investor and display as Investor Card
    foreach($existing as $investorName => $investment){
        echo '<div class="investorCard" id="existing">
                    <h4>'.$investorName.'</h4>
                    <h4>Amount Invested: '.$investment["amount"].'</h4>
                </div>';
    }
    echo '</div>
            <div class="potentialInvestors">
                <h2>Potential Investors</h2>';
    $potential = $projectDetails["investors"]["potential"];
    
    //Loop to loop through each potential investor and display as Investor Card
    foreach($potential as $investorName => $investment){
        echo '<div class="investorCard" id="potential">
                    <h4>'.$investorName.'</h4>
                    <h4>Amount Expected: '.$investment["amount"].'</h4>
                    <button id="'.$investorName.'" onclick="amountReceived(this.id)">Amount Received</button>
                </div>';
    }
    echo '</div>';
?>