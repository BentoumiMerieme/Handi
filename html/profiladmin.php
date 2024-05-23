<?php

// Connect to the database
$host = 'localhost'; // Database host
$username = 'root'; // Database username
$password = ''; // Database password
$database = 'project'; // Database name

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
$email = "merieme@gmail.com"; 
$stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?"); 
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
    <title>Profil</title>
    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
    <link rel="stylesheet" href="\project2024l3\css\profiladmin.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <script
      type="text/javascript"
      src="https://ff.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=y7Btfj_Jm3C7G3cQZkfyJKziY-2l_V4WoBXzwMQJFw9VL1r-dGmQ6qYfK8a2jkFwEdUxL0yhCKv94oxkXERrbKQ9J_NNrhoLO7h37U8P2QwMVDE-YxrYxNd_KfI1Iegw8yS7Ew_yYyTfEw3S250RsDS2SgpBkbWRgwFq6QPqTsK-FChBnQ0EsNVrEEc2WHB_1a9R3N5ng8mi3uALaWF5RUF8rt77l5MV02y3M6ip8HkAukriAbecxjxYvaEFqwtgCVMyli4W8_MySBn068WZRoH1daEPleP1yAyym3XzNVRIxHCp8kguH10Ji5JrU6DzRdnJQ5hx3bwCgPEb76cFRUgoFl-gHhAlP9mhMuqkNyW9Lb2kmtN0ef3oFi-gXoXEF_2uqbxkiq7T2qAG5G8z8Z1epGjswCF7VIykAuOWMseFLUVhKXDg2cPZLmAZPBLrtTn5xK_Ccyf136ZEBD77xXTs7wQuJhXY3lNdpmSw1G1F8dLPet7FLJHEjazCDMLQurmtD4msY9Xkfyw4culUQovyIJVLxkBOb1ruen-cOETyQhF0PFusmySwmtLWMq3UGLv5ldcT28oYSqpv-XFibmX6IV2q450y4RdzrP1ZIS3KyxEDuKcPYKNayumE6JmW0bZ0nT_EzanMfEjhHVF_gZdYNy2NToFHOahGGWc8L1BsV1f7AOXmbJ82GR2dQgLI-LrR0vnqu8PRboCRg4ZFmsL09Zy1NxYJ90URnGufolS_WwhjQQ-Y3y27Iv1M2O_2AANnvSfXMpRHJ60KyxEUMu9imqJWsBicoUJql-J92eD2Lwov7rioCKqNJbG6lh0qynqitD6LYCCyYQK6nQE_uLlYs0Wc45mG7noZW36XFevMimFLShLpj21Yot5O3cxL0T4ZKjsqZtqdaBaP_PUBhdMzPPkZX18yTMwMA_KNNUgI17ZlwClUVOrQuwipWsaTIdPrpH64-vt5TUaF4mhE2xlJnI-Eb7JVFESjKKGr672H6YX2-v9ZX2EhqY8sXHCvq6po6m1XgC3hB0n3F4IOfbSJJ3UC2aSnEPPaxANsNbOGipfip3qEBOjiroKVsSKLCHuPzbYEtzUSSyJoxK8-br3N998DB17sD5Bd2uJ4wGU704UgS-76FgUKUxXPrYht_NXRUD3eLkdCG2HvXiNOGqOjklS3F3dNeszZ_hzb5kBXtfWJ2xE3I1pRgq6EZqq5E4vfhCnl5c1n-ILee2NAuN7Gs-3_hZxfm5cWT4M-5I3mQgTv1oCKH0drl22OLYmFMij9_m1tMyvB7uxdygyhn2XBedxDd6kAsck_x3MbQL1zCv2fnc1H8_8DM3dIMKQ_Ztp6Lxevmdq-zFHrDJ1MU796dG5M8HkpnNydsabVMwW8q1x4WGe7oZhumRTZzLx6dwyomgXP1pP8pdFPmbxrb14PQV6sDktrZtIUh9M0M-ckiU5wWw62ovlrfjCNsqVuVnQpWmTiepTbQu9KFJ1l3No4AYnlF2iw8I4O_W1kmxb-HTs3HqDBlLIyrZB1wepwZzf7snKrpmNvgKSjwNjqTTVck1kFU91dqiA_JeCUSaDXUT0h4rHJG-LJVERk5Pjn4LoJ1yTShQJwlmJugWv7S5znwn00IH0hdB0jjfiwB5yDlbB3_OJf34LQ9kcaC-zu"
      nonce="2fb91918848d9ac20877916305afa6e7"
      charset="UTF-8"
    ></script>
    <link
      rel="stylesheet"
      crossorigin="anonymous"
      href="https://ff.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cHM6Ly9tYWlsLWF0dGFjaG1lbnQuZ29vZ2xldXNlcmNvbnRlbnQuY29tL2F0dGFjaG1lbnQvdS8wLz91aT0yJmlrPTk5Nzc5ZGEzYjkmYXR0aWQ9MC4xJnBlcm1tc2dpZD1tc2ctZjoxNzk3MDQyNTQ0MzEwNjA0ODU5JnRoPTE4ZjA2MGFjNDNlNWQ0M2Imdmlldz1hdHQmZGlzcD1zYWZlJnJlYWxhdHRpZD0xOGYwNjBhMGIwZjI2NGJmNmVhMiZzYWRkYmF0PUFOR2pkSl9HRk10X3NNNXpkdmswd2pURUZxX29vYTdLbkd3ZVd2cmNuU3V3UEpObWRTSExvMmp4QXo5bkV0Q0lyQVB1LVYtVzRldURnZHpuRVRKZkQ5M2Y2NGYzeFBNaThuNlJ6aGpjdjJZQ09jdDJ5alZwRFB1T05hS0Jacm9NTFRTTzBxNlZpa1dsQXdoOEZ1Sl9rcXcxRkJ2cVVZUEwyZEFUUlhDNElQSnRoSUJjSThMS3o5V2t0OFUwS21fb1RtVFVCRWRLeWIwU1NrbXRNSFVUREZRcFJBRVF4NEUycGVodTRBSUxZdjVzMTZiRnpiTnZxMEJfdUU4Tzk2WnRIUWNGUHFoNFk0RWNzZXFqQTB3UlI1Z3gzdW5QUjVFaGV1QWpBa3Jram5vVVhYWGd5dG9TS0IwTnBnT0IwX0poWTQ2U0FpTmkwNjVqamlRUjB6bUFiWWtVTXllVXNFVjM1cFk2bWJqY0RRdDlaMmE0S1d5T29ySmNXc1Z0cG84cnhwVUNicTNEZjh5eXNoNUhHUWxEcjI5MXhvLW9IaHJMcTAtYkNRU0xDZTNrMWg4eXo1QXZtRTFveTc4U09QdkZNWjc4a1lGeXZOakdFc1RxQnAtWWd5dGw4bm1UYW5ObHNIOGZlTFV0UFhUSHZab1dES0M1RFlLc1FpcGJhV3ZzX3RQOWJZdE03STREY0hFS0pVTVBaTDk0cHVMdXpRNWNxZ2RMOGRuZ1pudWpncUhkTExQSVlrR0xKMTg0MUJZenB0RjZFZGxMZm5jWGFhd0RkcDhxVDhRZVRmVmFWNTBTTFgyTUk2TXhqTENOQzZLVTBzRWFmZ3VGb1kyQWtTNGxzdlVZanpjSVhTZ2t3VE4xSUJkeXZrU2dIbkFUYmxpSDFyUFBrT3pnTTY1NVBxTjBtTE1USVhyWkxRR0dWTDNzR21WWFBnSGFqQXB5ODdEOVJXbW44bE1fTzZBNE1SeU8zRUw5OHVaX0pTRFhDYVJoY1lSTVpZMWZjeVkwVXk1UEhaWHcteFA3dmJ4d1RCQW5WcDl0cXNqTVBINnA2UndubVNxYXJERFh2SUlVVEx0R3BDNEhjQUhEYlRLUWtQSmRCdjdvalNmaWNkX0c5UHljN29FdjM5ZGhmc25vSmppSEgzeFFHWXNQMmMyeDNXT0tBMFJpVG81QTIwaXlqLXBSWWI5MGh1cE45aUp0QXl5VUhQRlJLNmVTU1g3blBaYjBFTHpvZzdScVhOZlBGNElkRk9OaS03SHJ6QTBZbFlXc0xFdVlVc2paT1UxaEZHVi1vTkwxa1ZjbF9IbEtLTlgxaG96am8tYVdGV25sWWNpc01WSVRwMlZ4Z1hJbEpwOA"
    />
  </head>
  <style>
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
    <div className="container-fluid">
      <div class="custom-row">
        <div class="custom-col">
          <div class="custom-flex">
            <a href="\project2024l3\html\homeadmin.php" class="custom-flex2">
              <span class="customb">
                <img class="imglogo" src="\project2024l3\img\logo.png" alt="" />
                Handi
              </span>
            </a>
            <ul class="custom-nav" id="menu">
              <li class="nav-item">
                <a
                  href="\project2024l3\html\adminlisteemployee.php"
                  id="classw"
                  class="nav-link"
                >
                  <!-- <i class="fsb"></i> -->
                  <span class="customv"> Liste Employees </span>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="\project2024l3\html\listeserviceadmin.php"
                  id="classw"
                  class="nav-link"
                >
                  <!-- <i className="fs-4 bi-columns ms-2"></i> -->
                  <span class="customv">Service</span>
                </a>
              </li>
              <li class="nav-item">
                <a
                  href="\project2024l3\html\profiladmin.php"
                  id="classw"
                  class="nav-link"
                >
                  <!-- <i className="fs-4 bi-person ms-2"></i> -->
                  <span class="customv">Profil</span>
                </a>
              </li>
              <li class="nav-item" onClick="">
                <a id="classw" class="nav-link" href="\project2024l3\html\log.php">
                  <!-- <i className="fs-4 bi-power ms-2"></i> -->
                  <span class="customv">Se déconnecter</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="colp">
          <div class="offf">
            <h4>Offre Service pour Clients</h4>
            <div class="profile">
              <img class="profile-picture" src="<?php echo $row['photo']; ?>" alt="" />
              <h1><?php echo $row['nom']; ?></h1>

              <div class="contact-details">
                <h2>Contact</h2>
                <!-- <p>
                  <span class="contact-symbol"
                    ><i class="fas fa-phone"></i
                  ></span>
                 
                </p> -->
                <p>
                  <span class="contact-symbol"
                    ><i class="fas fa-envelope"></i
                  ></span>
                  <span class="bold-text">Email:</span><?php echo $row['email']; ?>
                </p>
              </div>
            </div>
          </div>
          <Outlet />
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