<?php
header('Access-Control-Allow-Origin: *');

$URL = $_GET["URL"];

$mysql = mysqli_connect("localhost", "sec_user", "Keq5wJrdjpwdXqn", "highlighter");

if(mysqli_connect_errno($mysql)){
	echo "Failed to connect to MySQL: ".mysql_connect_error();
}
else{
	echo "Made the connection<br>";
}

$searchQuery = "SELECT * FROM highlited WHERE URL = \"".$URL."\"";

$result = mysqli_query($mysql, "SELECT * FROM highlited WHERE URL = \"".$URL."\"");

while($row = mysqli_fetch_array($result)){
	echo $row['textBody']."<br>             BY: ".$row['userName']."<br><br>";
}

echo "Finished."


?>