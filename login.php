<?php
include_once('db.php');

session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $n = 0;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = "SELECT * FROM users WHERE username = \"$username\";"; 
    

    if ($result->num_rows > 0) { 
		while($row = $result->fetch_assoc()) { 

            if ($username == $row['username'] && $password == $row['password']) {
                
                $_SESSION['authenticated'] = true;
                $_SESSION['username'] = $username; 

                header('Location: index.php');
                exit;
            } 
            else {
                $n++;
            }
        }
        if ($n == $result->num_rows) {
            $error = 'Invalid username or password';
        }
	} 
	else { 
        $error = '0 account in the database';
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
    <button type="submit">Login</button>
    <a href="signup.php">Doesn't have an account?</a>
</form>


<?php if (isset($error)) {
    echo $error;
} ?>
