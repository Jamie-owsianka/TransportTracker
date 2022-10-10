<?php
include("header.php");
?>

<script>
function addPassenger(){//sets up a box to add an additional passenger
    var contentDiv =  document.getElementById('passengerArea');

    var passengerDiv = document.createElement("div");
    passengerDiv.className = "passengerDiv";
    contentDiv.appendChild(passengerDiv);

    var nameLabel = document.createElement("label");
    nameLabel.innerHTML = "Passenger";    
    passengerDiv.appendChild(nameLabel);

    passengerDiv.appendChild(document.createElement("br"));

    var nameInput = document.createElement("input");
    nameInput.type = "text";
    nameInput.className = "input";    
    nameInput.name = "passengerName[]";
    passengerDiv.appendChild(nameInput);

    passengerDiv.appendChild(document.createElement("br"));

    var nameLabel2 = document.createElement("label");
    nameLabel2.innerHTML = "Number of Journeys";    
    passengerDiv.appendChild(nameLabel2);

    passengerDiv.appendChild(document.createElement("br"));

    var dropDown = document.createElement("select");
    passengerDiv.appendChild(dropDown);
    dropDown.style = "background-color: #ffffff;";
    dropDown.name = "journeys[]";
    for (let i = 1; i < 5; i++) {
        var option = document.createElement("option");
        option.innerHTML = i;
        option.value  = i;     
        dropDown.appendChild(option);
    } 

    var deleteButton = document.createElement("button");
    deleteButton.innerHTML = "Remove";
    deleteButton.type = "button";
    deleteButton.onclick = function() {removePassenger(passengerDiv)};
    deleteButton.className = "deleteButton";
    passengerDiv.appendChild(deleteButton);
}
    
function removePassenger(contentDiv){//removes a passenger
    contentDiv.parentNode.removeChild(contentDiv);
}
    
function changed(){ //checks for a change in selector and adds textinput for "other"
    var select = document.getElementById("location");
    var parent = document.getElementById("otherDiv");
    if (select.value != "Langar"){
        var otherBox = document.createElement("input");
        otherBox.type = "text";
        otherBox.className = "input";    
        parent.appendChild(otherBox);
    }
    else{
        parent.removeChild(parent.lastChild);
    }
}

function validateForm(){
    return true;

}

</script>

<div id = "mainContainer"  style = "background-color: #fffef0; bottom: 0px">
<div id = "mainContent"  ><br><br>
    <form id = "form"  action="submitTrip.php" method="post" onsubmit="return validateForm();">
    <label for="driver">Driver:</label><br>
    <input type="text" class = "input" name="driver" aytocomplete="on"><br>
    <label for="date">Date:</label><br>
    <input type="date" class="input" name = "date" autocomplete="off"><br>
    <label for="destination">Location:</label><br>
    <select name="destination" id="location"  class="input" autocomplete="off" onchange="changed()">
        <option value="Langar">Langar</option>
        <option value="Other">Other</option>
      </select><br>
      <div id = "otherDiv"></div>
      <br>
    <div id="passengerArea">    
    </div>
    <button type="button" class="button" onclick="addPassenger()">Add Passenger</button><br>
    <button type="sumbit" class="button" style="background: #29a9db;margin-top: 10px;"
        >Submit</button><br>
    </form>
    <script type="text/javascript">
        addPassenger();
     </script>

    <br><br><br><br>   
</div>
</div>    

     
</body></html>