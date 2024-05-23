
<?php
$ErrorMsg = "";
$date_joined = date('Y-m-d H:i:s'); // mysql use NOW()
$email = $_GET['email'];

if (isset($_POST['button'])) 
{
  
  
// Establish database connection
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



    // Collect form data
    $email = $_GET['email']; // Get email from URL parameter
    $motpasse = $_POST['mpt'];
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $nomcelebrite = isset($_POST['nomcelebrite']) ? $_POST['nomcelebrite'] : '';
    $numtel = isset($_POST['numtel']) ? $_POST['numtel'] : '';
    $adresse = isset($_POST['adress']) ? $_POST['adress'] : '';
    $wilaya = isset($_POST['wilaya']) ? $_POST['wilaya'] : '';
    $ccp = isset($_POST['ccp']) ? $_POST['ccp'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $service = isset($_POST['service']) ? $_POST['service'] : '';
    $groupe = isset($_POST['groupe']) ? $_POST['groupe'] : '';
    $image = isset($_POST['image']) ? $_POST['image'] : '';

    // Validate and sanitize the data
    $email = mysqli_real_escape_string($mysqli, $email);
    $motpasse = mysqli_real_escape_string($mysqli, $motpasse);
    $nom = mysqli_real_escape_string($mysqli, $nom);
    $nomcelebrite = mysqli_real_escape_string($mysqli, $nomcelebrite);
    $numtel = mysqli_real_escape_string($mysqli, $numtel);
    $adresse = mysqli_real_escape_string($mysqli, $adresse);
    $wilaya = mysqli_real_escape_string($mysqli, $wilaya);
    $ccp = mysqli_real_escape_string($mysqli, $ccp);
    $gender = mysqli_real_escape_string($mysqli, $gender);
    $description = mysqli_real_escape_string($mysqli, $description);
    $service = mysqli_real_escape_string($mysqli, $service);
    $groupe = mysqli_real_escape_string($mysqli, $groupe);
    $image = mysqli_real_escape_string($mysqli, $image);
    // $hashed_password = md5($motpasse);

    // Insert data into the 'user' table
    $sql_user = "INSERT INTO user (email, password, date_joined, id_profil) VALUES ('$email', MD5('$motpasse'), '$date_joined', '2')";

    if (mysqli_query($mysqli, $sql_user)) {
        // If user record inserted successfully, proceed to insert data into the 'employee' table

        // Insert data into the 'employee' table
        $sql_employee = "INSERT INTO employee (nom, nomcelebrite, numtel, mdp, adress,date_joined, wilaya, ccp, gender, description, service, groupe, email, image) 
                         VALUES ('$nom', '$nomcelebrite', '$numtel', MD5('$motpasse'), '$adresse','$date_joined', '$wilaya', '$ccp', '$gender', '$description', '$service', '$groupe', '$email', '$image')";

        if (mysqli_query($mysqli, $sql_employee)) {
            header("Location: /project2024l3/html/log.php");
            exit();
        } else {
            $error_message = "Error: " . $sql_employee . "<br>" . mysqli_error($mysqli);
        }
    } else {
        $error_message = "Error: " . $sql_user . "<br>" . mysqli_error($mysqli);
    }
}

// Close database connection
// mysqli_close($mysqli);
// ob_end_flush();
?>
