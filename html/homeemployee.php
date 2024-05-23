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
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
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
    <title>Handi</title>
    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
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

            <li><a href="\project2024l3\html\modifieprofilemployee.php?email=<?php echo $_GET['email']; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile" />  Modifier le profil</a></li>
              <!-- <li><a href="#"><span><i class="fas fa-cogs"></i> Paramètres</span></a></li> -->
              <li><a href="\project2024l3\html\log.php"><span><i class="fas fa-sign-out-alt"></i> Déconnexion</span></a></li>
              <!-- <li><a href="#" id="dark-mode-toggle"><span><i class="fas fa-moon"></i> Mode sombre</span></a></li> -->
            </ul>
      </div>
    </nav>

    <!-- <div class="container"> -->
      <div class="middle-panel">
      <div class="eleven">
          <h1>Découvrez les dernières publications</h1>
      </div>
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

            // Fetch posts from the database sorted by created_at in descending order
            $sql = "SELECT * FROM post ORDER BY created_at DESC";
            // $result = mysqli_query($mysqli, $sql);
            $result = $mysqli->query($sql);
            // if ($result && mysqli_num_rows($result) > 0) {
            //     // Output each post dynamically
            //     while ($row = mysqli_fetch_assoc($result)) {
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="post">';
                    echo '<div class="post-top">';
                    echo '<div class="dp">';
                    echo '<img src="' . $row['image_profil'] . '" alt="" />';
                    echo '</div>';
                    echo '<div class="post-info">';
                    echo '<p class="name">' . $row['email'] . '</p>';
                    echo '<span class="time">' . $row['created_at'] . '</span>';
                    echo '</div>';
                    // echo '<i class="fas fa-ellipsis-h"></i>';
                    echo '</div>';
                    echo '<div class="post-content">';
                    echo $row['content'];
                    echo "<img src='images/" . $row["image"] . "' alt='صورة المنشور'>";
                    echo '</div>';
                    // echo '<div class="post-bottom">';
                    // echo '<div class="action">';
                    // echo '<i class="far fa-thumbs-up"></i>';
                    // echo '<span>Like</span>';
                    // echo '</div>';
                    // echo '<div class="action">';
                    // echo '<i class="far fa-comment"></i>';
                    // echo '<span>Comment</span>';
                    // echo '</div>';
                    // echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No posts found.";
            }

            // mysqli_close($mysqli);
            $mysqli->close();
        ?>

    </div>
  </body>
</html>
