<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST"){
    include "database.php";






    $sql = "INSERT INTO account (name, email, password)
            VALUES (?, ?, ?)";
    $passwords = password_hash($_POST["password"], PASSWORD_DEFAULT);
            
    $stmt = $db->stmt_init();

    if ( ! $stmt->prepare($sql)) {
        die("SQL error: " . $db->error);
    }

    if($_POST["password"]!==$_POST["confirm_password"]){
        header("location: signup.php");
    }


    $stmt->bind_param("sss",
                    $_POST["name"],
                    $_POST["email"],
                    $passwords);
                    

        if ($stmt->execute()) {
            header("location: login.php");


    

                       }else{
                        die($db->error);
                       }
                    
}
                    

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="signup.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
            <h1>Sign Up</h1>
            <div class="textBoxdiv">
                <input type="text" placeholder="Name" id="name" name="name" required><br>
            </div>
            
            <div class="textBoxdiv">
                <input type="email" placeholder="Email*" name="email" id="email" required><br>
            </div>
            <div class="textBoxdiv">
                <input type="password" placeholder="Password*" name="password" id="password" required><br>
            </div>
            <div class="textBoxdiv">
                <input type="password" placeholder="Confirm Password*" name="confirm_password" id="confirm_password" required><br>
            </div>
            <input type="submit" value="Sign up" class="signBtn">
            <div>
              <p>Already a member?</p>  
            </div>
            <div>
            <button><a href="login.php">Login</a></button>
            </div>
        
        </form>
    </body>
</html>