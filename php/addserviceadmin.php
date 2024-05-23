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

  $error_message = ""; 

  if(isset($_POST['button'])) {
    // Validate and sanitize user input
    $service = isset($_POST['service']) ? $_POST['service'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    // Check if the service name is not empty
    if(empty($service) || empty($category)) {
      $error_message = "Les champs de service et de catégorie ne peuvent pas être vides.";
    } elseif (preg_match('/\d/', $service) || preg_match('/\d/', $category)) { // Check if the service name contains any digits
      $error_message = "Le nom du service et de la catégorie ne peuvent pas contenir de chiffres.";
    } else {
      // Check if the service already exists in the database
      $check_query = "SELECT COUNT(*) AS count FROM service WHERE nom = ?";
      $stmt_check = mysqli_prepare($con, $check_query);
      mysqli_stmt_bind_param($stmt_check, "s", $service);
      mysqli_stmt_execute($stmt_check);
      $result_check = mysqli_stmt_get_result($stmt_check);
      $row_check = mysqli_fetch_assoc($result_check);
      mysqli_stmt_close($stmt_check);
      if($row_check['count'] > 0) {
        $error_message = "Le service existe déjà.";
      } else {
        // Check if the category exists in the database and retrieve its ID
        $cat_id_query = "SELECT id_category FROM category WHERE nom = ?";
        $stmt_cat_id = mysqli_prepare($con, $cat_id_query);
        mysqli_stmt_bind_param($stmt_cat_id, "s", $category);
        mysqli_stmt_execute($stmt_cat_id);
        $result_cat_id = mysqli_stmt_get_result($stmt_cat_id);

        // Check if the category ID is retrieved successfully
        if ($result_cat_id && mysqli_num_rows($result_cat_id) > 0) {
          $row_cat_id = mysqli_fetch_assoc($result_cat_id);
          $id_category = $row_cat_id['id_category'];

          // Insert the service into the database with the category ID
          $sql = "INSERT INTO service(nom, id_category) VALUES(?, ?)";
          $stmt = mysqli_prepare($con, $sql);
          mysqli_stmt_bind_param($stmt, "si", $service, $id_category); 
          if (mysqli_stmt_execute($stmt)) {
            header("Location: \project2024l3\html\listeserviceadmin.php");
            exit; // Exit to prevent further execution
          } else {
            $error_message = "Erreur lors de l'insertion du service: " . mysqli_error($con);
          }
          mysqli_stmt_close($stmt);
        } else {
          $error_message = "Erreur: Impossible de récupérer l'ID de la catégorie.";
        }
      }
    }
  }
?>



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
    <!-- <link rel="stylesheet" href="\project2024l3\css\addserviceadmin.css" /> -->
  </head>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top:1px;
    height: 90%;
    padding: 20px;
    width: 100%;
}

.custom-box {
    padding: 20px;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 40%;
    height: 30%;
}

.title {
    color:  #030a5e;
    font-size: 24px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}
select,
input[type="text"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  margin-top: 5px;
}
input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background-color: #358bdc;
    font-size: 16px;
    transition: background-color 0.3s ease;
    color: #fff;
}

button:hover {
    opacity: 0.8;
    background-color: #0056b3;
}

</style>
  <body>
    <div class="container">
      <div class="custom-box">
        <h2 class="title">Ajouter Service</h2>
        <?php 
    if(!empty($error_message)) {
      echo "<p style='color: red;'>$error_message</p>";
    }
  ?>
        <form
          onSubmit=""
          method="post"
          action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
        >
        <div class="form-group">
            <label for="category"><strong>Catégorie:</strong></label>
            <select name="category">
              <?php 
                // Query to retrieve all categories from the database
                $query = "SELECT * FROM category";
                $result = mysqli_query($con, $query);

                // Check if there are any categories available
                if(mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    // Display each category as an option in the dropdown list
                    echo "<option value='".$row['nom']."'>".$row['nom']."</option>";
                  }
                } else {
                  echo "<option value=''>Aucune catégorie disponible</option>";
                }
              ?>
            </select>
          </div>
        <div class="form-group">
            <label htmlFor="service">
              <strong>Service:</strong>
            </label>
            <input
              type="text"
              name="service"
              placeholder="Entre Service"
              onChange=""
            />
          </div>
          
          <button class="button" name="button">Ajouter Service</button>
        </form>
      </div>
    </div>
  </body>
</html>

