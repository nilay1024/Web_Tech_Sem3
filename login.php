<html>
	<?php
    	function test_input($data) {
	        $data = trim($data);
	        $data = stripslashes($data);
	        $data = htmlspecialchars($data);
	        return $data;
        }

	    $servername = "localhost";
	    $username = "root";
	    $password = "";
	    $db = "Users";

	    //Create connection - SQL starts here
	    $conn = new mysqli($servername, $username, $password, $db);

	    //Check connection
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    } 

	    $UserFound = 0;
		$sql = "SELECT id, Clientname, Username, Email, Password, LoggedIn FROM LoggedDetailsTemp";
    	$result = $conn->query($sql);

        $uname = $psw = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        	$uname = test_input($_POST["uname"]);
			$psw = test_input($_POST["psw"]);
      	}

		header('Location: login - Copy.php');		//Return back to login.html if no match of username is found

	    if ($result->num_rows > 0) {
	      // Validating user
	      while($row = $result->fetch_assoc()) {
	      	if($row["Username"]==$uname){
	      		$UserFound = 1;
	      		if($row["Password"]==$psw){
	      			$sql = "UPDATE LoggedDetailsTemp SET LoggedIn = 0";
	      			$conn->query($sql);
	      			$sql = "UPDATE LoggedDetailsTemp SET LoggedIn = 1 WHERE Username='".$uname."' ";
	      			$conn->query($sql);
	      			//header('Location: login_success.html');
	      			//Note - this line should include the logged in page!
	      			//Redirect to new updated login page!
	      		}
	      		else{
	      			header('Location: login_fail.html');
	      			//Redirect to a login page which says wrong password!
	      		}
	      	}
	      }
	    $conn->close();
	    }    
	?>
</html>