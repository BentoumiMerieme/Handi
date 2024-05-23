<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
    <link rel="stylesheet" href="\project2024l3\css\statistiqueadmin.css" />
    <!-- <link rel="stylesheet" href="\project2024l3\css\profiladmin.css" /> -->
  </head>

  <body>
    <div className="container-fluid">
      <div class="custom-row">
        <div class="custom-col">
          <div class="custom-flexx">
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
                  <span class="customv" >Se déconnecter</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="colp">
          <div class="offf">
            <h4>Offre Service pour Clients</h4>
            <div class="custom-container">
              <div class="custom-box">
                
                <div class="custom-text">
                  <h4>Employee</h4>
                </div>
                <hr />
                <div class="custom-flex">
                <?php
  $BDD = array();
  $BDD['host'] = "localhost";
  $BDD['user'] = "root";
  $BDD['pass'] = "";
  $BDD['db'] = "project";

  $con = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
  if(!$con) {
    echo "Connexion non établie.";
    exit;
  }
$sql = "SELECT COUNT(*) AS total FROM employee";
$result = $con->query($sql);

if ($result->num_rows > 0) {
   
    $row = $result->fetch_assoc();
    $total_employees = $row["total"];

    // عرض العدد في الصفحة
    echo "<h5>Total: $total_employees</h5>";
} else {
    echo "<h5>Total: 0</h5>";
}


$con->close();
?>

                </div>
              </div>
              <div class="custom-box">
                <div class="custom-text">
                  <h4>Client</h4>
                </div>
                <hr />
                <div class="custom-flex">
                <?php
  $BDD = array();
  $BDD['host'] = "localhost";
  $BDD['user'] = "root";
  $BDD['pass'] = "";
  $BDD['db'] = "project";

  $con = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
  if(!$con) {
    echo "Connexion non établie.";
    exit;
  }
$sql = "SELECT COUNT(*) AS total FROM client";
$result = $con->query($sql);

if ($result->num_rows > 0) {
   
    $row = $result->fetch_assoc();
    $total_employees = $row["total"];

    // عرض العدد في الصفحة
    echo "<h5>Total: $total_employees</h5>";
} else {
    echo "<h5>Total: 0</h5>";
}


$con->close();
?>

                </div>
              </div>
              <div class="custom-box">
                <div class="custom-text">
                  <h4>Service</h4>
                </div>
                <hr />
                <div class="custom-flex">
                <?php
  $BDD = array();
  $BDD['host'] = "localhost";
  $BDD['user'] = "root";
  $BDD['pass'] = "";
  $BDD['db'] = "project";

  $con = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
  if(!$con) {
    echo "Connexion non établie.";
    exit;
  }
$sql = "SELECT COUNT(*) AS total FROM service";
$result = $con->query($sql);

if ($result->num_rows > 0) {
   
    $row = $result->fetch_assoc();
    $total_employees = $row["total"];

    // عرض العدد في الصفحة
    echo "<h5>Total: $total_employees</h5>";
} else {
    echo "<h5>Total: 0</h5>";
}


$con->close();
?>

                </div>
              </div>
            </div>
            <div class="customm">
              <h3>Liste of Admin </h3>
                <!-- <button class="button" id="edit-button"><a href="\project2024l3\html\editprofiladmin.html"> add</a></button></h3> -->
              
              <table class="table">
                <thead>
                  <tr>
                    <th>Email</th>
                    <!-- <th>Action</th> -->
                  </tr>
                </thead>
                <tbody>
                <?php
  $BDD = array();
  $BDD['host'] = "localhost";
  $BDD['user'] = "root";
  $BDD['pass'] = "";
  $BDD['db'] = "project";

  $con = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
  if(!$con) {
    echo "Connexion non établie.";
    exit;
  }

$sql = "SELECT email FROM admin ORDER BY email";
$result = $con->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>";
        // echo "<button class='button' id='edit-button'>Edit</button>";
        // echo "<button class='button' id='delete-button'>Delete</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "0 نتائج";
}


$con->close();
?>

                </tbody>
              </table>
            </div>
          </div>
          </div>
          <Outlet />
        </div>
      </div>
    </div>
    <div>
      <script>
        document.getElementById("classw").addEventListener("click", function() {
    // Clear any session data or perform any other necessary actions
    // For this example, we'll simply redirect to the login page
    window.location.href = "log.php";
});

      </script>
  </body>
</html>
