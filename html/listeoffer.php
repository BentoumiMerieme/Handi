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
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon" /> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="\project2024l3\css\style.css" />
    <link rel="stylesheet" href="\project2024l3\css\nav.css" />
    <title>Handy</title>
    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
  </head>
 
  <style>
 
    table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tr:hover {
    background-color: #ddd;
}body {
            font-family: Arial, sans-serif;
            background-color: #eaeef6;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }.container {
            display: flex;
            justify-content: center; /* محاذاة العناصر بالوسط أفقيًا */
            align-items: center; /* محاذاة العناصر بالوسط عموديًا */
            height: 100%; /* امتداد العناصر لتغطية الشاشة بالكامل */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }.offer-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px; /* المسافة بين العناصر */
        }
        .offer {flex: 1 0 calc(50% - 20px);
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .offer h3 {
            margin-top: 0;
        }
        .offer p {
            margin: 5px 0;
        }
        .button-save {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 15px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;display: block;text-align:center;
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
  <body>
  <nav>
      <div class="nav-left">
            <img src="\project2024l3\img\logo.png" alt="Logo" />

            <div class="search-container">
              <form action="" method="POST">
                  <input type="text" name="emails" class="recherche" placeholder="Recherche avec Email.." />
              
              </form>
              <span class="error-message">
                  <?php
            if (isset($error_message)) {
                echo $error_message;
            }
            ?>
            </span>
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
            <li><a href="\project2024l3\html\modifieprofilemployee.php?email=<?php echo $_GET['email']; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile" />  Modifier le profil</a></li>
              <!-- <li><a href="#"><span><i class="fas fa-cogs"></i> Paramètres</span></a></li> -->
              <li><a href="\project2024l3\html\log.php"><span><i class="fas fa-sign-out-alt"></i> Déconnexion</span></a></li>
              <!-- <li><a href="#" id="dark-mode-toggle"><span><i class="fas fa-moon"></i> Mode sombre</span></a></li> -->
            </ul>
      </div>
    </nav>
    <div class="eleven">
          <h1>Offres Spéciales</h1>
      </div>
    <div class="container">
      
                
       
      <div class="offer-container">
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
            $email =$_GET['email'];

            $sql = "SELECT * FROM offre ORDER BY date ";
            $result = mysqli_query($mysqli, $sql);



             while ($row = mysqli_fetch_assoc($result)) {
                $emailc = $row['emailc'];
                $id_offer = $row['id_offer'];
                echo "<div class='offer'>";
                echo "<h3>Service: " . $row['service'] . "</h3>";
                echo "<p><strong>Email:</strong> " . $row['emailc'] . "</p>";
                echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
                echo "<p><strong>Budget:</strong> " . $row['budget'] . "</p>";
                echo "<p><strong>Address:</strong> " . $row['address'] . "</p>";
                echo "<p><strong>NumTel:</strong> " . $row['numtel'] . "</p>";
                echo "<p><strong>Date:</strong> " . $row['date'] . "</p>";
                echo "<p><strong>Heure Debut:</strong> " . $row['heurd'] . "</p>";
                echo "<p><strong>Heure Fin:</strong> " . $row['heurf'] . "</p>";
                echo "<a href='/project2024l3/html/confirmationoffere.php?email=" . $email . "&emailc=" . $emailc . "&id_offer=" . $id_offer . "' class='button-save'>Save</a>";
                echo "</div>";
            
            }
            mysqli_close($mysqli);
            ?>
</div>
</div>
      
  </body>
</html>
