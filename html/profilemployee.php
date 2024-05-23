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

    $email = $_POST['emails'];

    $stmt = $mysqli->prepare("SELECT id_profil FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_profil = $row["id_profil"];

        if ($id_profil == "3") {
            $ChaineRedirect = "Location: \project2024l3\html\\profilclient.php?email=" . $email . "";
        } 
        elseif ($id_profil == "2") {
            $ChaineRedirect = "Location: \project2024l3\html\\profilemployee.php?email=" . $email . "";
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
<?php
    // Connect to the database
    $host = 'localhost'; // Database host
    $username = 'root'; // Database username
    $password = ''; // Database password
    $database = 'project'; // Database name

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);     
    }
    $email = $_GET['email'];
    $stmt = $conn->prepare("SELECT * FROM employee WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch data from the result set
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Handi</title>
    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
    <link rel="stylesheet" href="\project2024l3\css\profilemployee.css" />
    <link rel="stylesheet" href="\project2024l3\css\style.css" /><link rel="stylesheet" href="\project2024l3\css\nav.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <script
      type="text/javascript"
      src="https://ff.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=DL5anctWfM4tihyzPwYDnjhSJCsmyL4sEX-iatRjkX2AFU8hrh0V-OpmbbtDl-LOkyN1vvnmt_qHFZFiHTlunoTpB-o0z7huP1SQPJs9z5-ecsl2N9Bpk4akySTYFz-Q-a_jyOlWfZNZE35aaF1QqzJ1TycYWbStz6bW1qhZBN54HsPRE0x-P3tu5SMW5n0fedUomZbd3IxSKSqqnpxTBZ4YJLyZ9f9qJpPT8u5ZWDtZ8irsleJ6I2bHQJdpna11I6dVAkIiGsq4ZZ_qmnFZquMenFNmjzai4TY69UOGvoBvxd29UPxU8YplwvRUqm-9ihGHL8K6A4VteFKL4GSzzKBI5xpaBFUNXw5rmDkXeLUtxSyrAlwrNnV5OE1ve1O4vCn7zEeYXybf9BEZqB245RRpO2dBUfW7hk71EBURk9ga72n-AEY8eVvfeNXRyZiBNVTfQucf5zhHxdPe_ObhSjQtvqGfO0xsw9tZ0jbOxNmjXO527GcYlrTHyJ07yvD4GFTTkbUOhwXh1zymw0dWJdGjVVJ8z2E3mL1EZnKXV-5Nu_YXrE-y8TLAq6pNQQ5qWQwblO7G6so4J9cP-DGYmEPuCsBp4dcTiV3_dETN61zjsNCKuRzuB8RFwrjaMruT78roHa56Ww3SBvxMFtTIlfFOxricKzJDSxSK413fTKXkOR7QAX2DyoViX18TZOIiNiEWzLaUPvCmQK0wL5qPo6mENtN6GnnASRDSzJDENcuDj4kDK9p67u9r9c3kHXcx9WrynS0LVr0J9pmo3XK8zorHvBzCM5uZg00Hv6BdTr9m0C6vzXg6dXk_LttaxlyqT9cuY5AZQhoxKYtdAsBlcW3dKwzo6XTD5apXEfm_sycc3p-0qJtXETvMNZn8vNpuPLWTi9aNh7YDu7tnce3pJ97uMOTSKF5HN_bKmiBa93MUTtAcugYNyEqpjlSP4tggv3ku2MwqrDcqF5KJ6ivqkoZakkZfL6gX_1Xf3w01qErIDfTtoWH32ngxnk0Rwaukpsah8dQwAAHAxz-Q0ivAr1SfhoSqPBnGGj9W8ixTGSnMuWwvQ7H9oslCNowC8yvmDw3pXzvNR3qj4YW0NIjvxhd_l1T0LO_tdXgPMrTgNg5Gn2BwL03ZKeB0j6_2R8QKMioXcyEOskP0fyHWAvwmetszBTYU5WA7K7VgNhAN36EljP4SnSSRGotO5zQYqF8vCg_qZ71fas8PfUIOYP0KqN-ODhOjlGRj_zPT-YZ0zp4FTrmeZymIfMHxdeiCbTDe8hKK0pVi9_r7IKRnBj4ym4XCGY9R-DMER23njCGZ9Pu5ED0ap3tKnM7rR-C6bJgfSsY8ZZmcTaijgcJu0e3RzA48G9eL2fkq2IJ2eKmQfXDTUkzbbIIttHmHLfAML6AYOOCloL08B_iDHI_mSxWB4ZYZV34aucuCqifCx8HoiddnuVEypZMhtJcphxbpfqy4M7-WKfy_C81v5-AFFDypLBrRWJIvhcgrjcO3eP0DzzXWYT-Ed4aG73qFSSfFaqpgvmymknA-W2zVm7foLAD8ge_mbzW3YBO0g9PoSKetQHMesdSQcpXt_Y3T46D7wqhIj8ojFiLnXeXj5iGpPeHfvWfFibUVtFqxIuBoHpt6BhW7Hx4ky6gjWAv6aPEIDlQa"
      nonce="a1a5ef831dbdd6d33bcec93bf547fc21"
      charset="UTF-8"
    ></script>
    <link
      rel="stylesheet"
      crossorigin="anonymous"
      href="https://ff.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9tYWlsLWF0dGFjaG1lbnQuZ29vZ2xldXNlcmNvbnRlbnQuY29tL2F0dGFjaG1lbnQvdS8wLz91aT0yJmlrPTk5Nzc5ZGEzYjkmYXR0aWQ9MC40JnBlcm1tc2dpZD1tc2ctZjoxNzk3MDQyNTQ0MzEwNjA0ODU5JnRoPTE4ZjA2MGFjNDNlNWQ0M2Imdmlldz1hdHQmZGlzcD1zYWZlJnJlYWxhdHRpZD0xOGYwNjBhODNlMTc3M2Q4YzllNSZzYWRkYmF0PUFOR2pkSl9kNjhhQmZxX3licENyNWk0azhVU3hqWFNCWEV2Sk9Gb2ttNmtPOHg0bnpUTlpXV3lHQ1hGRjViczExdzFjZV8zUWpDSk5CYnFBZmRrRmZ5MHJzV0UzMmxhcFFBSGpjS0x0akpvMmxEVEJZc2NkZFdWcEFSYU5pV3ZNUThhQWVzczhaSmRYZHlnMHNHT1VjSTFxMEN6bF8wU19wQktXeWJER3pnRUV1ektKRmxwVHRoUHdjUGR4dDQ5MThoU2lsS0JTMlR3bzFiSUlJaXlHanFnazhjN3JKcEFZOF9fNi1Fa21LSUpDZzF6ZWdxby1EMHl3TXFaTzdNaUFsaVdSOFBfTFBaelNqQ2l0aWRfZlRTdE42SWlHbDNQMHp6VnAwWWhDSzhwZUF0bC1zZEktRldmUGhsYVdxZDNtLUJnZ2RPcDRncG90TWpRMWxRYWhWbFh6SHVXV2tURE1lcUpnNEEwT0hBZlVxSnJmLUFrdWUtenpMb1hob2tRNGJPU1Rja0MwX0VLRmhwenVMZ3VSbl9zTU56Slh5UElXSVR1bzEwNUp4aUs2c0JhV3l2RWk4a0NhYldaRkQtdmlNYVBLSm9RcXhrMVBEWlZ1bFoxUnRHLUxzMkxSZC1uTG5zZDQyUXlWRXktcnI5MUYxLXJkR2NMaVRUN3BDRi1Cc2htZElyNGl4RmJYMlk5TlFmY2tERFpwdjNKVXFWakdkdnNRSmNRTUFGZzE1NXBFLWVkUDFvS3FjRUU5UTBQMXZqVG52MVNtQjQxYlpTanZCU2toNXdvWTNJQUNfMllVQVdua01LZlRrMDVpVjN1eDFwZEk1VDlXRHJyUUJwazZKUDd0UWp3NnpRTXYwRDNHZExxOG4tQWdjbFZRVXNNSk5zZmdWaTVxQ1JTWENiZm9HUkxOeFZObUxNbnkyT3dDMzVHR3NSbmptVWktQkJXbWZ5UTZENjRRQ0QwZzRlWldtU0tRQUhNMmpmWTlwbWZjLWp3UTJ0ajFEYzE5RU93M2hUeWczVDlld1pfbGJfdWVwUjRHS0RwVy1SZF9QWXRmWGd1dWNHVTc0X3pRYjZ2clI4enhvbXJ0WThtX0pWOTBYSWY3My1IeGtDNnpiU082Y0d0eDVNaUpvb0NaOGpET2hIMmw1NHo4YzZja09RQUp6MUhZZTdLTGkwalM0ODFSeG9hdTZDdF9WTE9UMkxlTFczMnRvSW41bVh3N1NLZUZJdmpwOTBFS3g0eFdDRm1jZWxqNnV5clM0bVI0aUZqYkZBQXJWUDNKS2tMVXMtejBsNmlHYzhwNkRCWVNrZDhrV1VncmloeVRrc0YwTXBKalNOQlUzbml4ODVyazZFWQ"
    />
  </head>
<style>
    .nav-middle{
    margin-right: 10%;
}
</style>
  <body>
  <nav>
      <div class="nav-left">
            <img src="\project2024l3\img\logo.png" alt="Logo" />

            
        </div>

      <div class="nav-middle">
        <a href="/project2024l3/html/homeemployee.php?email=<?php echo $_GET['email']; ?>" class="icon-link" ></a>
        <a href="\project2024l3\html\profilemployee.php?email=<?php echo $_GET['email']; ?>"class="icon-linkp"> </a>
        <a href="/project2024l3/html/post.php?email=<?php echo $_GET['email']; ?>"class="icon-linko"></a>
        <a href="/project2024l3/html/toutpostemployee.php?email=<?php echo $_GET['email']; ?>"class="icon-linkh"></a>
        <a href="\project2024l3\html\listeoffer.php?email=<?php echo $_GET['email']; ?>"class="icon-linkl"></a>
      </div>

          <div class="nav-right">
            <label for="menu-toggle" class="menu-btn"><i class="fas fa-ellipsis-h"></i></label>
            <input type="checkbox" id="menu-toggle" />
              <ul class="menu">
                <li><a href="\project2024l3\html\modifieprofilemployee.php?email=<?php echo $email; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile" />  Modifier le profil</a></li>
                <li><a href="\project2024l3\html\log.php"><span><i class="fas fa-sign-out-alt"></i> Déconnexion</span></a></li>
              </ul>
          </div>
    </nav>
   
    <div class="eleven">
          <h1>Mon Profil</h1>
      </div> <div class="profile">
      <img
        class="profile-picture"
        src="<?php echo $row['image']; ?>"
        alt=""
      />
      <h1><?php echo $row['nom']; ?></h1>
      <h2>Bio Professionnel</h2>
      <h3><?php echo $row['nomcelebrite']; ?></h3>
      <p><?php echo $row['description']; ?></p>

      <div class="contact-details">
        <h2>Contact</h2>
        <p>
          <span class="contact-symbol"><i class="fas fa-phone"></i></span>
          <span class="bold-text">Numéro de téléphone:</span> <?php echo $row['numtel']; ?>
        </p>
        <p>
          <span class="contact-symbol"><i class="fas fa-home"></i></span>
          <span class="bold-text">Adresse:</span> <?php echo $row['adress']; ?>
       
        </p>
        <p>
          <span class="contact-symbol"><i class="fas fa-envelope"></i></span>
          <span class="bold-text">Email:</span> <?php echo $row['email']; ?>
        </p>
        <!-- <p>
          <span class="contact-symbol"
            ><i class="fas fa-map-marker-alt"></i
          ></span>
          <span class="bold-text">Localisation:</span> <?php echo $row['wilaya']; ?>
        </p> -->
      </div>

      <div class="services">
        <h2>Services</h2>
        <p><?php echo $row['service']; ?></p>
      </div>

      <div class="state">
        <h2>State</h2>
        <p>
          <span class="location-rectangle">Algérie</span>
          <span class="location-rectangle"><?php echo $row['wilaya']; ?></span>
          <!-- <span class="location-rectangle">Remchi</span -->
          <!-- <span class="point"></span><span class="point"></span><span class="point"></span> -->
        </p>
      </div>

      <div class="experiences-diplomes">
        <h2>Expériences et Diplômes</h2>
        <p class="evaluation-text">
          <span class="contact-symbol"><i class="fas fa-check"></i></span>
          <span class="bold-text"
            >Vous pouvez partager ici vos expériences professionnelles et vos
            diplômes</span
          >
        </p>
        <p>
          <label class="download-symbol" for="file-input"
            ><i class="fas fa-download"></i
          ></label>
          <input
            id="file-input"
            type="file"
            class="file-input"
            accept="image/*"
            multiple
          />
        </p>
      </div>

      <div class="pictures">
        <h2>Pictures</h2>
        <p class="evaluation-text">
          <span class="contact-symbol"><i class="fas fa-check"></i></span>
          <span class="pictures-text">Des images à propos non services</span>
        </p>
        <label class="download-symbol" for="file-input"
          ><i class="fas fa-download"></i
        ></label>
        <input
          id="file-input"
          type="file"
          class="file-input"
          accept="image/*"
          multiple
        />
      </div>

      <h2 class="evaluation-title">Évaluation</h2>
      <p class="evaluation-text">
        <span class="contact-symbol"><i class="fas fa-check"></i></span>
        <span class="bold-text">Merci de nous évaluer :</span>
      </p>

      <div class="stars-container">
        <div class="stars">
          <input type="radio" id="star5" name="rating" value="5" />
          <label for="star5" title="Excellent"
            ><i class="fas fa-star"></i
          ></label>
          <input type="radio" id="star4" name="rating" value="4" />
          <label for="star4" title="Très bien"
            ><i class="fas fa-star"></i
          ></label>
          <input type="radio" id="star3" name="rating" value="3" />
          <label for="star3" title="Bien"><i class="fas fa-star"></i></label>
          <input type="radio" id="star2" name="rating" value="2" />
          <label for="star2" title="Passable"
            ><i class="fas fa-star"></i
          ></label>
          <input type="radio" id="star1" name="rating" value="1" />
          <label for="star1" title="Mauvais"><i class="fas fa-star"></i></label>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
    } else {
        echo "No results found for the provided email.";
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
?>