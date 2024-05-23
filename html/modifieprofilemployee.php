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
        $profilPage = "3";
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
    <link rel="stylesheet" href="\project2024l3\css\nav.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Handi</title>
    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #e9efff; */
        }
 
        .container {
            max-width: 700px;
            margin: 50px auto;
            background-color: #fff;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
 
        .form-group {
            margin-bottom: 20px;
            width: 500px;
        }
 
        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            height: 29px;
            padding: 0px;
            border-radius: 3px;
            border: 1px solid #ccc;
            resize: none; 
        }

        #appointmentForm{
            width: 100%;
        }

        #categories,#services{
            height: 29px;
        }

        input[type="date"],
        input[type="time"],
        select,
        textarea {
            width: 100%;
            padding: 0px;
            border-radius: 3px;
            border: 1px solid #ccc;
            resize: none; /* Prevent textarea resizing */
        }
 
        button {
            float: right;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
 
        button:hover {
            background-color: #0056b3;
        }
 
        button i {
            margin-left: 5px;
        }
        .menu-btn {
            cursor: pointer;
            position: fixed;
            top: 30px;
            right: 90px;
            z-index: 9999;
            outline: none;
        }

        .menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            display: none;
            top: 80px; 
            right: 90px;
        }

        .menu li {
            /* border-bottom: 5px solid #ddd; */
        }

        .menu li:last-child {
            border-bottom: none;
        }

        .menu li a {
            display:flex;
            align-items: center;
            width:160px;
            padding: 15px 20px;
            text-decoration: none;
            color: #333;
        }

        .menu li a i {
            margin-right: 10px; 
            outline: none;
        }

        .menu li a:hover {
            background-color: #f1f1f1;
        }

        #menu-toggle:checked + .menu {
            display: block;
        }

        #menu-toggle {
            display: none;
            -webkit-appearance: none; 
            -moz-appearance: none; 
            appearance: none;
        }
        .icon-link {
            background-image: url('/project2024l3/img/home-button-for-interface.png');
            background-size: cover; 
            width: 32px; 
            height: 32px;
            display: inline-block; 
            margin: 0 10px; 
      }

      .icon-linkp {
            background-image: url('/project2024l3/img/user.png');
            background-size: cover; 
            width: 32px; 
            height: 32px;
            display: inline-block; 
            margin: 0 10px;
      }

      .icon-linko {
            background-image: url('/project2024l3/img/edit.png');
            background-size: cover; 
            width: 32px; 
            height: 32px;
            display: inline-block; 
            margin: 0 100px;
      }

      .icon-linka {
            background-image: url('/project2024l3/img/bookmark.png');
            background-size: cover; 
            width: 32px; 
            height: 32px;
            display: inline-block; 
            margin: 0 100px;
      }
      .search-container {
            position: relative;
      }
      .recherche{
            height:40px;
            padding:5px 10px;
            border:none;
            border-radius: 25px;
            outline:none;
            background-color: #eee;
            margin-left: 10px;
            width: 300px;
      }
      .error-container {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
      }
      .nav-middle{
            margin-right: 20%;
      }
      .error-message{
            display: block; 
            color: red; 
            font-size: 14px; 
            margin-top: 5px; 
            margin-left: 10px;
      }
     
      .links-container {
            display: flex;
            justify-content: center;
            gap: 20px;
      }

      .icon-link, .icon-linkp, .icon-linko, .icon-linka {
            background-size: cover;
            width: 32px;
            height: 32px;
      }
      input {
            width: 100%;
            height: 35px;
            padding: 0px;
            border-radius: 3px;
            border: 1px solid #ccc;
            resize: none; 
        }
        .icon-linkp img {   width: 18px; 
    height: 18px; 
    margin-right: 10px;
  }
    </style>
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
        <a href="/project2024l3/html/homeemployee.php?email=<?php echo $_GET['email']; ?>" class="icon-link" ></a>
        <a href="\project2024l3\html\profilemployee.php?email=<?php echo $_GET['email']; ?>"class="icon-linkp"> </a>
        <a href="/project2024l3/html/post.php?email=<?php echo $_GET['email']; ?>"class="icon-linko"></a>
        <a href="/project2024l3/html/toutpostemployee.php?email=<?php echo $_GET['email']; ?>"class="icon-linkh"></a>
        <a href="\project2024l3\html\listeoffer.php?email=<?php echo $_GET['email']; ?>"class="icon-linkl"></a>
      </div>

      <div class="nav-right">
            <!-- <span class="profile"></span> -->
            <!-- <a href="#">
                <i class="fa fa-bell"></i>
            </a> -->
            <label for="menu-toggle" class="menu-btn"><i class="fas fa-ellipsis-h"></i></label>
            <input type="checkbox" id="menu-toggle" />
            <ul class="menu">
            <li><a href="\project2024l3\html\modifieprofilemployee.php?email=<?php echo $email; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile" />  Modifier le profil</a></li>
              <!-- <li><a href="#"><span><i class="fas fa-cogs"></i> Paramètres</span></a></li> -->
              <li><a href="\project2024l3\html\log.php"><span><i class="fas fa-sign-out-alt"></i> Déconnexion</span></a></li>
              <!-- <li><a href="#" id="dark-mode-toggle"><span><i class="fas fa-moon"></i> Mode sombre</span></a></li> -->
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
                <button type="submit" id="submitBtn">Valider</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php
ob_start();
// session_start();

// Check if user is logged in, otherwise redirect to login page
// if (!isset($_SESSION['email'])) {
//     header("Location: login.php");
//     exit;
// }

// Database configuration
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        $query = "SELECT adress FROM employee WHERE email = '$email'";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);
        $address = $row['adress'];
    }
     if (!empty($_POST['numtel'])) {
         $numtel = $_POST['numtel'];
     }else {
        // If the numtel field is not filled, get the existing numtel value from the database
        $query = "SELECT numtel FROM employee WHERE email = '$email'";
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
        $query = "SELECT mdp FROM employee WHERE email = '$email'";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_assoc($result);
        $mot_passe = $row['mdp'];
    }
     $image_name = addslashes($_FILES['uploadfile']['name']);
     $image = file_get_contents($_FILES['uploadfile']['tmp_name']);
     $queryimg  = "UPDATE  tmp_photos SET PHOTO = '$image' WHERE email = '$email'";
            
     $stmti = $db->prepare($queryimg);

     $stmti->bind_param('s', $image);
     $stmti->execute();
    // Update user profile data in database
     // Assuming you store email in session after login
    $update_query = "UPDATE employee SET adress = '$address', numtel = '$numtel', mdp = '$mot_passe' WHERE email = '$email'";

    if (mysqli_query($mysqli, $update_query)) {
        // $email = urlencode($_GET['email']);
        $ChaineRedirect = "Location: /project2024l3/html/homeemployee.php?email=".$_GET['email']."";
            
            if (isset($ChaineRedirect)) {
                header($ChaineRedirect);
                exit();
            }
    } else {
        echo "Erreur : " . $update_query . "<br>" . mysqli_error($mysqli);
    }

    // Close database connection
    mysqli_close($mysqli);
}ob_end_flush();
?>
