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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="formulaire.css">
    <link rel="stylesheet" href="\project2024l3\css\style.css" />
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
            
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
 
        .form-group {
            margin-bottom: 20px;
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
      .icon-linkp img {
        width: 18px; 
        height: 18px; 
        margin-right: 10px;
      }
      .eleven h1 {
        margin-top:20px;
        font-size:30px;
        text-align:center;
        line-height:1.5em;
        padding-bottom:45px;
        font-family:"Playfair Display", serif;
        text-transform:uppercase;
        letter-spacing: 2px; 
        color:#111;
      }
    </style>
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
                    <li><a href="\project2024l3\html\modifieprofilclient.php?email=<?php echo $_GET['email']; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile" />  Modifier le profil</a></li>
                        <li><a href="#"><i class="fas fa-cogs"></i> Paramètres</a></li>
                        <li><a href="\project2024l3\html\log.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>   
                    </ul>
        </div>
    </nav><div class="eleven">
          <h1>Offres Spéciales</h1>
      </div>
    <div class="container">
    
        <form id="appointmentForm" action="" method="POST">
        
            <div class="form-group">
                <label for="services">Services :</label>
                <select id="services" name="services" required>
                    <option value="" disabled selected>Sélectionner un service</option>
            <?php
            $sqlservice = "SELECT id, nom FROM service";
            $result = mysqli_query($mysqli, $sqlservice);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    // Output dropdown options dynamically
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row["id"] . '">' . $row["nom"] . '</option>';
                    }
                }else {
                    echo '<option value="" disabled>No services found</option>';
                }
            }
            ?>
   
                </select>
            </div> <input type="hidden" id="serviceName" name="serviceName">
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" placeholder="Entrez Description " required></textarea>
            </div>
            <div class="form-group">
                <label for="Adresse">Adresse :</label>
                <input id="Adresse" name="adresse" placeholder="Entrez Adresse" required></input>
            </div>
            <div class="form-group">
                <label for="numtel">Numéro de téléphone :</label>
                <input id="numtel" name="numtel" placeholder="Entrez Numéro de téléphone" required></input>
            </div>
            <div class="form-group">
                <label for="budget">budget :</label>
                <input id="budget" name="budget" placeholder="Entrez Budget" required></input>
            </div>
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Heure  Debut:</label>
                <input type="time" id="time" name="timea" required>
            </div>
            <div class="form-group">
                <label for="time">Heure  fin:</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <button type="submit" id="submitBtn">Valider <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
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
    $email=$_GET['email']; 
    $service_id = $_POST['services'];
    $description = $_POST['description'];
    $budget = $_POST['budget'];
    $addres = $_POST['adresse'];
    $numtel = $_POST['numtel'];
    $date = $_POST['date'];
    $start_time = $_POST['timea']. ':00';; 
    $end_time = $_POST['time']. ':00';;

    $service_query = "SELECT nom FROM service WHERE id = '$service_id'";
    $service_result = mysqli_query($mysqli, $service_query);
    $service_data = mysqli_fetch_assoc($service_result);
    $service_name = $service_data['nom']; // اسم الخدمة

    if(empty($addres) || empty($numtel)){
        $client_query = "SELECT adress, numtel FROM client WHERE email = '$email'";
        $client_result = mysqli_query($mysqli, $client_query);
        $client_data = mysqli_fetch_assoc($client_result);
    if(empty($addres)){
        $addres = $client_data['adress'];}
    if(empty($numtel)){
        $numtel = $client_data['numtel'];
    }
   }

    $sql = "INSERT INTO offre ( service, emailc, description, budget, date, heurd, heurf ,address, numtel)
    VALUES ( '$service_name','$email', '$description', '$budget', '$date', '$start_time', '$end_time', '$addres', '$numtel')";

if (mysqli_query($mysqli, $sql)) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}

// Close database connection
mysqli_close($mysqli);
}

?>