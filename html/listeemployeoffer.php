<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['emails'])) {
    $BDD = array(
        'host' => 'localhost',
        'user' => 'root',
        'pass' => '',
        'db' => 'project'
    );

    $mysqli = new mysqli($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $email = $_POST['emails'];
    $stmt = $mysqli->prepare("SELECT id_profil FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_profil = $row["id_profil"];

        if ($id_profil == "3") {
            $ChaineRedirect = "Location: /project2024l3/html/profilclient.php?email=" . $email;
        } elseif ($id_profil == "2") {
            $ChaineRedirect = "Location: /project2024l3/html/profilemployee.php?email=" . $email;
        } else {
            echo "<span class='error-message'>Il n'y a aucun utilisateur avec cet e-mail</span>";
        }
    } else {
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/project2024l3/css/style.css">
    <link rel="stylesheet" href="/project2024l3/css/nav.css">
    <link rel="stylesheet" href="/project2024l3/css/list.css">
    <title>Handi</title>
    <link rel="icon" href="/project2024l3/img/logo.png" type="image/icon type">
  
</head>
<body>
<nav>
    <div class="nav-left">
        <img src="/project2024l3/img/logo.png" alt="Logo">
        <div class="search-container">
            <form action="" method="POST">
                <input type="text" name="emails" class="recherche" placeholder="Recherche avec Email..">
                <span class="error-message"></span>
            </form>
        </div>
    </div>
    <div class="nav-middle">
        <div class="links-container">
            <?php $email = $_GET['email']; ?>
            <a href="/project2024l3/html/test.php?email=<?php echo $email; ?>" class="icon-link"></a>
            <a href="/project2024l3/html/profilclient.php?email=<?php echo $email; ?>" class="icon-linkp"></a>
            <a href="/project2024l3/html/offerclient.php?email=<?php echo $email; ?>" class="icon-linko"></a>
            <a href="/project2024l3/html/historiqueoffer.php?email=<?php echo $email; ?>" class="icon-linka"></a>
        </div>
    </div>
    <div class="nav-right">
        <label for="menu-toggle" class="menu-btn"><i class="fas fa-ellipsis-h"></i></label>
        <input type="checkbox" id="menu-toggle">
        <ul class="menu">
            <li><a href="/project2024l3/html/modifieprofilclient.php?email=<?php echo $email; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile"> Modifier le profil</a></li>
            <li><a href="#"><i class="fas fa-cogs"></i> Paramètres</a></li>
            <li><a href="/project2024l3/html/log.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="card-container">
        <?php
        
        $BDD = array();
        $BDD['host'] = "localhost";
        $BDD['user'] = "root";
        $BDD['pass'] = "";
        $BDD['db'] = "project";
        $mysqli = new mysqli($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $id_offer = $_GET['id_offer'];
        $email = $_GET['email'];

        $stmt = $mysqli->prepare("SELECT * FROM offeremployee WHERE id_offer = ?");
        $stmt->bind_param("s", $id_offer);
        $stmt->execute();
        $result = $stmt->get_result();
        $int = '-1';
        if ($result && mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<div class='card'>";
          echo "<h3>" . $row['email'] . "</h3>";
          echo "<p>" . $row['description'] . "</p>";
          $emailc = $row['email'];
          $profilPage = "2";
          
        //   echo "<a href='/project2024l3/html/rprofilemployee.php?email=" . $email . "&profil=" . $profilPage . "&emailc=" . $emailc . "'>Employee</a>";
        //   $int= '-1';
        //   if( $int == '-1'){
        //   echo "<a href='#' class='save-btn' onclick='return confirmSave(this)'>Save</a>";
        // $int=='0';
        // }
        //   else{
        //     echo "<a href='#' class='save-btn' >Save</a>";
        //   }
        if ($int == '-1') {
          echo "<a href='/project2024l3/html/rprofilemployee.php?email=" . $email . "&profil=" . $profilPage . "&emailc=" . $emailc . "'>Employee</a>";
          echo "<a href='#' class='save-btn' onclick='return confirmSave(this)'>Save</a>";
          
      } else {
          echo "<a href='/project2024l3/html/rprofilemployee.php?email=" . $email . "&profil=" . $profilPage . "&emailc=" . $emailc . "'>Employee</a>";
          echo "<a href='#' class='save-btn disabled'>Save</a>";
      }
        echo "</div>";
          

          echo "<script>
           function confirmSave(button) {
        // عرض نافذة تأكيد
        var confirmation = confirm('Voulez-vous vraiment enregistrer cet élément ?');
        
        // إذا قام المستخدم بالموافقة
        if (confirmation) {
            // قم بتغيير حالة الزر ونصه
            button.classList.add('disabled');
            button.textContent = 'Saved';
             $int++; 
        }
        
        return confirmation;
    }
           </script>";
      }} else {
        echo "Pas d'employee";
    }

        $stmt->close();
        $mysqli->close();
        ?>
    </div>
</div>

<script>

    function confirmSave(button) {
        var confirmation = confirm('Voulez-vous vraiment enregistrer cet élément ?');
        
        if (confirmation) {
            button.classList.add('disabled');
            button.textContent = 'Saved';
            <?php $int++; ?>
        }
        
        return confirmation;
    }
</script>
</body>
</html>
