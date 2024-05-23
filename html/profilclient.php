<?php

// Connect to the database
$host = 'localhost'; // Database host
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'project'; // Database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$email = $_GET['email']; 
$stmt = $conn->prepare("SELECT * FROM client WHERE email = ?"); 
$stmt->bind_param("s", $email);
 $stmt->execute();
  $result =$stmt->get_result(); 
  if ($result->num_rows > 0) { // Fetch data from the result
 $row = $result->fetch_assoc(); ?>

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
    <link rel="stylesheet" href="\project2024l3\css\profilclient.css" />
    <link rel="stylesheet" href="\project2024l3\css\style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <script
      type="text/javascript"
      src="https://ff.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=MPV6zos89Z147OhqXBOpD2ZZki8lZQeuQ5DWxI7J6evZxGOjewPftNBPhSqEunuXYORiKQFOcL4EgVHbFea6hW8G99m9BrngM8Y68WCbMbkXtE3LYwH2dz8E6najtc-E_8KGiRwTaJGJ8VL2o1_y4iCtU1YpUgF2BhYM73IWYcfQfIqxtA7OzT75oge1BqWFE6zJr2NXgrwcjFCBxRwFhyiI86FicIJmY6BoHqR2u4gAMyZBwGDODv5aBSlbwhXq427iV5TIO9KuPcKR36pXXEZryXFNjut0oSjbXlKGeQdBYT0-6PQPERy7DLHO0-CSbwPNHWAPod74nxGwXS7nX-zNvkjSahJnuYcl5JAaC8hum5eMYA5K-XzBPMtXAu3cCnptECWORgkoQPEauWSL9J46q7lvSTRZGX0SVctftBF4IAXA1H6SXt1huruNHwfHi3Gth3Jzj99DAdtW89EuFECSjmmyiA-MVgOMB488kT1d92u3rWXypXplx6YH9NMwfSLpfXcSHg4ee4fq8PD-Dy5ONA1i5lU_K-6VND6hlMUPOxaCGDOArWtKw7hwmuwyevpUpVlH2YxkFxxrgQwflZsalI9d3LoOF_MXalUrBTwSHOCLEdLC_Uq8T2tELewluK9V9vQm9g3aA48KFDweq9a-qWGIoH8JkynDTkAkbhr99lkKYp-shqIrrFmyp1gbHSplxgx4hdoyofS_IyJdU7iu525mFnpgQD_5RvrVGsst_RFCz05Y0DHJDfl7eS9uTd62jUCZf-RsEYpUjwkT68PL1uCfJP-eM4Q9XdUOl_jjTVhBTWnva8IvUhJFpy_6xnlMY_JFWVS_emgH0mbOgnqfgLGzTjlUIFvpUOlw1g19zosuYGGRW2gu8Gcy9DkEesChJwPte9F9SDvtHNoL5asrkSDuyy4uVcUf5uO5A6WRE07oyrjOHBON5QkyI3zMU-jMpXi9KrqNF_jFGgXTBps_-ClOzJuL-UxsumRYbAuznqLZ-QvBrG4W3cBRx4gPkK-M3ngYVR44_B2z3fb5Xsqe05FvpPUG29cFpeu9s3rXiqlaBcxlgk6Fxp9mVTKpEOnAn7DeeZohFiBOfOPyI_HWfxS8xdIxq-J7Ivr5rzUM0HoN6e0JHVXdkKylWZwNzFvTqipvGspuK2xniPn3BtCNc-Rh-VKVrzYEgf2rsqsmcBasIm74M0R5Kn1K-3rnG93G4ITzbRuggwWPGH-rOzUDn9vbgLmVDh2if73s0i6LdgPRV8f_OPF9NKHhfpdgamatKb952vcvK6gUVVn97DbtStk2jaMXnj_dkiTlblKfa4hxNrJzK_dN7XTRk27MfnN63D1ur7wI8yccK20l71PQQFyn4Akjy179--lXO2KxSgfKtMezSVyLllqQJIrRw0qDOkF7E6q4R1mbMTalOzRrt5KrtSdYjHKtcPc4EhnSaZB7cK6fz5OIZ06Pr6uNcjulx2AL2jVJG65g66JKKhZyhjERK1PRQnsKuwzMZO87y5pjjXA6-7qpAxOaZoDZXVd6pAoZCnv0ZRbUkizoWM1y_ShrsKSIE--IFE8NK-5Kj8WWITfds899pipWSWWNnxrURpn-WAnCqgEFx-zgLrZrzsaanORyOtn93EK8fYb5CvspIhVty9Zqsy3GY09M"
      nonce="b5dfb0a78912e65c6cee3c0e6dd6a807"
      charset="UTF-8"
    ></script>
    <link
      rel="stylesheet"
      crossorigin="anonymous"
      href="https://ff.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9tYWlsLWF0dGFjaG1lbnQuZ29vZ2xldXNlcmNvbnRlbnQuY29tL2F0dGFjaG1lbnQvdS8wLz91aT0yJmlrPTk5Nzc5ZGEzYjkmYXR0aWQ9MC4yJnBlcm1tc2dpZD1tc2ctZjoxNzk3MDQyNTQ0MzEwNjA0ODU5JnRoPTE4ZjA2MGFjNDNlNWQ0M2Imdmlldz1hdHQmZGlzcD1zYWZlJnJlYWxhdHRpZD0xOGYwNjBhMzE2NmYyZWRmM2VlMyZzYWRkYmF0PUFOR2pkSl9vandWcWdBQlh3QTlKMlpoeVB5MkJCdGFTSWo2NE5JdjJkT0tiT1M4QjJvTkhVblVJMXQzRjV6WjE1NmNTUE5VcUVIMmZ3NHc1cDg5d2dZdnNwUFliOHpabXhxYjR1RURpdmdJZVljQmVzODZYTS0wcVpPTXlzUWtxQTdyTjRPaklaUXdfWDdHYXVTdktaNzhLWFNMT0JLZThQTVF6NnBCc1Y5cGhFdlprc3B3YnEya1Z0QkdySUNhb1VaeFY4dXE1RDhvaE5McXlZNjM5bnpPelQ1LUJCRUVoaFh0cU92QVRsWlRWS1Q4QWE2YkpDVndaalZEVTkwVTJ0VXQ3cVh5MExtMlJaT3AyU2Z1Y3VtbFR1SzByZGVRWWluS2l1V09leXRfMmd4dHh1eF9oR01ERER3NjFoUlpaaXNnbHdkYjRMVV9JWXFGNHNoeHJOdGNkSTBNZEFZbnFLRW5xZ2Z6U0ZaX1BTbVZybUZxbkRIS2VGRXB4MjFjRml5aTN1YnlPNGRYYW4wNU0zYkhvY0lpZmNWdHZVVHFjak02RTJ1cXo3WFhaemtNSE9NWDFWd2pOeVJmRVpBWUR1MkRwN1p3YXcxM20tRkpEamMyZm9CRVB5R2VvM2VIUjFScEhpSXZuZVRPWHVPUGsyZWZ3cXdvNUtpWi0tREo5a0VnX0ZiNWxYMXMwa3NmNmVVdUZYXzZMb25acmdqYlJKbmtYR1hJdnhCVkUtd0tpQWlCX3dTNUpPTjY5ZlRVZnBHWDFLb0FXYzlNOW1NdmdFbTBleVFqLTB3aVJCYldkMWFuZnpnTy1wTThyTjg0UGMyOWFUMDlQWEFuS0k5TGEtTlZxU1pVSVNVQmdpOVU1Ni1kcnR2RF8xSTMyYU9WNWJkb0R6Q21fLTk3N2R2T2tpMnlRUXllRG1ZWDFobjlQNTJLVUszeWNrVUZQbWt4WXVEQlRHSHVlTFMtUXdBMy1UYmgwQkxBVFZGczVOUFJSaXZud2xnYjcwZll3Q2lfMFFvdnk5TDVpM1FIZzNPUUlIeFV2cnUwUTZMTkhpb29oc3kwWkFEMmtzR0c4T2FyclJwcWpUX2Nxcm82dTFORmJXSTVkTG52aU5QMUVzU09iWWZKVURJYVBkOGNWUWFPY2RPUmozQ3hBV0ZSWF9CN1l6eVBrMFhuZVdPQ2F5OVVXSHMtTmxNQVR4VUp3VTlDX2V0ZXlnVUl5LUxKTG1PWnEwMXlLNm10bUZweXpLMkNDT0VPZ18yQUQxSHJJN3V6bXdvSTJPWS1GSjJQdDJTMDhHbFpEaTNsYi1PQ2FENm9EMlhaRnRUV25mT1ZpdmNPSk43cTJ0R016aElPWWRyTQ"
    />
  </head>
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
      .icon-link {
        background-image: url('/project2024l3/img/home-button-for-interface.png');
        background-size: cover; 
        width: 32px; 
        height: 32px;
        display: inline-block; 
    }

      .icon-linkp {
        background-image: url('/project2024l3/img/user.png');
        background-size: cover; 
        width: 32px; 
        height: 32px;
        display: inline-block; 
        margin: 0 100px;
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
        margin-right: 8%;
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
    /* قم بتعيين خلفية وأبعاد الصور حسب الحاجة */
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
    <body>
    <nav>
        <div class="nav-left">
            <img src="\project2024l3\img\logo.png" alt="Logo" />

            <!-- <div class="search-container">
              <form action="" method="POST">
                  <input type="text" name="emails" class="recherche" placeholder="Recherche avec Email.." />
                  <span class="error-message">
  
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
              </form>
            </div> -->
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
                        <!-- <li><a href="#"><i class="fas fa-cogs"></i> Paramètres</a></li> -->
                        <li><a href="\project2024l3\html\log.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>   
                    </ul>
        </div>
    </nav>
    <div class="eleven">
          <h1>Mon Profil</h1>
      </div>
    <div class="profile">
      
      <img
        class="profile-picture"
        src="\project2024l3\img\<?php echo $row['image']; ?>"
        alt=""
      />
      <h1><?php echo $row['nom']; ?></h1>

      <div class="contact-details">
        <h2>Contact</h2>
        <p>
          <span class="contact-symbol"><i class="fas fa-phone"></i></span>
          <span class="bold-text">Numéro de téléphone:</span><?php echo $row['numtel']; ?>
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
          <span class="bold-text">Localisation:</span>
          
        </p> -->
      </div>

      <div class="state">
        <h2>State</h2>
        <p>
          <span class="location-rectangle">Algérie</span
          ><span class="location-rectangle"><?php echo $row['wilaya']; ?>
        </p>
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