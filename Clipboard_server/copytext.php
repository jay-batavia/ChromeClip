<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
header('Access-Control-Allow-Origin: *');

sec_session_start();
if(login_check($mysqli)==true){

	$text = $_GET["textbody"];
	$webpage = $_SERVER['HTTP_REFERER'];
	$userName = htmlentities($_SESSION['username']);

	echo $userName;


	$mysqli = mysqli_connect("localhost", "sec_user", "Keq5wJrdjpwdXqn", "Clipboard");

	if(mysqli_connect_errno($mysqli)){
		echo "Failed to connect to MySQL: ".mysql_connect_error();
	}
	else{
		echo "Made the connection";
	}


	if (mysqli_query($mysqli, "INSERT INTO copied(userName, textBody, URL) VALUES (\"".$userName."\",\"".$text."\",\"".$webpage."\")")){
		echo "Values successfully added";
	}
	else{
		echo "Couldn't add";
	}
}

else {echo "You must be logged in.";
}

?>
 