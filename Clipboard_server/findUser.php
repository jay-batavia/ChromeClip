<?php
header('Access-Control-Allow-Origin: *');

$userName = $_GET["userName"];

$mysql = mysqli_connect("localhost", "sec_user", "Keq5wJrdjpwdXqn", "highlighter");

if(mysqli_connect_errno($mysql)){
	echo "Failed to connect to MySQL: ".mysql_connect_error();
}
else{
	echo "Made the connection<br>";
}

$searchQuery = "SELECT * FROM highlited WHERE userName = \"".$userName."\"";

$result = mysqli_query($mysql, "SELECT * FROM highlited WHERE userName = \"".$userName."\"");

while($row = mysqli_fetch_array($result)){
	echo $row['textBody']."<br> FROM: ".$row['URL']."<br><br>";
}

echo "Finished."


?>