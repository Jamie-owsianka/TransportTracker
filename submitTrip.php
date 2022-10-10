<?php
include("header.php");

echo '<a href = "forms.php"> back</a><br>';

function validate($in){//sanitises input
    $in = trim($in);
    $in = stripslashes($in);
    $in = htmlspecialchars($in);
    return $in;
}



echo "<div id = \"mainContainer\">";
echo "<div id = \"mainContent\">";
echo "<h1> Form Submitted</h1>";
echo "<h2> Information submitted: </h2>";
echo "<div id = \"content\">";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["passengerName"])){//don't need to process if there are no passengers. 
    $passenger = $_POST["passengerName"];
    if (count($passenger) > 0){

        $driver = validate($_POST["driver"]);
        echo "<p class=\"labler\">Driver: </p>";
        echo "<p class=\"labled\"> $driver</p>";
       
        $date = validate($_POST["date"]);
        echo "<p class=\"labler\">Date: </p>";
        echo "<p class=\"labled\">$date</p>";
        
        $desination = validate($_POST["destination"]);
        echo "<p class=\"labler\"> Destination: </p>";
        echo "<p class=\"labled\">$desination</p>";
       

        for ($i = 0; $i < count($passenger); $i++){
                $passenger[$i] = validate($passenger[$i]);
                $passengerNumber = $i + 1;
                echo "<p class=\"labler\"> Passenger $passengerNumber: </p>";
                echo "<p class=\"labled\">$passenger[$i]</p>";
        }

        $journeys = $_POST["journeys"];
        for ($i = 0; $i < count($journeys); $i++){
                $journeys[$i] = validate($journeys[$i]);
                echo "<p class=\"labler\"> Journeys: </p>";
                echo "<p class=\"labled\">$journeys[$i]</p>";
        }

    }else{echo "Passenger list too empty.";}
    }else{echo "No passengers found.";}
}
echo "</div>";
echo "</div>";
echo "</div>";
?>