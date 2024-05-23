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
    <link rel="stylesheet" href="\project2024l3\css\adminlisteemployee.css" />
  </head>

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
              <!-- <li class="nav-item">
                <a
                  href="\project2024l3\html\statistiqueadmin.html"
                  class="nav-link"
                  id="classw"
                >
                 
                  <span class="customv">statistique</span>
                </a>
              </li> -->
              <li class="nav-item">
                <a
                  href="\project2024l3\html\adminlisteemployee.html"
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
                <a
                  id="classw"
                  class="nav-link"
                  href="\project2024l3\html\log.php"
                >
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
            <div class="custol">
              <div class="classf">
                <h3>Employee List</h3>
              </div>

              <div class="mt-3">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <!-- <th>Image</th> -->
                      <th>Email</th><th>Numéro de téléphone</th>
                      <th>Adresse</th>
                      <th>Service</th>
                      <th>Action</th>
                    </tr>
                  </thead>
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

$error_message = "";


$sql = "SELECT nom, email, adress, numtel,service FROM employee ORDER BY nom";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nom"] . "</td>";
        // echo "<td><img src='data:image/jpeg;base64," . base64_encode($row["image"]) . "' alt='' class='employee_image' /></td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["numtel"] . "</td>";
        echo "<td>" . $row["adress"] . "</td>";
        echo "<td>" . $row["service"] . "</td>";
        echo "<td><button class='button' id='delete-button'>Supprimer</button></td>";
        echo "</tr>";
    }
} else {
    echo "";
}
$mysqli->close();
?>

                </table>
              </div>
            </div>
          </div>
          <Outlet />
        </div>
      </div>
    </div>
  </body>
</html>
