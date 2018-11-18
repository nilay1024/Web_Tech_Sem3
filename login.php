<html>
	<?php

    	function test_input($data) {
	        $data = trim($data);
	        $data = stripslashes($data);
	        $data = htmlspecialchars($data);
	        return $data;
        }

        $uname = $psw = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

      		if (empty($_POST["uname"])) {
        		$unameErr = "Username is required";
     	 	} else {
        		$uname = test_input($_POST["uname"]);
      		}

      		if (empty($_POST["psw"])) {
        		$pswErr = "";
      		} else {
        		$psw = test_input($_POST["psw"]);
      		}
    	}


	    $servername = "localhost";
	    $username = "root";
	    $password = "1234";
	    $db = "Users";

	    //Create connection - SQL starts here
	    $conn = new mysqli($servername, $username, $password, $db);

	    //Check connection
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    } 

	    $UserFound = 0;
		$sql = "SELECT id, ClientName, Username, Email, Password FROM Details";
    	$result = $conn->query($sql);

	    if ($result->num_rows > 0) {
	      // Validating user
	      while($row = $result->fetch_assoc()) {
	        //echo "id: " . $row["id"]. " - Name: " . $row["ClientName"]. " Username: " . $row["Username"]. " Password: " . $row["Password"]."<br>";
	      	if($row["Username"]==$uname){
	      		$UserFound = 1;
	      		if($row["Password"]==$psw){
	      			header('Location: login.html'); //Note - this line should include the logged in page!
	      		}
	      	}
	      }
	    } else {
	    	if($UserFound == 0)
	      		header('Location: login_failed_noUser.html');
	      	else
	      		header('Location: login_failed_wrongPsw.html')
	    }
