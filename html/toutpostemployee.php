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
            <li><a href="\project2024l3\html\modifieprofilemployee.php?email=<?php echo $email; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile" />  Modifier le profil</a></li>
              <!-- <li><a href="#"><span><i class="fas fa-cogs"></i> Paramètres</span></a></li> -->
              <li><a href="\project2024l3\html\log.php"><span><i class="fas fa-sign-out-alt"></i> Déconnexion</span></a></li>
              <!-- <li><a href="#" id="dark-mode-toggle"><span><i class="fas fa-moon"></i> Mode sombre</span></a></li> -->
            </ul>
      </div>
    </nav><div class="eleven">
          <h1>Journal des Publications</h1>
      </div>
    <div class="container">
 
               
      <div class="middle-panel">
     
<?php
            $email = $_GET['email'];

          
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
            //$sql = "SELECT p.*, e.nom FROM post p INNER JOIN employee e ON p.email = e.email WHERE p.email = '$email'";

            // $sdl = "SELECT nom FROM employee WHERE email = '$email'";
            // $resultt = mysqli_query($mysqli, $sdl);
            $sql = "SELECT * FROM post WHERE email = '$email'";
            $result = mysqli_query($mysqli, $sql);
            
            // عرض مشاركات الشخص المحدد
            while ($post = mysqli_fetch_assoc($result)) {
                ?>
                <div class="post">
                    <div class="post-top">
                        <div class="dp">
                            <img src="\test\photo7.jpeg" alt="" />
                        </div>
                        <div class="post-info">
                            <p class="name"><?php echo $post['email']; ?></p>
                            <span class="time"><?php echo $post['created_at']; ?></span>
                        </div>
                        <!-- <a href="\project2024l3\html\editpost.php" class="edit-icon"><i class="far fa-edit"></i></a> -->
                        <!-- <i class="far fa-edit">
    <a href="\project2024l3\html\editpost.php"></a>
</i> -->
<!-- <a href="\project2024l3\html\editpost.php">
    <i class="fas fa-edit"></i>
</a> -->

                        <!-- <i class="fas fa-ellipsis-h"></i> -->
                    </div>
            
                    <div class="post-content">
                        <?php echo $post['content']; ?>
                        <?php if (!empty($post['img']) && file_exists($post['img'])) : ?>
                            <img src="<?php echo $post['img']; ?>" alt="" />
                        <?php endif; ?>
                    </div>
            
                    <div class="post-bottom">
                        <!-- <div class="action">
                            <i class="far fa-thumbs-up"></i>
                            <span>Like</span>
                        </div>
                        <div class="action">
                            <i class="far fa-comment"></i>
                            <span>Comment</span>
                        </div> -->
                        <!-- <a href="\project2024l3\html\editpost.php" class="edit-icon"><i class="far fa-edit"></i></a> -->
                        <div class="action">
                        <a href="\project2024l3\html\editpost.php">
                            <i class="fa fa-edit"></i>
                            <span>Edit</span></a>
                        </div>
                    </div>
                </div>
                <?php
            }
?>  
    </div>
  </body>
</html>
