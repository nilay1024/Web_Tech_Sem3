<html>
	<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "Users";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "UPDATE LoggedDetailsTemp SET LoggedIn = 0";
	    $conn->query($sql);
        $conn->close();   

        header('Location : login.html'); 
    ?>
</html>