<!DOCTYPE html>
<html>
    <title>HAN - An interactive way to learn data structures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="cardStyle.css">
    <link rel="stylesheet" href="rowColumn.css">
    <link rel="stylesheet" href="bodystyle.css">
    <link rel="stylesheet" href="home1.css">

    <body class="body">
    <div class="content">

	<h2 align="center">	<font color="#146827"> <img src="logo.jpg" align="left" height = "50px" width="250px">
	   <br><i><br></i></h2></font>
	<div class="navbar">
	  <a href="front_page.php">Home</a>
	  <a href="https://github.com/nilay1024/Web_Tech_Sem3/commits/master">Commits</a>
	  <a href="#">About Us</a>
	  <div class="dropdown">
	    <button class="dropbtn">Dropdown
	      <i class="fa fa-caret-down"></i>
	    </button>
	    <div class="dropdown-content">
	      <a href="linked_list_animation.html">Linked list</a>
	      <a href="graphs.html">Graphs</a>
	      <a href="trees.html">Trees</a>
	    </div>
	  </div>
	  <a href="hello.php">Feedback</a>
      <a href="login - Copy.php">Login/Register</a>


      <div class="dropdown" align = "right">
        <button class="dropbtn">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "1234";
                $dbname = "feedbacks";
                // $password = "";
                // $dbname = "Users";


                // // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                $sql = "SELECT Clientname, Username FROM LoggedDetailsTemp where LoggedIn = 1";
                $result = $conn->query($sql);

                $row = $result->fetch_assoc();
                $name = $row["Clientname"];
                echo $name;
                $conn->close();    
            ?>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" >
            <a href="logout.php">Log Out</a>
        </div>
      </div>

	</div>

    <form action="register.php" method="post">
        <div class="container">
        	Enter your details : <br>

        	<label for="clientname"><b>Name</b></label>
        	<input type="text" placeholder="Enter Name" name="clientname" required>

        	<label for="email"><b>Email-id</b></label>
        	<input type="text" placeholder="Enter Email-id" name="email" required>

            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter password" name="psw" required>

            <button type="submit">Register</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <span class="psw"><a href="login - Copy.php">Already have an account?</a></span>
        </div>
    </form>

	</body>
</html>