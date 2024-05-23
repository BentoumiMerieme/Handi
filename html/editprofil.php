<?php
ob_start(); // Start output buffering
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="\project2024l3\css\codecss1.css" />

    <link rel="stylesheet" href="\project2024l3\css\editprofill.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <script src="\project2024l3\js\codejs2.js"></script>
    <script src="\project2024l3\js\codejs1.js"></script> -->

    <title>HandiL</title>

    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
    <!-- <script src="\project2024l3\js\editprofill.js"></script> -->

    <script src="\project2024l3\js\editprofil.js"></script>
  </head>
<style>
  body{
        background-color: #eaeef6;
      }
      #appointmentForm{
    width:100%;
  }
  .container {
            max-width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding:40px 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
</style>

<?php
error_reporting(0);
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {
 
    echo "Image uploading . Your image<p/> ";
    
    $file = $_FILES["uploadfile"]["tmp_name"];   

    if(!isset($file) || $file == ""){
        echo "Veuilllez choisir une image";
    }
    else
    {     
        $image_size = getimagesize($_FILES['uploadfile']['tmp_name']);

        if($image_size==FALSE)
            echo "That's not an image.";
        else
        {
            $image_name = addslashes($_FILES['uploadfile']['name']);
            $image = file_get_contents($_FILES['uploadfile']['tmp_name']);

            echo "<br/>Image uploading depuis: ".$_FILES['uploadfile']['tmp_name'];
            echo "<br/>Image uploading depuis Name: ".$image_name;
            
            // $email = $_GET['email'];
            $db = mysqli_connect("localhost", "root", "", "project");
            $query  = "INSERT INTO tmp_photos (email, PHOTO) VALUES ( 100, ?)";
            
                $stmt = $db->prepare($query);

                $stmt->bind_param('s', $image);
                $stmt->execute();

                $lastid = $stmt->insert_id;
            // $lastid = mysql_insert_id();
            echo "<br/>Image uploaded. <p /> Your image ID : $lastid<p/> ";
            
        }
    }

}
?>
  <body>

  
  <!-- onsubmit="return validateMyForm();" -->
    <form id="form" method="post" 
  
    action="">
      <div class="container rounded bg-white mt-5 mb-5" >
        <div class="row">
          <div class="col-md-3 border-right">
            <div
              class="d-flex flex-column align-items-center text-center p-3 py-5"
            >
              <img
                class="rounded-circle mt-5"
                width="150px"
                src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"
              />
             
              <span class="text-black-50"><?php echo $_GET['email']; ?></span>
              
            </div>
          </div>
          <div class="col-md-5 border-right">
            <div class="p-3 py-5">
            
              <div id="erreur" class="erreur-text"> 
              <span id="erreursp" class="error-message" style="color: red !important"></span>
              </div>
             
              <div
                class="d-flex justify-content-between align-items-center mb-3"
              >
                <h4 class="text-right">Paramètres de profil</h4>
              </div>
              <div class="row mt-2">
                <div class="col-md-6">
                  <label class="labels" for="nom">
                    <img
                      class="icon"
                      src="\project2024l3\img\user.png"
                      alt=""
                    />
                    Nom & Prenom
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Entrez Nom et Prenom"
                    name="nom"
                    id="nom"
                  />
                </div>
                <div class="col-md-6">
                  <label class="labels">
                    <img
                      class="icon"
                      src="\project2024l3\img\user.png"
                      alt=""
                    />
                    Nom de célébrité</label
                  ><input
                    type="text"
                    class="form-control"
                    name="nomcelebrite"
                    id="nomc"
                    value=""
                    placeholder="Entrez Nom de célébrité"
                  />
                </div>
                <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">

              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <label class="labels" for="mpt">
                    <img
                      class="icon"
                      src="\project2024l3\img\password.png"
                      alt=""
                    />
                    Mot de passe
                  </label>
                  <input
                    type="password"
                    name="mpt"
                    class="form-control"
                    placeholder="Entrez le mot de passe"
                    id="password"
                    value=""
                  />
                  <div class="power-container">
                    <div id="power-point"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <label class="labels">
                    <img
                      class="icon"
                      src="\project2024l3\img\password.png"
                      alt=""
                    />
                    comfirme Mot de passe
                  </label>
                  <input
                    type="password"
                    class="form-control"
                    placeholder="confirme le mot de passe"
                    id="confirmepassword"
                    value=""
                  />
                </div>

                <div class="col-md-12">
                  <label class="labels" for="numtel">
                    <img
                      class="icon"
                      src="\project2024l3\img\telephone.png"
                      alt=""
                    />
                    Numéro de portable
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Entrez Numéro de portable"
                    name="numtel"
                    id="numtel"
                    value=""
                  />
                </div>

                <div class="col-md-12">
                  <label class="labels">
                    <img
                      class="icon"
                      src="\project2024l3\img\calendar.png"
                      alt=""
                    />
                    Age
                  </label>
                  <input
                    type="number"
                    class="form-control"
                    placeholder="Entrez vous l'age"
                    name="datenaiss"
                    id="datenaiss"
                    value=""
                  />
                </div>
                <div class="col-md-12">
                  <label class="labels">
                    <img
                      class="icon"
                      src="\project2024l3\img\adress.png"
                      alt=""
                    />
                    Adresse
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Entrez adresse "
                    name="adress"
                    id="adress"
                    value=""
                  />
                </div>

                <div class="col-md-12">
                  <label class="labels">
                    <img
                      class="icon"
                      src="\project2024l3\img\adress.png"
                      alt=""
                    />
                    Wilaya
                  </label>
                  <select id="ville" name="wilaya" class="form-control"
                      id="wilaya">
                    <option value="Adrar">Adrar</option>
                    <option value="chlef">chlef</option>
                    <option value="laghouat">laghouat</option>
                    <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                    <option value="Batna">Batna</option>
                    <option value="bejaia">bejaia</option>
                    <option value="Biskra">Biskra</option>
                    <option value="bechar">bechar</option>
                    <option value="belida">belida</option>
                    <option value="bouira">bouira</option>
                    <option value="Tamanrasset">Tamanrasset</option>
                    <option value="Tebessa" >Tebessa</option>
                    <option value="Tlemcen" >Tlemcen</option>
                    <option value="Tiaret" >Tiaret</option>
                    <option value="Tizi Ouzou" >Tizi Ouzou</option>
                    <option value="Alger" >Alger</option>
                    <option value="Djelfa" >Djelfa</option>
                    <option value="Jijel" >Jijel</option>
                    <option value="Setif" >Setif</option>
                    <option value="Saïda" >Saïda</option>
                    <option value="Skikda" >Skikda</option>
                    <option value="Sidi Bel Abbes" >Sidi Bel Abbes</option>
                    <option value="Annaba" >Annaba</option>
                    <option value="Guelma" >Guelma</option>
                    <option value="Constantine" >Constantine</option>
                    <option value="Medea" >Medea</option>
                    <option value="Mostaganem" >Mostaganem</option>
                    <option value="Msila" >Msila</option>
                    <option value="Mascara" >Mascara</option>
                    <option value="Ouargla" >Ouargla</option>
                    <option value="Oran" >Oran</option>
                    <option value="El Bayadh" >El Bayadh</option>
                    <option value="Illizi" >Illizi</option>
                    <option value="BordjBou-Arreridj">BordjBou-Arreridj</option>
                    <option value="Boumerdès">Boumerdès</option>
                    <option value="El-Taref">El-Taref</option>
                    <option value="Tindouf">Tindouf</option>
                    <option value="Tissemsilt">Tissemsilt</option>
                    <option value="El-Oued">El-Oued</option>
                    <option value="Khenchela">Khenchela</option>
                    <option value="Souk-Ahras">Souk-Ahras</option>
                    <option value="Tipaza">Tipaza</option>
                    <option value="Mila">Mila</option>
                    <option value="Aïn-Defla">Aïn-Defla</option>
                    <option value="Naâma">Naâma</option>
                    <option value="Ain-Témouchent">Ain-Témouchent</option>
                    <option value="Ghardaïa">Ghardaïa</option>
                    <option value="Relizane">Relizane</option>            
                    <option value="Timimoun" >Timimoun</option>
                    <option value="Bordj Badji Mokhtar"> Bordj Badji Mokhtar</option>
                    <option value="Ouled Djellal" >Ouled Djellal</option>
                    <option value="Béni Abbès" >Béni Abbès</option>
                    <option value="Ain Salah"> Ain Salah </option>
                    <option value="Ain Guezzam" >Ain Guezzam</option>
                    <option value="Touggourt" >Touggourt </option>
                    <option value="Djanet" >Djanet</option>
                    <option value=" El M’Ghaier"> El M’Ghaier</option>
                    <option value="El Meniaa"> El Meniaa</option>
                  </select>
                </div>
                <div class="col-md-12">
                  <label class="labels">
                    <img
                      class="icon"
                      src="\project2024l3\img\ccp.png"
                      alt=""
                    />
                    CCP
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Entrez CCP "
                    name="ccp"
                    id="ccp"
                    value=""
                  />
                </div>
               
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <label class="labels">
                    <img
                      class="icon"
                      src="\project2024l3\img\gener.png"
                      alt=""
                    />
                    Genre
                  </label>
                </div>
                <div class="col-md-6">
                  <input type="radio" id="male" name="gender" value="male" />
                  <label for="male">Homme</label>
                </div>
                <div class="col-md-6">
                  <input
                    type="radio"
                    id="female"
                    name="gender"
                    value="female"
                  />
                  <label for="female">Femme</label>
                </div>
              </div>
              <div class="mt-5 text-center buttons-container">
              <button id="Confirmer" class="button-18" type="submit" name="upload">Enregistrer le profil</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="p-3 py-5">
              <div class="row mt-3">
                <div class="col-md-12">
                  <label class="labels"
                    ><img
                      class="icon"
                      src="\project2024l3\img\text.png"
                      alt=""
                    />
                    Description
                  </label>
                  <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Entrez votre description"
                    id="description"
                    name="description"
                  >
                  </textarea>
                </div>
              </div>
              <div
                class="d-flex justify-content-between align-items-center experience"
              >
                <span>Modifier l'expérience</span>
              </div>
              <br />
              <!-- <div class="col-md-12">
                <label for="services"><img class="icon" src="\project2024l3\img\job.png" alt="" />Services :</label>
                <select id="service" name="service" class="form-control" required >
                    <option value="" disabled selected>Sélectionner un service</option>
            <?php
            // $sqlservice = "SELECT id, nom FROM service";
            // $result = mysqli_query($mysqli, $sqlservice);
            // if ($result) {
                // if (mysqli_num_rows($result) > 0) {
                  
            //         while ($row = mysqli_fetch_assoc($result)) {
            //             echo '<option value="' . $row["id"] . '">' . $row["nom"] . '</option>';
            //         }
            //     }else {
            //         echo '<option value="" disabled>No services found</option>';
            //     }
            // }
            // ?>
   
                </select>
            </div> <input type="hidden" id="serviceName" name="serviceName">

              
                
              
             
              <br /> -->
              <!-- <div class="row mt-3">
                <div class="col-md-12">
                  <label class="labels">
                    <img
                      class="icon"
                      src="\project2024l3\img\groupe.png"
                      alt=""
                    />
                    Groupe
                  </label>
                </div>
                <div class="col-md-6">
                  <input type="radio" id="oui" name="groupe" value="oui" />
                  <label for="oui">Oui</label>
                </div>
                <div class="col-md-6">
                  <input type="radio" id="no" name="groupe" value="no" />
                  <label for="no">No</label>
                </div>
              </div> -->
              <div class="row mt-3">
                <div class="col-md-12">
                  <label class="labels"
                    ><img
                      class="icon"
                      src="\project2024l3\img\profile.png"
                      alt=""
                    />Photo de profil</label
                  >
                  <input class="form-control" type="file" name="uploadfile" value="" />
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <label class="labels"
                    ><img
                      class="icon"
                      src="\project2024l3\img\document.png"
                      alt=""
                    />Diplôme (Fichier)</label
                  >
                  <input
                    type="file"
                    class="form-control-file"
                    id="diplomaFile"
                    name="diploma"
                    accept=".pdf, .doc, .docx"
                  />
                </div>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
                  <label class="labels"
                    ><img
                      class="icon"
                      src="\project2024l3\img\image.png"
                      alt=""
                    />Plusieurs photos</label
                  >
                  <input
                    type="file"
                    class="form-control-file"
                    id="multiplePhotos"
                    name="multiplePhotos"
                    accept="image/*"
                    multiple
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>

<?php
  
        $BDD = array();
        $BDD['host'] = "localhost";
        $BDD['user'] = "root";
        $BDD['pass'] = "";
        $BDD['db'] = "project";
        
        $mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
        if(!$mysqli) {
          echo "Connexion non établie.";
          exit;
        }
        //echo "Records inserted .";
        $error_message = "";
        $date_joined = date('Y-m-d H:i:s');

      if (isset($_POST['upload'])) {

        // echo "Records inserted .";
        // Collect form data
        $email = $_GET['email']; 
        $motpasse = $_POST['mpt'];
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $nomcelebrite = isset($_POST['nomcelebrite']) ? $_POST['nomcelebrite'] : '';
        $numtel = isset($_POST['numtel']) ? $_POST['numtel'] : '';
        // $datenaiss = date('Y-m-d', strtotime($_POST['datenaiss']));

       
        $adresse = isset($_POST['adress']) ? $_POST['adress'] : '';
        $wilaya = isset($_POST['wilaya']) ? $_POST['wilaya'] : '';
        $ccp = isset($_POST['ccp']) ? $_POST['ccp'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        // $service = isset($_POST['service']) ? $_POST['service'] : '';
        $groupe = isset($_POST['groupe']) ? $_POST['groupe'] : '';

        // Validate and sanitize the data (you can add more validation as per your requirements)
        //$email = mysqli_real_escape_string($mysqli, $email);
        $motpasse = mysqli_real_escape_string($mysqli, $motpasse);
        $nom = mysqli_real_escape_string($mysqli, $nom);
        $nomcelebrite = mysqli_real_escape_string($mysqli, $nomcelebrite);
        $numtel = mysqli_real_escape_string($mysqli, $numtel);
        // $datenaiss = mysqli_real_escape_string($mysqli, $datenaiss);
        $adresse = mysqli_real_escape_string($mysqli, $adresse);
        $wilaya = mysqli_real_escape_string($mysqli, $wilaya);
        $ccp = mysqli_real_escape_string($mysqli, $ccp);
        $gender = mysqli_real_escape_string($mysqli, $gender);
        $description = mysqli_real_escape_string($mysqli, $description);
        // $service = mysqli_real_escape_string($mysqli, $service);
        $groupe = mysqli_real_escape_string($mysqli, $groupe);
        $image = isset($_POST['image']) ? $_POST['image'] : '';
        $hashed_password = md5($motpasse);

        // Insert data into the 'user' table
        $sql_user = "INSERT INTO user (email, password, date_joined, id_profil) VALUES ('$email', '$hashed_password', '$date_joined', '2')";
        // echo "sql result: ". $sql_user;
        if (mysqli_query($mysqli, $sql_user)) {
            // If user record inserted successfully, proceed to insert data into the 'employee' table

            // Insert data into the 'employee' table
            $sql_employee = "INSERT INTO employee (nom, nomcelebrite, numtel, adress, wilaya, ccp, gender, description,  groupe, email, mdp, image, date_joined) 
            VALUES ('$nom', '$nomcelebrite', '$numtel',  '$adresse', '$wilaya', '$ccp', '$gender', '$description',  '$groupe', '$email', '$hashed_password', '$image', '$date_joined')";

            if (mysqli_query($mysqli, $sql_employee)) {
                // echo "Records inserted successfully.";
                header("Location: \project2024l3\html\\homeemployee.php?email=".$email."");
                exit();
            } else {
               
                echo "Error: " . $sql_employee . "<br>" . mysqli_error($mysqli);
            }
        } else {
            echo "Error: " . $sql_user . "<br>" . mysqli_error($mysqli);
        }
    }
        // Close database connection
        mysqli_close($mysqli);
       
    ?>