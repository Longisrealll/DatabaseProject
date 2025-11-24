<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "usersandmatch";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$playerid=$_GET['PlayerID'];
$theteam=$_GET['TeamName'];
$games=$_GET['GamesPlayed'];

$query = "UPDATE player
          SET TeamName = $theteam,GamesPlayed = $games 
         WHERE PlayerID='$playerid'";
$result= $conn->query($query);

if($result){
    echo "<br> Player updated <br>";
}else{
    echo "0 result";
}

$conn->close();
?>