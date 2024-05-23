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
    <title>Handi</title>
    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
</head>
<script>
    const darkModeToggle = document.getElementById('dark-mode-toggle');
      const body = document.body;

      darkModeToggle.addEventListener('click', function() {
      body.classList.toggle('dark-mode');
    });
</script>
<style>
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
        top: 80px; /* ajuster la position verticale du menu */
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
        gap: 20px; /* تعيين المسافة بين الروابط */
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
    .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 20px;
}

.card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    width: calc(50% - 40px); /* Adjust width based on the desired number of cards per row */
    box-sizing: border-box;
}

.card h3 {
    font-size: 1.5em;
    margin-bottom: 10px;
}

.card p {
    margin: 5px 0;
}

.card-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.card-buttons a {
    text-decoration: none;
}

.card-buttons button {
    background-color: #007BFF;
    color: #fff;
    border: none;
    border-radius: 3px;
    padding: 8px 12px;
    cursor: pointer;
}

.card-buttons button.supprime {
    background-color: red;
}
</style>
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
                        <li><a href="#"><i class="fas fa-cogs"></i> Paramètres</a></li>
                        <li><a href="\project2024l3\html\log.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>   
                    </ul>
        </div>
</nav>
<div class="eleven">
    <h1>Historique Offers</h1>
</div>
<div class="container">  
    <div class="middle-panel">
        <div class="card-container">
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
                $email = $_GET['email'];

                $sql = "SELECT o.id_offer, s.nom AS service_nom, o.description, o.budget, o.address, o.numtel, o.date, o.heurd, o.heurf
                        FROM offre o
                        INNER JOIN service s ON o.service = s.nom
                        WHERE o.emailc = ?"; 
                $stmt = $mysqli->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = mysqli_fetch_assoc($result)) {
                        $email = $_GET['email'];
                        $id_offer = $row['id_offer'];

                        echo "<div class='card'>";
                        echo "<h3>" . $row['service_nom'] . "</h3>";
                        echo "<p>Description: " . $row['description'] . "</p>";
                        echo "<p>Budget: " . $row['budget'] . "</p>";
                        echo "<p>Address: " . $row['address'] . "</p>";
                        echo "<p>NumTel: " . $row['numtel'] . "</p>";
                        echo "<p>Date: " . $row['date'] . "</p>";
                        echo "<p>Heure Debut: " . $row['heurd'] . "</p>";
                        echo "<p>Heure Fin: " . $row['heurf'] . "</p>";
                        echo "<div class='card-buttons'>";
                        echo "<a href='/project2024l3/html/listeemployeoffer.php?email=" . $email . "&id_offer=" . $id_offer . "'>
                                <button>Employee</button>
                              </a>";
                        echo "<a href='/project2024l3/html/delete_offer.php?email=" . $email . "&id=" . $row['id_offer'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?')\">
                                <button class='supprime'>Supprime</button>
                              </a>";
                        echo "</div>";
                        echo "</div>";
                    }
                    $stmt->close();
                }
                mysqli_close($mysqli);
            ?>
        </div>
    </div>
</div>
  </body>
</html>