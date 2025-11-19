<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "usersandmatch";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT coach.CoachName,team.TeamName,team.League,player.PlayerNumber,player.GamesPlayed from team 
          LEFT JOIN coach ON coach.TeamName = team.TeamName
          LEFT JOIN player ON team.TeamName = player.TeamName";
$result = $conn->query($query);

if ($result->num_rows > 0){
    //output data
    while ($row = $result->fetch_assoc()) {
        echo "<br> Team name: ". $row["TeamName"]. "<br>League: ". $row["League"] . "<br>Coach: " . $row["CoachName"] . 
        "<br>Players<br>".
        "<table align=\"center\" border=\"1\">";
        echo "<tr>
        <th>Player Number</th>
        <th>Games contributed</th>
        </tr>
        ";
        echo "
        <tr>
        <td>". $rows["PlayerNumber"]. "</td>
        <td>". $rows["GamesPlayed"] ."</td>";
    }
}else{
    echo "0 result";
}

$conn->close();
?>