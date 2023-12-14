<?php
include_once('db.php');


session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmed_password = $_POST['confirmedpassword'];


    $name_result = nameCheckDB($username);
    $email_result = emailCheckDB($email);

    if ($name_result->num_rows > 0) { 
        $used_username = "<span class=\"alert\">Username isn't available.</span>";
        if ($email_result->num_rows > 0) { 
            $used_email = "<span class=\"alert\">$email already has an account.</span>";
        }
    } 
    else { 
        if ($email_result->num_rows > 0) { 
            $used_email = "<span class=\"alert\">$email already has an account.</span>";
        } 
        else{
            if ($password != $confirmed_password) {
                $pass_not_match = "<span class=\"alert\">Password doesn't match</span>";
            }
            else{
                $save = saveDB($username,$email,$password);

                $_SESSION['authenticated'] = true;
                $_SESSION['new'] = true;
                $_SESSION['username'] = $username; 
                $_SESSION['email'] = $email; 
                
                header('Location: index.php');
                exit;
            }
        } 
    }
} 
?>


<!-- HTML login form -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
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
      <h1>Signup</h1>

      <form method="post">

        <div class="text_field">
          <input type="text" name="username" id="username" required/>
          <span class="deco"></span>
          <label for="username">Username</label>
          <?php if (isset($used_username)) {
            echo $used_username;
          } ?>
        </div>

        <div class="text_field">
          <input type="email" name="email" id="email" required/>
          <span class="deco"></span>
          <label for="email">Email</label>
          <?php if (isset($used_email)) {
            echo $used_email;
          } ?>
        </div>

        <div class="text_field">
          <input type="password" name="password" id="password" required/>
          <span class="deco"></span>
          <label for="password">Password</label>
          <?php if (isset($pass_not_match)) {
            echo $pass_not_match;
          } ?>
        </div>

        <div class="text_field">
          <input type="password" name="confirmedpassword" id="confiemedpassword" required/>
          <span class="deco"></span>
          <label for="confiemedpassword">Confirm Password</label>
          <?php if (isset($pass_not_match)) {
            echo $pass_not_match;
          } ?>
        </div>

        <button type="submit">Signup</button>

        <div class="goto">
          Already have an account? <a href="login.php">Login</a>
        </div>
      </form>
    </div>
  </body>
</html>

<?php $conn->close(); ?>