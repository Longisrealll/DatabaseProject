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

$teamname=$_GET['TeamName'];
$leaguename=$_GET['League'];
$query = "SELECT team.TeamName,team.League,coach.CoachName FROM team 
         LEFT JOIN coach ON team.TeamName = coach.TeamName
         WHERE TeamName='$teamname' AND League='$leaguename'";
$result= $conn->query($query);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<br> PID: ". $row["TeamName"]. " | PName: ". $row["League"] . "<br>";
    }
}else{
    echo "0 result";
}

#Add TeamName to Manager, important
$query = "SELECT manager.TeamName,manager.ManagerID,manager.Role,funds.Amount,sponsor.SponsorName,owners.OwnerName FROM manager
         LEFT JOIN funds ON funds.ManagerID = manager.ManagerID
         LEFT JOIN givemoney ON givemoney.FundID = funds.FundID
         LEFT JOIN sponsor ON givemoney.SponsorName = sponsor.SponsorName
         LEFT JOIN owners ON givemoney.OwnerName = owners.OwnerName
         WHERE manager.TeamName='$teamname'";
$result= $conn->query($query);

if($result->num_rows > 0){
    echo "Owner: ". $row["OwnerName"] . "<br>" . "<br> Manager: ". $row["ManagerID"]." | Role: ". $row["Role"] . "<br>";
    while($row = $result->fetch_assoc()){
        echo "Sponsor amount: ". $row["Amount"]. " | Current Sponsor: ". $row["SponsorName"] . "<br>". "<br>";
    }
}else{
    echo "0 result";
}

$conn->close();
?>