
 
 
 
  
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

// echo mysqli_query($mysqli,"CREATE TABLE IF NOT EXISTS `".$BDD['db']."`.`employee` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(25) NOT NULL , `mdp` CHAR(32) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;")?"Table membres créée avec succès, vous pouvez maintenant supprimer la ligne ". __LINE__ ." de votre fichier ". __FILE__ ."!":"Erreur création table membres: ".mysqli_error($mysqli);

//traitement du formulaire:
    if(isset($_POST['email'],$_POST['mdp'],$_POST['nom'],$_POST['nomc'],$_POST['numt'],$_POST['datenaiss'],$_POST['adress'],$_POST['ccp'])){
        //l'utilisateur à cliqué sur "S'inscrire",
        // on demande donc si les champs sont défini avec "isset"
        if(empty($_POST['email'])){
            //le champ email est vide, 
            // on arrête l'exécution du script et on affiche un message d'erreur
            echo "Le champ Email est vide.";
        } elseif(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$_POST['email'])){

//le champ email est renseigné mais ne convient pas au format qu'on souhaite qu'il soit, soit: 
//     que des lettres minuscule + des chiffres 
// je préfère personnellement enregistrer le email de mes employee 
// en minuscule afin de ne pas avoir deux email identique mais différents comme par exemple: Admin et admin)
echo "Invalid email address!";
} elseif(!preg_match("/^[a-zA-Z\s\-']+$/",$_POST['nom'])){
    echo "Invalid nom ou prenom!";
}

elseif(strlen($_POST['email'])>100){//le email est trop long, il dépasse 25 caractères
    echo "Le email est trop long, il dépasse 25 caractères.";
} elseif(empty($_POST['mdp'])){//le champ mot de passe est vide
    echo "Le champ Mot de passe est vide.";
} elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM employee WHERE email='".$_POST['email']."'"))==1){
    //on vérifie que ce email n'est pas déjà utilisé par un autre membre
    echo "Ce email est déjà utilisé.";
} else {
    //toutes les vérifications sont faites, on passe à l'enregistrement dans la base de données:
    //Bien évidement il s'agit là d'un script simplifié au maximum, 
    // libre à vous de rajouter des conditions avant l'enregistrement comme la longueur minimum du mot de passe par exemple 
    if(!mysqli_query($mysqli,"INSERT INTO employee (email, mdp, nom, nomcelebrite, datenaiss, num_tel, addresse, addresnum_carte) 
    VALUES ('".$_POST['email']."', '".md5($_POST['mdp'])."', '".$_POST['nom']."', '".$_POST['nomc']."', '".$_POST['datenaiss']."', '".$_POST['numt']."', '".$_POST['adress']."', '".$_POST['ccp']."')")){


   // $_POST['nom'],$_POST['nomc'],$_POST['numt'],$_POST['datenaiss'],$_POST['adress'],$_POST['ccp']
   // if(!mysqli_query($mysqli,"INSERT INTO employee SET email='".$_POST['email']."', mdp='".md5($_POST['mdp'])."'", nom='".$_POST['nom']."',nomcelebrite='".$_POST['nomc']."', datenaiss='".$_POST['datenaiss']."', num_tel='".$_POST['numt']."',
    //addresse='".$_POST['adress']."', addresnum_carte='".$_POST['ccp']."',    )){
        //on crypte le mot de passe avec la fonction propre à PHP: md5()
        echo "Une erreur s'est produite: ".mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
    } else {
        echo "Vous êtes inscrit avec succès!";
      //on affiche plus le formulaire
      $AfficherFormulaire=0;
    }
  }
}

    ?>
<!-- 
  Les balises <form> sert à dire que c'est un formulaire
  on lui demande de faire fonctionner la page inscription.php une fois le bouton "S'inscrire" cliqué
  on lui dit également que c'est un formulaire de type "POST"
  Les balises <input> sont les champs de formulaire
  type="text" sera du texte
  type="password" sera des petits points noir (texte caché)
  type="submit" sera un bouton pour valider le formulaire
  name="nom de l'input" sert à le reconnaitre une fois le bouton submit cliqué, pour le code PHP
   -->









<!-- 

// // Database connection settings
// $servername = "localhost"; // Replace with your database server name
// $username = "root"; // Replace with your database username
// $password = ""; // Replace with your database password
// $database = "project"; // Replace with your database name

// // Create connection
// $conn = new mysql($servername, $username, $password, $database);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// Retrieve data from the employee table
$sql = "SELECT * FROM employee"; // Assuming your table is named "employee"
$result = $conn->query($sql);

// Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    // Populate form fields with data from the database
    $nomPrenom = $row["nomPrenom"];
    $nomCelebrity = $row["nomCelebrity"];
    $email = $row["email"];

} else {
    echo "0 results";
}

// Close database connection
$conn->close();








  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nomPrenom = $_POST["nomPrenom"];
    $nomCelebrity = $_POST["nomCelebrity"];
    $email = $_POST["email"];
    $password = $_POST["password"];
   
  }
















?> --> 