<?php
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
    $update_query = "UPDATE client SET adress = '$address', numtel = '$numtel', mdp = '$mot_passe' WHERE email = '$email'";

    if (mysqli_query($mysqli, $update_query)) {
        echo "Profil mis à jour avec succès.";
        header("Location: \project2024l3\html\test.php?email=<?php echo $email; ?>");
        exit;
    } else {
        echo "Erreur : " . $update_query . "<br>" . mysqli_error($mysqli);
    }

    // Close database connection
    mysqli_close($mysqli);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmer l'opération</title>
</head>
<body>
    <h1>Êtes-vous sûr de vouloir effectuer cette opération ?</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <button type="submit" name="confirm" value="yes">Oui</button>
        <button type="submit" name="confirm" value="no">Non</button>
    </form>
</body>
</html>