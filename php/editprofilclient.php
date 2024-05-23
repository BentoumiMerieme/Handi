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
if(isset($_POST['email'],$_POST['mdp'],$_POST['nom']))
{
    echo "Connexion A établie 1000001. Votre nom " . $_POST['nom'];
        //l'utilisateur à cliqué sur "S'inscrire",
        // on demande donc si les champs sont défini avec "isset"
    if(empty($_POST['email']))
    {
            //le champ email est vide, 
            // on arrête l'exécution du script et on affiche un message d'erreur
            echo "Le champ Email est vide.";
    } 
    elseif(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$_POST['email']))
    {
        echo "Invalid email address!";
    } 
    elseif(!preg_match("/^[a-zA-Z\s\-']+$/",$_POST['nom']))
    {
        echo "Invalid nom ou prenom!";
    }

    elseif(strlen($_POST['email'])>100)
    {//le email est trop long, il dépasse 25 caractères
        echo "Le email est trop long, il dépasse 25 caractères.";
    } 
    elseif(empty($_POST['mdp']))
    {//le champ mot de passe est vide
        echo "Le champ Mot de passe est vide.";
    } 
    elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM client WHERE email='".$_POST['email']."'"))==1)
    {
        //on vérifie que ce email n'est pas déjà utilisé par un autre membre
        echo "Ce email est déjà utilisé.";
    } 
    else 
    {
        if(!mysqli_query($mysqli,"INSERT INTO client (nom, email, password, num_tel, adress, ccp, sexe, image, datenaiss) VALUES ( '".$_POST['nom']."','".$_POST['email']."', MD5('".$_POST['mdp']."'), '".$_POST['num_tel']."','".$_POST['adress']."','".$_POST['ccp']."','".$_POST['sexe']."','".$_POST['image']."','".$_POST['datenaiss']."')"))
        {
            echo "Une erreur s'est produite: ".mysqli_error($mysqli);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
        } 
        else 
        {
            echo "Vous êtes inscrit avec succès!";
            if(isset($_POST['redirectBtn'])) {
                // Redirect to editprofil.html
                header("Location: \project2024l3\html\log.html");
                exit(); // Ensure script stops executing after redirection
              }
            //on affiche plus le formulaire
            $AfficherFormulaire=0;
        }
    }
}
?>
 