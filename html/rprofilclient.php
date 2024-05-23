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

$emailc = $_GET['emailc']; // The email to search for
$email = $_GET['email']; // The email of the owner of the page

$stmt = $conn->prepare("SELECT * FROM client WHERE email = ?");
$stmt->bind_param("s", $emailc);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    // Fetch data from the result
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Handi</title>
    <link rel="icon" href="\project2024l3\img\logo.png" type="image/icon type" />
    <link rel="stylesheet" href="\project2024l3\css\profilclient.css" />
    <link rel="stylesheet" href="\project2024l3\css\style.css" />
    <link rel="stylesheet" href="\project2024l3\css\nav.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  </head>
 <style>  .nav-middle{
    margin-right: 38%;
}</style>
  <body>
    <nav>
        <div class="nav-left">
            <img src="\project2024l3\img\logo.png" alt="Logo" />
        </div>
        <div class="nav-middle">
        <div class="links-container">

        <?php
        $profil=$_GET['profil']; ?>
       <?php if ($profil == "3") {?>
            <div class="nav-middle">
            <a href="/project2024l3/html/homeemployee.php?email=<?php echo $_GET['email']; ?>" class="icon-link" ></a>
            <a href="\project2024l3\html\profilemployee.php?email=<?php echo $_GET['email']; ?>"class="icon-linkp"> </a>
            <a href="/project2024l3/html/post.php?email=<?php echo $_GET['email']; ?>"class="icon-linko"></a>
            <a href="/project2024l3/html/toutpostemployee.php?email=<?php echo $_GET['email']; ?>"class="icon-linkh"></a>
            <a href="\project2024l3\html\listeoffer.php?email=<?php echo $_GET['email']; ?>"class="icon-linkl"></a>
          </div>
    
          <div class="nav-right">
            
                <label for="menu-toggle" class="menu-btn"><i class="fas fa-ellipsis-h"></i></label>
                <input type="checkbox" id="menu-toggle" />
                <ul class="menu">
                  <li><a href="\project2024l3\html\modifieprofilemployee.php?email=<?php echo $email; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile" />  Modifier le profil</a></li>
                  <li><a href="\project2024l3\html\log.php"><span><i class="fas fa-sign-out-alt"></i> Déconnexion</span></a></li>

                </ul>
          </div>
          <?php } else { ?>
            <a href="\project2024l3\html\test.php?email=<?php echo $email; ?>" class="icon-link"></a>
            <a href="\project2024l3\html\profilclient.php?email=<?php echo $email; ?>" class="icon-linkp"></a>
            <a href="\project2024l3\html\offerclient.php?email=<?php echo $email; ?>" class="icon-linko"></a>
            <a href="\project2024l3\html\historiqueoffer.php?email=<?php echo $email; ?>" class="icon-linka"></a>
        </div></div>
        <div class="nav-right">
            <label for="menu-toggle" class="menu-btn"><i class="fas fa-ellipsis-h"></i></label>
            <input type="checkbox" id="menu-toggle" />
            <ul class="menu">

                <li><a href="\project2024l3\html\modifieprofilclient.php?email=<?php echo $email; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile" /> Modifier le profil</a></li>
                <li><a href="\project2024l3\html\log.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
            </ul>
        </div>
        <?php } ?>



           
    </nav>
    <div class="eleven">
        <h1> Profil</h1>
    </div>
    <div class="profile">
      <img class="profile-picture" src="\project2024l3\img\<?php echo $row['image']; ?>" alt="" />
      <h1><?php echo $row['nom']; ?></h1>
      <div class="contact-details">
        <h2>Contact</h2>
        <p>
          <span class="contact-symbol"><i class="fas fa-phone"></i></span>
          <span class="bold-text">Numéro de téléphone:</span><?php echo $row['numtel']; ?>
        </p>
        <p>
          <span class="contact-symbol"><i class="fas fa-home"></i></span>
          <span class="bold-text">Adresse:</span> <?php echo $row['adress']; ?>
        </p>
        <p>
          <span class="contact-symbol"><i class="fas fa-envelope"></i></span>
          <span class="bold-text">Email:</span> <?php echo $row['email']; ?>
        </p>
      </div>
      <div class="state">
        <h2>State</h2>
        <p>
          <span class="location-rectangle">Algérie</span>
          <span class="location-rectangle"><?php echo $row['wilaya']; ?>
        </p>
      </div>
    </div>
  </body>
</html>
<?php
} else {
    echo "No results found for the provided email.";
}

// Close statement and database connection
$stmt->close();
$conn->close();
?>
