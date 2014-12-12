<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Main Clipboard</title>
    </head>
    <body>
        <?php if (login_check($mysqli) == true) : ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>
               Here is your main clipboard!
            </p>
            <?php 
                $result = mysqli_query($mysqli, "SELECT * FROM copied WHERE userName = \"".htmlentities($_SESSION['username'])."\"");
                while($row = mysqli_fetch_array($result)){
                    echo $row['textBody']."<br><b> FROM</b>: ".$row['URL']." <b>At</b>: ".$row['time']."<br><br>";
                }
            ?>
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
    </body>
</html>