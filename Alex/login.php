<?php
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    include "database.php";
    
    $sql = sprintf("SELECT * FROM account
                    WHERE email = '%s'",
                   $db->real_escape_string($_POST["email"]));
    
    $result = $db->query($sql);
    
    $user = $result->fetch_assoc();

    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password"])) {
            
            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["user_id"];
            header("Location: dashboard.php");
            exit;

            


        
        }
        
        
    
    } 


}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="https://classless.de/classless.css">
        <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #33ccc5;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #20ccc5;
}
</style>

    </head>
    <body>
    <ul>
  <li><a class="active" href="index.html">Home</a></li>
</ul>
        <form method="post">
            <h1>Login</h1>
            <div >
                <input type="email" placeholder="Email" name="email" id="email" required>
            </div>
            <div >
                <input type="password" placeholder="Password" name="password" id="password" required>
            </div>
            <input type="submit">
            <div>
            <button><a href="signup.php">Sign Up</a></button>
            </div>
        </form>
    </body>
</html>
