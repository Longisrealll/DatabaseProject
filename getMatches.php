<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usersandmatch";

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT coach.CoachName,team.TeamName,team.League from team 
          LEFT JOIN coach ON coach.TeamName = team.TeamName";
$result = $conn->query($query);

if ($result->num_rows > 0){
    //output data
    while ($row = $result->fetch_assoc()) {
        echo "<br> Team name: ". $row["TeamName"]. "<br>League: ". $row["League"] . "<br>Coach: " . $row["CoachName"] . 
        "<br>Players<br>";

        $currentteam = $row["TeamName"];
        $allplayers = "SELECT PlayerNumber, GamesPlayed FROM player
                       WHERE TeamName = '$currentteam'";
        $playerResult = $conn->query($allplayers);

        echo "<table align=\"center\" border=\"1\">";
        echo "<tr>
        <th>Player Number</th>
        <th>Games contributed</th>
        </tr>
        ";
        if($playerResult->num_rows>0){
            while($datas = $playerResult->fetch_assoc()){
                echo "
                <tr>
                <td>". $datas["PlayerNumber"]. "</td>
                <td>". $datas["GamesPlayed"] ."</td>
                </tr>";
            }
            echo "</table>";
        }else{
            echo "</table><p>No player</p>";
        }
    }
}else{
    echo "0 result";
}

$conn->close();
?>