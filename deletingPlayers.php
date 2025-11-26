<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usersandmatch";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$playerid=$_GET['PlayerID'];

$query = "DELETE FROM player
         WHERE PlayerID='$playerid'";
$result= $conn->query($query);

if($result){
    echo "<br> Player deleted <br>";
}else{
    echo "0 result";
}

$conn->close();
?>