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

$query="SELECT TeamA,TeamB FROM play_against";

$result = $conn->query($query);

if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
        echo "<br> Team name: ". $row["TeamName"]. "<br>League: ". $row["League"] . "<br>Coach: " . $row["CoachName"] . 
        "<br>Players<br>".
        "<table align=\"center\" border=\"1\">";
        echo "<tr>
        <th>Team 1</th>
        <th>vs</th>
        <th>Team 2</th>
        </tr>
        ";
        echo "
        <tr>
        <td>". $rows["TeamA"]. "</td>
        <td> vs </td>
        <td>". $rows["teamB"] ."</td>";
    }
}
?>