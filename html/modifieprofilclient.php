<?php
    $BDD = array();
    $BDD['host'] = "localhost";
    $BDD['user'] = "root";
    $BDD['pass'] = "";
    $BDD['db'] = "project";

    $mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);

    if (!$mysqli) {
        echo "Connection not established.";
        exit;
    }
?>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['emails'])) {
        $BDD = array();
        $BDD['host'] = "localhost";
        $BDD['user'] = "root";
        $BDD['pass'] = "";
        $BDD['db'] = "project";

      $mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);

      if (!$mysqli) {
          echo "Connection not established: " . mysqli_connect_error();
          exit;
      }

    $emailc = $_POST['emails'];
    $email = $_GET['email'];
    $stmt = $mysqli->prepare("SELECT id_profil FROM user WHERE email = ?");
    $stmt->bind_param("s", $emailc);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_profil = $row["id_profil"];
        $profilPage = "2";
        if ($id_profil == "3") {
          
            $ChaineRedirect = "Location: \project2024l3\html\\rprofilclient.php?email=" . $email . "&profil=" . $profilPage . "&emailc=" . $emailc . "";
        } 
        elseif ($id_profil == "2") {
          
            $ChaineRedirect = "Location: \project2024l3\html\\rprofilemployee.php?email=" . $email . "&profil=" . $profilPage . "&emailc=" . $emailc . "";
        } else {

            echo "<span class='error-message'>Il n'y a aucun utilisateur avec cet e-mail</span>";
        }
    } 
    else {

        echo "<span class='error-message'>Il n'y a aucun utilisateur avec cet e-mail</span>";
    }

    if (isset($ChaineRedirect)) {
        header($ChaineRedirect);
        exit();
    }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
   
    <link rel="stylesheet" href="formulaire.css">
    <link rel="stylesheet" href="\project2024l3\css\style.css" />
     <link rel="stylesheet" href="\project2024l3\css\modifiestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Handi</title>
    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
   
       <script>
        function confirmChange() {
            if (confirm("Voulez-vous vraiment modifier ces informations?")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</head>
<body>
    <nav>
        <div class="nav-left">
            <img src="\project2024l3\img\logo.png" alt="Logo" />

            <div class="search-container">
              <form action="" method="POST">
                  <input type="text" name="emails" class="recherche" placeholder="Recherche avec Email.." />
                  <span class="error-message">     
              </form>
            </div>
        </div>
        <div class="nav-middle">
        <div class="links-container">
            <?php $email=$_GET['email']; ?>
            <a href="\project2024l3\html\test.php?email=<?php echo $email; ?>" class="icon-link"></a>
            
            <a href="\project2024l3\html\profilclient.php?email=<?php echo $email; ?>" class="icon-linkp"></a>

            <a href="\project2024l3\html\offerclient.php?email=<?php echo $email; ?>" class="icon-linko"></a>

            <a href="\project2024l3\html\historiqueoffer.php?email=<?php echo $email; ?>"class="icon-linka"></a>
        </div></div>

        <div class="nav-right">
            <label for="menu-toggle" class="menu-btn"><i class="fas fa-ellipsis-h"></i></label>
                <input type="checkbox" id="menu-toggle" />
                    <ul class="menu">
                        <li><a href="\project2024l3\html\modifieprofilclient.php?email=<?php echo $email; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile" />  Modifier le profil</a></li>
                       
                        <li><a href="\project2024l3\html\log.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>   
                    </ul>
        </div>
    </nav>
    <div class="container">
        <form id="profileForm" action="" method="POST" onsubmit="return confirmChange()">
            <div class="form-group">
                <label for="Address">Adresse :</label>
                <input type="text" id="Address" name="address" placeholder="Entrez votre adresse" >
            </div>
            <div class="form-group">
                <label for="numtel">Numéro de téléphone :</label>
                <input type="tel" id="numtel" name="numtel" placeholder="Entrez votre numéro de téléphone" >
            </div>
            <div class="form-group">
                <label for="photo_profil">Photo de profil :</label>
                <input type="file" id="photo_profil" name="uploadfile">
            </div>
            <div class="form-group">
                <label for="mot_passe">Mot de passe :</label>
                <input type="password" id="mot_passe" name="mot_passe" placeholder="Entrez votre nouveau mot de passe" >
            </div>
            <div class="form-group">
                <label for="confirm_mot_passe">Confirmez le mot de passe :</label>
                <input type="password" id="confirm_mot_passe" name="confirm_mot_passe" placeholder="Confirmez votre nouveau mot de passe" >
            </div>
            <div class="form-group">
                <button type="submit" id="submitBtn"  name="upload">Valider</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
    ob_start();
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "project";

    // Connect to database
    $mysqli = mysqli_connect($host, $user, $password, $database);

    if (!$mysqli) {
        echo "Connection not established: " . mysqli_connect_error();
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" || isset($_POST['upload'])) {
     // Initialize variables for optional fields
     $address = "";
     $numtel = "";
    //  $photo_profil = "";
     $mot_passe = "";
     $confirm_mot_passe = "";
     $email = $_GET['email'];
     
     $file = $_FILES["uploadfile"]["tmp_name"];
     $image_size = getimagesize($_FILES['uploadfile']['tmp_name']);
     
     if($image_size==FALSE){
            echo "Ce n'est pas une image.";
     }
     // Check if optional fields are filled, otherwise use existing values
     if (!empty($_POST['address'])) {
         $address = $_POST['address'];
     }else {
        // If the address field is not filled, get the existing address value from the database
        $query = "SELECT adress FROM client WHERE email = '$email'";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);
        $address = $row['adress'];
    }
     if (!empty($_POST['numtel'])) {
         $numtel = $_POST['numtel'];
     }else {
        // If the numtel field is not filled, get the existing numtel value from the database
        $query = "SELECT numtel FROM client WHERE email = '$email'";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);
        $numtel = $row['numtel'];
    }
    //  if (!empty($_FILES['photo_profil']['name'])) {
    //      $photo_profil = $_FILES['photo_profil']['name'];
    //  }
     if (!empty($_POST['mot_passe'])) {
         $mot_passe = $_POST['mot_passe'];
         $confirm_mot_passe = $_POST['confirm_mot_passe'];
 
         // Verify password match
         if ($mot_passe !== $confirm_mot_passe) {
             echo "Les mots de passe ne correspondent pas.";
             exit;
         }
         // Encrypt password
         $mot_passe = md5($mot_passe);
     }else {
        // If the numtel field is not filled, get the existing numtel value from the database
        $query = "SELECT mdp FROM client WHERE email = '$email'";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);
        $mot_passe = $row['mdp'];
    }
    
    // Update user profile data in database
     // Assuming you store email in session after login
     $image_name = addslashes($_FILES['uploadfile']['name']);
     $image = file_get_contents($_FILES['uploadfile']['tmp_name']);
     $queryimg  = "UPDATE  tmp_photos SET PHOTO = '$image' WHERE email = '$email'";
            
     $stmti = $db->prepare($queryimg);

     $stmti->bind_param('s', $image);
     $stmti->execute();

    $update_query = "UPDATE client SET adress = '$address', numtel = '$numtel', mdp = '$mot_passe' WHERE email = '$email'";

    if (mysqli_query($mysqli, $update_query)) {
        //  $email = urlencode($_GET['email']);
        // $ChaineRedirect = "Location: /project2024l3/html/test.php?email=".$email."";
            
        //     if (isset($ChaineRedirect)) {
        //         header($ChaineRedirect);
        //         exit();
        //     }
      
        echo "   <h3 class='h5title'> Les donnes sont modifie</h5> ";
    } else {
        echo "Erreur : " . $update_query . "<br>" . mysqli_error($mysqli);
    }


    // Close database connection
    mysqli_close($mysqli);
}ob_end_flush();
?>
