

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
    <link rel="stylesheet" href="\project2024l3\css\listeserviceadmin.css" />
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
                > -->
                  <!-- <i class="fs"></i> -->
                  <!-- <span class="customv">statistique</span>
                </a>
              </li> -->
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
            <div class="ls">
              <div class="dflex">
                <h3>Liste Service et categorie</h3>
              </div>
              <div class="dflex">
                <a
                  href="\project2024l3\php\addserviceadmin.php"
                  class="button"
                >
                  A.Service
                </a>
                <a
                  href="\project2024l3\php\addcategoryadmin.php"
                  class="button"
                >
                  A.Categorie
                </a>
              </div>

              <div class="tablecontainer">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Category</th>
                      <th>Nom service</th>

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

  // Retrieve service names from the database
  $query = "SELECT service.nom AS service_nom, category.nom AS category_nom 
  FROM service 
  INNER JOIN category ON service.id_category = category.id_category
  ORDER BY category_nom";
  $result = mysqli_query($con, $query);

  // Check if any rows were returned
  if(mysqli_num_rows($result) > 0) {
    // Start table rows
    
    while($row = mysqli_fetch_assoc($result)) {
      // Generate HTML for each service name
      // echo "<tr><td>{$row['category_nom']}</td><td>{$row['nom']}</td></tr>";
      echo "<tr>";
        echo "<td>{$row['category_nom']}</td>"; // Display category name in a table cell
        echo "<td>{$row['service_nom']}</td>"; // Display service name in a table cell
        echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='1'>No services found</td></tr>";
  }
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
  </body>
</html>
