<?php
  
        // Include your database connection file here
        $BDD = array();
        $BDD['host'] = "localhost";
        $BDD['user'] = "root";
        $BDD['pass'] = "";
        $BDD['db'] = "project";
        
        
        $mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
        if(!$mysqli) {
          echo "Connexion non établie.";
          exit;
        }
        //echo "Records inserted .";
        $error_message = "";
        if (isset($_POST['button'])) {
            echo "Records inserted .";
        // Collect form data
        $email = $_GET['email']; // Get email from URL parameter
        $motpasse = $_POST['mpt'];
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $nomcelebrite = isset($_POST['nomcelebrite']) ? $_POST['nomcelebrite'] : '';
        $numtel = isset($_POST['numtel']) ? $_POST['numtel'] : '';
        // $datenaiss = date('Y-m-d', strtotime($_POST['datenaiss']));

       
        $adresse = isset($_POST['adress']) ? $_POST['adress'] : '';
        $wilaya = isset($_POST['ville']) ? $_POST['ville'] : '';
        $ccp = isset($_POST['ccp']) ? $_POST['ccp'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $service = isset($_POST['service']) ? $_POST['service'] : '';
        $groupe = isset($_POST['groupe']) ? $_POST['groupe'] : '';

        // Validate and sanitize the data (you can add more validation as per your requirements)
        $email = mysqli_real_escape_string($mysqli, $email);
        $motpasse = mysqli_real_escape_string($mysqli, $motpasse);
        $nom = mysqli_real_escape_string($mysqli, $nom);
        $nomcelebrite = mysqli_real_escape_string($mysqli, $nomcelebrite);
        $numtel = mysqli_real_escape_string($mysqli, $numtel);
        // $datenaiss = mysqli_real_escape_string($mysqli, $datenaiss);
        $adresse = mysqli_real_escape_string($mysqli, $adresse);
        $wilaya = mysqli_real_escape_string($mysqli, $wilaya);
        $ccp = mysqli_real_escape_string($mysqli, $ccp);
        $gender = mysqli_real_escape_string($mysqli, $gender);
        $description = mysqli_real_escape_string($mysqli, $description);
        $service = mysqli_real_escape_string($mysqli, $service);
        $groupe = mysqli_real_escape_string($mysqli, $groupe);

        // Insert data into the 'user' table
        $sql_user = "INSERT INTO user (email, password) VALUES ('$email', '$motpasse')";
       // echo "sql result: ". $sql_users;
        if (mysqli_query($mysqli, $sql_user)) {
            // If user record inserted successfully, proceed to insert data into the 'employee' table

            // Insert data into the 'employee' table
            $sql_employee = "INSERT INTO employee (nom, nomcelebrite, numtel, adress, wilaya, ccp, gender, description, service, groupe, email) 
            VALUES ('$nom', '$nomcelebrite', '$numtel',  '$adresse', '$wilaya', '$ccp', '$gender', '$description', '$service', '$groupe', '$email')";

            if (mysqli_query($mysqli, $sql_employee)) {
                // echo "Records inserted successfully.";
                header("Location: \project2024l3\html\log.php");
            } else {
               
                echo "Error: " . $sql_employee . "<br>" . mysqli_error($mysqli);
            }
        } else {
            echo "Error: " . $sql_user . "<br>" . mysqli_error($mysqli);
        }
    }
        // Close database connection
        mysqli_close($mysqli);
       
    ?>