<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" href="home1.css">
</head>
<body>
	<h2 align="center">	<font color="#146827"> <img src="logo.jpg" align="left" height = "50px" width="250px">
	   <br><i><br></i></h2></font>
	<div class="navbar">
<!-- 	 change  <img src="logo.jpg" height="45px" width="220px"> -->
	  <a href="front_page.html">Home</a>

	  <a href="#news">News</a>
	  <a href="#">About Us</a>
	  <div class="dropdown">
	    <button class="dropbtn">Dropdown 
	      <i class="fa fa-caret-down"></i>
	    </button>
	    <div class="dropdown-content">
	      <a href="Linkedlist_insert_middle.png">Linked list</a>
	      <a href="undirectedgraph.png">Graphs</a>
	      <a href="insertEx.bmp">Trees</a>
	    </div>
	  </div> 
	  <a href="home.php">Feedback</a>
	</div>
	<br>
<form name = "feedback-form"  method="post" id = "feedback-form">
	First Name: <input type="text" name="name"  required><br>
	Last Name: <input type="text" name="name1"> <br>
	E-mail: <input type="text" name="email" required=""><br>
	Feedback <br>
	<textarea name = "feedback" rows = "10" cols="30"></textarea> <br>
	<!-- feedback: <input type="text" name="feedback"> <br> -->
	<button type="submit" name = "submit" value = "Submit">Submit</button>
</form>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "feedbacks";
	//create connection
	// $conn = mysqli_connect($servername, $username, $password);
	$conn = new mysqli($servername, $username, $password, $dbname);

	if (!$conn){
		die("Connection failed: ".mysqli_connect_error());
	}
	echo "Connected successfully";
	echo "<br />";

	// $sql = "CREATE DATABASE feedbacks";
	// if(mysqli_query($conn, $sql))
	// {
	// 	echo "Database created successfully";
	// 	echo "<br>";
	// }
	// else{
	// 	echo "Error creating database: ".mysqli_error($conn);
	// 	echo "<br>";
	// }
	$sql = "CREATE TABLE Feedback (
	first_name VARCHAR(303),
	last_name VARCHAR(6),
	email VARCHAR(30),
	feedback VARCHAR(300)
	)";
	// $sql = "CREATE TABLE MyGuests (
	// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	// firstname VARCHAR(30) NOT NULL,
	// lastname VARCHAR(30) NOT NULL,
	// email VARCHAR(50),
	// reg_date TIMESTAMP
	// )";
	$entered_name = $conn->real_escape_string($_POST['name']);
	$entered_email = $conn->real_escape_string($_POST['email']);
	$entered_name1 = $conn->real_escape_string($_POST['name1']);
	$entered_feedback = $conn->real_escape_string($_POST['feedback']);
	if($conn->query($sql) == TRUE){
		echo "Table Feedback created successfully";
		echo "<br/>";
	}
	else{
		echo "<br>";
	}
	if ($entered_feedback != "") 
		# code...
	
{	$sql = "INSERT INTO Feedback (first_name, last_name, email, feedback) VALUES ('".$entered_name."','".$entered_name1."', '".$entered_email."', '".$entered_feedback."');";
	if($conn->query($sql))
	{
		echo "New record added successfully";
		echo $entered_name;
	}
	else{
		echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
	}
	$sql = "SELECT * from Feedback";
	$result = $conn->query($sql);
	// $x = stringfy($result);
	// echo "<br>";
	// echo "<br>";
	// echo $x;
	// echo "<br>";
	// echo "<br>";

	// echo $result;
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<br>";
        // echo "rating: " . $row["rating"]. " - Name: " . $row["name"] . " Feedback: ". $row["feedback"];
    }
} else {
    echo "0 results";
}}
	$conn->close();
	// mysqli_connect(host, username, password)

?>
</body>
</html>