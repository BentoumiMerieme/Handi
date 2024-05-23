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
    <!-- <script src="\project2024l3\js\codejs2.js"></script>
    <script src="\project2024l3\js\codejs1.js"></script> -->

    <title>EDIT_PROFIL</title>

    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
    <script src="\project2024l3\js\editprofill.js"></script>
  </head>
  <style>
      body{
        background-color: #eaeef6;
      }
      #appointmentForm{
    width:100%;
  }
  .container {
            max-width: 1000px;
            margin: 50px auto;
            background-color: #fff;
            padding:40px 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
  </style>

  <body><div class="container">
    <form  id="appointmentForm"method="post" action="">
      <div class=" rounded bg-white mt-5 mb-5">
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
              <span> </span>
            </div>
          </div>
          <div class="col-md-5 border-right">
            <div class="p-3 py-5">
              <div class="erreur-text">

  </div>
              <div
                class="d-flex justify-content-between align-items-center mb-3"
              >
                <h4 class="text-right">Paramètres de profil</h4>
              </div>
              <div class="row mt-3">
                <div class="col-md-12">
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
                    id="mpt2"
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
                    Date de naissance
                  </label>
                  <input
                    type="date"
                    class="form-control"
                    placeholder="Entrez la date de naissance"
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
              <button class="button-18" type="submit" name="button">Enregistrer le profil</button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="p-3 py-5">
             
              <div
                class="d-flex justify-content-between align-items-center experience"
              >
                <span>Plus d'informations</span>
              </div>
              
              <br />
              
              <div class="row mt-3">
                <div class="col-md-12">
                  <label class="labels"
                    ><img
                      class="icon"
                      src="\project2024l3\img\profile.png"
                      alt=""
                    />Photo de profil</label
                  >
                  <input
                    type="file"
                    class="form-control-file"
                    placeholder="choisir une photo"
                    id="profilePhoto"
                    name="image"
                    accept="image/*"
                  />
                </div>
              </div>
             
              
            </div>
          </div>
        </div>
      </div>
    </form></div>
  </body>
</html>
<?php

// Establish database connection
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
$date_joined = date('Y-m-d H:i:s');

if (isset($_POST['button'])) {
    // Collect form data
    $email = $_GET['email']; // Get email from URL parameter
    $motpasse = $_POST['mpt'];
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $numtel = isset($_POST['numtel']) ? $_POST['numtel'] : '';
    $adresse = isset($_POST['adress']) ? $_POST['adress'] : '';
    $wilaya = isset($_POST['wilaya']) ? $_POST['wilaya'] : '';
    $ccp = isset($_POST['ccp']) ? $_POST['ccp'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $image = isset($_POST['image']) ? $_POST['image'] : '';

    // Validate and sanitize the data
    $email = mysqli_real_escape_string($mysqli, $email);
    $motpasse = mysqli_real_escape_string($mysqli, $motpasse);
    $nom = mysqli_real_escape_string($mysqli, $nom);

    $numtel = mysqli_real_escape_string($mysqli, $numtel);
    $adresse = mysqli_real_escape_string($mysqli, $adresse);
    $wilaya = mysqli_real_escape_string($mysqli, $wilaya);
    $ccp = mysqli_real_escape_string($mysqli, $ccp);
    $gender = mysqli_real_escape_string($mysqli, $gender);
    $image = mysqli_real_escape_string($mysqli, $image);
    $hashed_password = md5($motpasse);

    // Insert data into the 'user' table
    $sql_user = "INSERT INTO user (email, password, date_joined, id_profil) VALUES ('$email', '$hashed_password', '$date_joined', '3')";

    if (mysqli_query($mysqli, $sql_user)) {
        // If user record inserted successfully, proceed to insert data into the 'employee' table
        // $id_user=  "SELECT LAST_INSERT_ID()";
        
        // Insert data into the 'employee' table
        $sql_client = "INSERT INTO client (nom,  numtel, mdp, adress,date_joined, wilaya, ccp, gender,   email, image) 
                         VALUES ('$nom', '$numtel', '$hashed_password', '$adresse','$date_joined', '$wilaya', '$ccp', '$gender',  '$email', '$image')";

        if (mysqli_query($mysqli, $sql_client)) {
          // $id_rever="SELECT LAST_INSERT_ID()";
          // "UPDATE user SET ID_REFERER=".$id_rever." WHERE ID=".$id_user";
       
            header("Location: \project2024l3\html\\test.php?email=".$email."");
            exit();
        } else {
            $error_message = "Error: " . $sql_client. "<br>" . mysqli_error($mysqli);
        }
    } else {
        $error_message = "Error: " . $sql_user . "<br>" . mysqli_error($mysqli);
    }
}

// Close database connection
mysqli_close($mysqli);
ob_end_flush();
?>
