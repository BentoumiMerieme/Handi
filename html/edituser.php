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
$error_email = "";
$error_type = "";
if(isset($_POST['email']))
{
  
  
   if(empty($_POST['email']))
    {
        $error_email = "Le champ Email est vide!";
    } 
    elseif(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$_POST['email']))
    {
        $error_email =  "Adress email non valid!";
    } 

    elseif(strlen($_POST['email'])>100)
    {
        $error_email =  "Le email est trop long, il dépasse 25 caractères!";
    } 

    elseif(mysqli_num_rows(mysqli_query($mysqli,"SELECT * FROM user WHERE email='".$_POST['email']."'"))==1)
    {
        $error_email =  "Ce email est déjà utilisé!";
    } 
    elseif(empty($_POST['profil']))
    {
        $error_type = " Veuillez Selectionner votre type d'utilisateur!";
    } 
    else 
    {  $profil = $_POST['profil'];
       
    if($profil == "1")
    {
      
      $ChaineRedirect = "Location: \project2024l3\html\\editprofilclient.php?email=".$_POST['email']."";    
    }
    elseif($profil =="2")
   {
      $ChaineRedirect = "Location: \project2024l3\html\\editprofil.php?email=".$_POST['email']."";
    }
    else {
     
      $ChaineRedirect = "Location: \project2024l3\html\\edituser.php";
      
  }

      header($ChaineRedirect);
      exit(); 
    }
}
?>
 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="formulaire.css">
    <link rel="stylesheet" href="\project2024l3\css\style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Handi</title>
    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #e9efff; */
            margin: 0;
            padding: 0;
        }
 
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding:40px 50px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
 
        .form-group {
            margin-bottom: 25px;
        }
 
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], button {
            width: 100%;
            height: 40px;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="radio"]{
            width: 5%;
            height: 17px;
            padding: 8px;
            margin-bottom: 0px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="text"]:focus, input[type="radio"]:focus, button:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.25);
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        button i {
            margin-left: 5px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .icon {
            vertical-align: middle;
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }

            input[type="text"], button {
                width: 100%;
                padding: 10px;
            }

            .form-group label {
                margin-bottom: 10px;
            }
        }
        .icon{
	width: 15px;
	font-size: 24px;
	margin: 10px;
	text-decoration: none;
	opacity: 0.5;
	box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2)
  }
  #appointmentForm{
    width:100%;
  }
  /* تحسين عرض قسم نوع المستخدم */
.form-check {
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}

.form-check-input {
    width: auto;
    height: auto;
    margin-right: 10px;
}

.form-check-label {
    margin: 0;
    font-size: 14px;
}

/* تحسين عرض النصوص والأيقونات */
label img.icon {
    width: 20px;
    height: 20px;
    margin-right: 5px;
}

.form-group label {
    font-size: 14px;
}

/* تحسين عرض الزر */
button {
    padding: 8px 16px;
    font-size: 14px;
}

    </style>
</head>
<body>
    <div class="container">
        <form id="appointmentForm" action="" method="POST">
            <div class="form-group">
                <label for="email">
                    <img class="icon" src="/project2024l3/img/email.png" alt="Email Icon">
                    Adresse Email
                </label>
                <input type="text" name="email" id="email" placeholder="Entre l'email" value="" required>
                <span class="error-message"><?php echo $error_email; ?></span>
            </div>

            <div class="form-group">
                <label><img  class="icon" src="\project2024l3\img\groupe.png" alt=""/>Type d'utilisateur</label>
                <div>
                    
                    <label for="employee">Employé <input type="radio" name="profil" value="2" id="employee"></label>
                </div>
                <div>
                  
                    <label for="client"  >Client  <input type="radio" name="profil" value="1" id="client"></label>
                </div>
                <span class="error-message"><?php echo $error_type; ?></span>
            </div>

            <div class="form-group">
                <button type="submit" name="redirectBtn">Continuer <i class="fas fa-check"></i></button>
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>