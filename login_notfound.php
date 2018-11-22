<!DOCTYPE html>
<html>
    <title>HAN - An interactive way to learn data structures</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="webStyle.css">
    <!-- <link rel="stylesheet" href="rowColumn.css"> -->
    <!-- <link rel="stylesheet" href="bodystyle.css"> -->
    <link rel="stylesheet" href="home1.css">

    <body class="body">
    <div class="content">

	<h2 align="center">	<font color="#146827"> <img src="logo.jpg" align="left" height = "50px" width="250px">
	   <br><i><br></i></h2></font>
	<div class="navbar">
	  <a href="front_page.html">Home</a>
	  <a href="https://github.com/nilay1024/Web_Tech_Sem3/commits/master">Commits</a>
	  <a href="#">About Us</a>
	  <div class="dropdown">
      <button class="dropbtn">Data Structures
	      <i class="fa fa-caret-down"></i>
	    </button>
	    <div class="dropdown-content">
	      <a href="linked_list_animation.html">Linked list</a>
	      <a href="Stacks_animation.html">Stacks</a>
	      <a href="queue-animations.html">Queues</a>
	    </div>
	  </div>
	  <a href="hello.php">Feedback</a>
      <!-- <a href="login - Copy.php">Login/Register</a> -->
      <a href="#">
      </a>
      <div class="dropdown" align = "right" style="float:right">
        <button class="dropbtn">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "1234";
                $dbname = "feedbacks";
                $password = "";
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
                if(strlen($name)==0){
                    echo '<script>alert("User not found.")</script>';
                }
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

    <form action="login.php" method="post" name="main" onsubmit="return validateForm(this)">
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
<!--             <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label> -->
        </div>
    </form>
    
    <div class="container" style="background-color:#f1f1f1">
            <span class="psw"><a href="register_link.php">New User?</a></span>
    </div>

    </body>
</html>
