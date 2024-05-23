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
        $row = $result->fetch_assoc();}
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
    <link rel="stylesheet" href="\project2024l3\css\style.css" />
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
      .icon-linkp img {
        width: 18px; 
        height: 18px; 
        margin-right: 10px;
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
      .icon-linkl {
        background-image: url('/project2024l3/img/offerjob.png');
        background-size: cover; 
        width: 32px; 
        height: 32px;
        display: inline-block; 
        margin: 0 100px;
        background-size: cover;
        width: 32px;
        height: 32px;
      }
      .icon-linkh {
        background-image: url('/project2024l3/img/historique.png');
        background-size: cover; 
        width: 32px; 
        height: 32px;
        display: inline-block; 
        margin: 0 100px;
        background-size: cover;
        width: 32px;
        height: 32px;
      }
      .nav-middle{
        margin-right: 20%;
      }
      form {
             margin: 50px auto;
             background-color: #fff;
             padding:20px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
             border-radius: 5px;
             max-width: 600px; 
        }
        .form-header {
             text-align: center;
             margin-bottom: 20px;
             font-size: 24px; 
             background-color: #fff;
             color: #007bff;
        }
        #search-container{
          padding: 0;
        }
        textarea,   button, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="file"]{
          width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            
        }
        textarea {
            height: 200px;
            resize: none;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            display: block;
            width: 100%;
            text-align: center;
        }
        button:hover {
            background-color: #0056b3;
        }
        #search-container{
          padding: 0;
          border-radius: 25px;
        }
        #rechercher{
          height:40px;
        padding:5px 10px;
        border:none;
        border-radius: 25px;
        outline:none;
        background-color: #eee;
        margin-left: 10px;
        width: 300px;
        }
        .h5title{
          display: flex;
          justify-content: center;
          color: #03A64A;
      }
  </style>
  <body>
  <nav>
      <div class="nav-left">
            <img src="\project2024l3\img\logo.png" alt="Logo" />

            <div class="search-container">
              <form action="" method="POST" id="search-container">
                  <input type="text" name="emails" class="recherche" id="rechercher" placeholder="Recherche avec Email.." />
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
            <label for="menu-toggle" class="menu-btn"><i class="fas fa-ellipsis-h"></i></label>
            <input type="checkbox" id="menu-toggle" />
              <ul class="menu">
                <li><a href="\project2024l3\html\modifieprofilemployee.php?email=<?php echo $email; ?>" class="icon-linkp"><img src="/project2024l3/img/user.png" alt="Edit Profile" />  Modifier le profil</a></li>
                <li><a href="\project2024l3\html\log.php"><span><i class="fas fa-sign-out-alt"></i> Déconnexion</span></a></li>
              </ul>
          </div>
    </nav>
    <form id="postForm" method="POST" enctype="multipart/form-data">
    <h2 class="form-header">Creation de Post</h2>
    <textarea id="postContent" placeholder="écrivez quelques choses...!" name="content"></textarea>
    <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
  
    <input type="file" name="image" >
    <!-- id="image" accept="image/*" -->
    <button type="submit" name="button" value="Upload">Post</button>
</form>
  </body>
  <!-- <script>
    document.getElementById('imageUpload').onchange = function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // Display image preview
            };
            reader.readAsDataURL(this.files[0]);
        }
    };
</script> -->
</html>
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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['button'])) {
    $email = isset($_POST['email']) ? mysqli_real_escape_string($mysqli, $_POST['email']) : '';
    $content = isset($_POST['content']) ? mysqli_real_escape_string($mysqli, $_POST['content']) : '';
    // $video = isset($_FILES['video']) ? $_FILES['video']['name'] : '';
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    // copy($image_tmp, __DIR__ . "/html/images/$image");

    // $imageData = '';
    // if (isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] == 0) {
    //     $target_dir = "uploads/";
    //     $target_file = $target_dir . basename($_FILES["imageUpload"]["name"]);
    //     $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    //     if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
    //         $image = basename($_FILES["imageUpload"]["name"]);
    //     } else {
    //         echo "Sorry, there was an error uploading your file.";
    //     }
    // }
  //   if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
  //     $imageData = file_get_contents($_FILES['image']['tmp_name']);
  //     $imageData = mysqli_real_escape_string($mysqli, $imageData);
  // }
    $date_joined = date('Y-m-d H:i:s');
    $sql_post = "INSERT INTO post (email, content, image,  created_at) VALUES ('$email', '$content', '$image',  '$date_joined')";

    if (mysqli_query($mysqli, $sql_post)) {
        // $email = urlencode($email);
        // header("Location: /project2024l3/html/homeemployee.php?email=$email");
        // exit(); 
        echo "   <h3 class='h5title'> Les donnes sont modifie</h5> ";
    } else {
        echo "Error: " . $sql_post . "<br>" . mysqli_error($mysqli);
    }
}
?>