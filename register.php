<html>
  <?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $clientname = $email = $uname = $psw = "";
    $clientnameErr = $emailErr = $unameErr = $pswErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["clientname"])) {
        $clientnameErr = "Name is required";
      } else {
        $clientname = test_input($_POST["clientname"]);
      }

      if (empty($_POST["uname"])) {
        $unameErr = "Username is required";
      } else {
        $uname = test_input($_POST["uname"]);
      }
      if (empty($_POST["email"])) {
        $emailErr = "";
      } else {
        $email = test_input($_POST["email"]);
      }

      if (empty($_POST["psw"])) {
        $pswErr = "";
      } else {
        $psw = test_input($_POST["psw"]);
      }
    }

    if (!preg_match("/^[a-zA-Z]*$/",$clientname)) {
      $clientnameErr = "Only letters and white space allowed in Name"; 
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }

    if (!preg_match("/^[a-zA-Z_0-9]*$/",$psw)) {
      $pswErr = "Password has to be alphanumeric";
      "<script>
        alert('Password has to be alphanumeric')
      </script>";
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Users";

    // // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    //sql to create table

    // $sql = "CREATE TABLE LoggedDetailsTemp (
    // id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    // ClientName VARCHAR(30) NOT NULL,
    // Username VARCHAR(30) NOT NULL,
    // Email VARCHAR(50),
    // Password VARCHAR(50),
    // LoggedIn BOOL
    // )";

    // if ($conn->query($sql) === TRUE) {
    //     echo "Table created successfully";
    // } else {
    //     echo "Error creating table: " . $conn->error;
    // }

    $done=0;

    $sql = "INSERT INTO LoggedDetailsTemp (ClientName, Username, Email, Password, LoggedIn)
    VALUES ('$clientname', '$uname', '$email', '$psw', 'FALSE')";

    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully";
        $done=1;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //To view the table

    
    // $sql = "SELECT id, ClientName, Username, Email, Password FROM Details";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //   // output data of each row
    //   while($row = $result->fetch_assoc()) {
    //     echo "id: " . $row["id"]. " - Name: " . $row["ClientName"]. " Username: " . $row["Username"]. " Password: " . $row["Password"]."<br>";
    //   }
    // } else {
    //   echo "0 results";
    // }

    
    $conn->close();

    if($done==1){
      $done=0;
      // header('Location: login_redirect.html');
      header('Location: login - Copy.php');
    }
  ?>

