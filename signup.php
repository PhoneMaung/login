<?php
include_once('db.php');

session_start(); // Start the session


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $i  = 0;
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) { 

            if ($username == $row['username']) {
                
                $i = 1;
            } 
        }
        if ($i == 1) {
            $error = 'The username isn\'t available';
        }
        else{

            $add_user = "INSERT INTO users (username,password) VALUES('$username','$password');";
             
            $save = $conn->query($add_user);

            if ($save) {
                $_SESSION['authenticated'] = true;
                $_SESSION['username'] = $username; 
                echo "Account created";
                header('Location: login.php');
                exit;
            }
        }
	} 
	else { 

	}
} 
?>


<!-- HTML login form -->
<form method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username">
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br>
    <button type="submit">signup</button>
    <a href="login.php">Already have an account?</a>
</form>


<?php if (isset($error)) {
    echo $error;
} ?>
