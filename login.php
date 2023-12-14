<?php
include_once "db.php";
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username-or-email'];
    $email = $_POST['username-or-email'];
    $password = $_POST['password'];

    $name_result = nameCheckDB($username);
    $email_result = emailCheckDB($email);

    if ($name_result->num_rows > 0 || $email_result->num_rows > 0) { 

        $name_row = $name_result->fetch_assoc();
        $email_row = $email_result->fetch_assoc();

        if (isset($name_row)) {
            if ($username == $name_row['username'] && $password == $name_row['password']) {
                
                $_SESSION['authenticated'] = true;
                $_SESSION['new'] = false;
                $_SESSION['username'] = $username; 
                $_SESSION['email'] = $name_row['email']; 

                header('Location: index.php');
                exit;
            }
            else {
                $wrong_pass = "<span class=\"alert\">Incorrect Password</span>";
            }
        }
        if (isset($email_row)) {
            if ($email == $email_row['email'] && $password == $email_row['password']) {
                
                $_SESSION['authenticated'] = true;
                $_SESSION['new'] = false;
                $_SESSION['username'] = $email_row['username']; 
                $_SESSION['email'] = $email; 

                header('Location: index.php');
                exit;
            }
            else {
                $wrong_pass = "<span class=\"alert\">Incorrect Password</span>";
            }
        }
        
	} 
	else { 
        $error = "<span class=\"alert\">Incorrect Username or Email.</span>";
	}
} 
?>


<!-- HTML login form -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <h1>Login</h1>
      <form method="post">
        <div class="text_field">
          <input type="text" name="username-or-email" id="username-or-email" required/>
          <span class="deco"></span>
          <label for="username-or-email">Username or Email</label>
          <?php if (isset($error)) {
            echo $error;
          } ?>
        </div>
        <div class="text_field">
          <input type="password" name="password" id="password" required/>
          <span class="deco"></span>
          <label for="password">Password</label>
          <?php if (isset($wrong_pass)) {
            echo $wrong_pass;
          } ?>
        </div>
        <button type="submit">Login</button>
        <div class="goto">
          Doesn't have an account? <a href="signup.php">Signup</a>
        </div>
      </form>
    </div>
  </body>
</html>

<?php $conn->close(); ?>
