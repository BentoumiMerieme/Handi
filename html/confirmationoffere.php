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

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="formulaire.css">
    <!-- <link rel="stylesheet" href="\project2024l3\css\style.css" /> -->
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
            background-color: #e9efff;
        }
 
        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
 
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
 
        .form-group {
            margin-bottom: 20px;
        }
 
        label {
           
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        #description{
           width: 100%;
           height: 200px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            resize: none; /* Prevent textarea resizing */
        }
 
        #submitBtn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
 
        #submitBtn:hover {
            background-color: #0056b3;
        }
 
        #submitBtn i {
            margin-left: 5px;
        }
        .cancel-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .cancel-button img {
            width: 26px;
            height: 26px;
        }
    </style>
</head>
<body>
<nav>
<h2>Confirmation</h2>
    <div class="container">
    <button type="button" class="cancel-button">
               <a href="/project2024l3/html/listeoffer.php?email=<?php echo $_GET['email']; ?>"> <img src="\project2024l3\img\annuler.png" alt="Cancel" ></a>
    </button>
        <form id="" action="" method="POST">
       
            
        
                   
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" placeholder="Entrez Description " required></textarea>
            </div>

           
            <div class="form-group">
                <button type="submit" id="submitBtn">Valider <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
    <script>
        
    </script>
</body>
</html>
<?php
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// $category = $_POST['categories'];
$email=$_GET['emailc']; 
$id_offer=$_GET['id_offer'];
$description = $_POST['description'];
$sql = "INSERT INTO offeremployee (email, id_offer, description) VALUES ('$email', '$id_offer', '$description')";


if (mysqli_query($mysqli, $sql)) {
    // echo "Record inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}

// Close database connection
mysqli_close($mysqli);
}









?>