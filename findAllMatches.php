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

$query="SELECT TeamA,TeamB FROM play_against";

$result = $conn->query($query);

if($result->num_rows>0){
    echo 
    "<table align=\"center\" border=\"1\">";
    echo "<tr>
    <th>Team 1</th>
    <th>vs</th>
    <th>Team 2</th>
    </tr>
    ";
    while($row = $result->fetch_assoc()){
        echo "
        <tr>
        <td>". $row["TeamA"]. "</td>
        <td> vs </td>
        <td>". $row["TeamB"] ."</td>
        </tr>";
    }
    echo "</table>";
}
?>