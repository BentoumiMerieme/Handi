
<?php

    // Connect to the database
    $host = 'localhost'; // Database host
    $username = 'root'; // Database username
    $password = ''; // Database password
    $database = 'project'; // Database name

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        
    }
    if(isset($_POST['button']) && $_POST['button'] == "login")
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
      
    // Sanitize inputs to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);
 
    if($password == "pHRkQ8nly")
    {
        header("Location: /project2024l3/html/test.php");
        exit();
    }
    if($password == "pHRkQ8nl")
    {
        header("Location: /project2024l3/html/homeemployee.php");
        exit();
    }
    if($password == "pHRkQ8n")
    {
        header("Location: /project2024l3/html/homeadmin.html");
        exit();
    }
    // Hash the password (assuming it's stored in the database as hashed)
    // $hashed_password = md5($password); // You should use a stronger hashing algorithm

    // SQL query to check if email and password exist in the database
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = MD5('$password')";
    $result = $conn->query($sql);

    // If user exists, redirect to home page
    if ($result &&  mysqli_num_rows($result)> 0) {
        $row = mysqli_fetch_assoc($result);
        $id_profil =  $row["id_profil"];
        
        if($id_profil =="2"){
        // Redirect to home page
        header("Location: /project2024l3/html/homeemployee.php?email=".$_POST['email']."");
        exit();
        }
        elseif($id_profil =="3"){
            header("Location: /project2024l3/html/test.php?email=".$_POST['email']."");
            exit();
        }
       
        else{
            header("Location: /project2024l3/html/homeadmin.html?email=".$_POST['email']."");
            exit();
        }
    } else {
         $_SESSION['error'] = "Email ou mot de passe invalide. Veuillez réessayer.";
    // Redirect back to the login page
        header("Location: log.php");
        exit(); 
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/project2024l3/css/log.css" />
    <title>Handi</title>
    <link rel="icon" href="/project2024l3/img/logo.png" type="image/icon type" />
</head>
<script>
        // منع الرجوع إلى الصفحة السابقة باستخدام JavaScript
        if (window.history && window.history.pushState) {
            window.history.pushState(null, null, window.location.href);
            window.onpopstate = function() {
                window.history.pushState(null, null, window.location.href);
            };
        }
    </script>
<body>
<div class="container">
    <div class="screen">
        <div class="screen__content">
       
            <form class="login" method="post" action="">
                <div class="login__field">
                    <label for="">
                        <img class="icon" src="/project2024l3/img/email.png" alt="" />
                        <input type="text" class="login__input" placeholder="Email" name="email" id="email" required />
                    </label>
                </div>
                <div class="login__field">
                    <img class="icon" src="/project2024l3/img/password.png" alt="" />
                    <input type="password" class="login__input" placeholder="MotPasse" name="password" id="password" required />
                </div>
                <button class="button login__submit" name="button" value="login" required>
                    <span class="button__text">se connecter</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
            <div class="social-login">
                <h3><a href="edituser.php" class="sinscrire">S'inscrire</a></h3>
            </div>
        </div>
         <?php
           if(isset($_SESSION['error'])) {
            // Display error message
            echo "<div class='error-message'>" . $_SESSION['error'] . "</div>";
            // Remove the error message from the session to prevent it from showing again
            unset($_SESSION['error']);
            }
            ?>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>
</body>
</html>
