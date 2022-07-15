<?php
    $filename = "../projects.json";
    $json = file_get_contents($filename);
    $jsonData = json_decode($json,TRUE);
    $projects = $jsonData[0];

    //Loop to loop through each project
    foreach($projects as $projectTitle => $project){
        echo '
        <div class="project">
                <div class="projectTitle">
                    <h3>'.$projectTitle.'</h3>
                    <h3>Project Admin: '.$project["projectAdmin"].'</h3>
                </div>
                <div class="investors">
                    <div class="existing">
                        <h3>Existing</h3>
        ';

         //Loop to loop through each existing investor and display as Investor Card
        foreach($project["investors"]["existing"] as $investorname => $investor){
            echo '<div class="investorCard" id="existing">
                            <h3 id="investorName">'.$investorname.'</h3>
                            <h3 id="investorAmount">Amount Invested: '.$investor["amount"].'</h3>
                        </div>';
        }

        echo '</div>
                    <div class="potential">
                        <h3>Potential</h3>
        ';
        
         //Loop to loop through each potential investor and display as Investor Card
        foreach($project["investors"]["potential"] as $investorname => $investor){
            echo '<div class="investorCard" id="potential">
                            <h3 id="investorName">'.$investorname.'</h3>
                            <h3 id="investorAmount">Expected Amount '.$investor["amount"].'</h3>
                        </div>';
        }
        echo '</div>
                </div>
            </div>';          
                    
    }
?>