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
	</div>

        <h1><b>Data Structures</b></h1>
        <div class="cardRow" >
            <div class="column">
                <div class="card" onclick="location.href = 'linked_list_animation.html'">
                    <img src="doubly-linked-list.png" alt="Stacks" style="width:100%">
                    <div class="container">
                        <h>Linked list</h>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card" onclick="location.href = 'Stacks_animation.html'">
                    <img src="stacks.png" alt="Stacks" style="width:100%">
                    <div class="container">
                        <h>Stacks</h>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card" onclick="location.href = 'queue-animations.html'">
                    <img src="queues.png" alt="Queues" style="width:100%">
                    <div class="container">
                        <h>Queues</h>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card" onclick="location.href='linked_list.html'">
                    <img src="stacks.png" alt="Stacks" style="width:100%">
                    <div class="container">
                        <h>Stacks</h>
                    </div>
                </div>
            </div>
        </div>
        <h1><b>Algorithms</b></h1>
        <div class="cardRow" >
            <div class="column">
                <div class="card">
                    <img src="stacks.png" alt="Stacks" style="width:100%">
                    <div class="container">
                        <h>Stacks</h>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="stacks.png" alt="Stacks" style="width:100%">
                    <div class="container">
                        <h>Stacks</h>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="stacks.png" alt="Stacks" style="width:100%">
                    <div class="container">
                        <h>Stacks</h>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <img src="stacks.png" alt="Stacks" style="width:100%">
                    <div class="container">
                        <h>Stacks</h>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
