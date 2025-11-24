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
$query = "SELECT TeamName,PlayerNumber,GamesPlayed FROM player 
         WHERE GamesPlayed=(SELECT MAX(GamesPlayed) FROM player)";
$result= $conn->query($query);

if($result->num_rows > 0){
    echo "<h1>Games played of all time</h1>";
    while($row = $result->fetch_assoc()){
        echo "<br> Player Number: ". $row["PlayerNumber"]. "<br>Games: ". $row["GamesPlayed"] . "<br>Team name: " . $row["TeamName"] . "<br>";

    }
}else{
    echo "0 result";
}

$conn->close();
?>