
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
    
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    // Check if the service name is not empty
    if(empty($category)) {
      $error_message = "Le champ de catégorie ne peut pas être vide.";
    
    } elseif ( preg_match('/\d/', $category)) { // Check if the service name contains any digits
      $error_message = " la catégorie ne peut pas contenir de chiffres.";
    
    } else {
      // Check if the service already exists in the database
      $check_query = "SELECT COUNT(*) AS count FROM category WHERE nom = '$category'";
      $check_result = mysqli_query($con, $check_query);
      
      if($check_result) {
        $row = mysqli_fetch_assoc($check_result);
       
        if($row['count'] > 0) {
          $error_message = "La categorie existe déjà.";
       
        } else {
          // Prepare and execute the SQL query using prepared statements
          $sql = "INSERT INTO category(nom) VALUES(?)";
          $stmt = mysqli_prepare($con, $sql);
          
          if($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $category);
           
         if(mysqli_stmt_execute($stmt)) {
               header("Location: \project2024l3\html\listeserviceadmin.php");
                
            } else {
                $error_message = "Erreur lors de l'insertion de la catégorie: " . mysqli_error($con);
              }mysqli_stmt_close($stmt);
              } else {
                $error_message = "Erreur: Impossible de préparer la déclaration de la catégorie.";
              }
            
        }
      } else {
        $error_message = "Erreur: " . mysqli_error($con);
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
    height: 100vh;
  
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
    color: #fff;
}

button:hover {
    opacity: 0.8;
}

</style>
  <body>
    <div class="container">
      <div class="custom-box">
        <h2 class="title">Ajouter Categorie</h2>
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
            <label htmlFor="category">
              <strong>Catégorie:</strong>
            </label>
            <input
              type="text"
              name="category"
              placeholder="Entrez la catégorie"
              onChange=""
            />
          </div>

          <button class="button" name="button">Ajouter Categorie</button>
        </form>
      </div>
    </div>
  </body>
</html>
