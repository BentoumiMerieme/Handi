<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Creation de Post</title>
    <link
      rel="icon"
      href="\project2024l3\img\logo.png"
      type="image/icon type"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    />
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #e9efff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
      }
      form {
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 80px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        width: 400px;
      }
      .form-header {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
      }
      textarea,
      input[type="file"],
      select,
      button {
        width: 90%;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
      }
      textarea {
        height: 200px; /* Hauteur fixe */
        resize: none; /* Empêche le redimensionnement */
      }
      button {
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
      }
      button:hover {
        background-color: #0056b3;
        color: #fff;
      }
      .icon-button {
        padding: 10px;
        width: auto;
        background: none;
        border: none;
        color: #007bff;
        cursor: pointer;
        display: inline-block;
      }
      .icon-button:hover {
        color: #f3f5f6;
      }
    </style>
  </head>
  <body>
    <form id="postForm" method="POST">
      <h2 class="form-header">Creation de Post</h2>
      <textarea
        id="postContent"
        placeholder="écrivez quelques choses...!"
        name="content"
      ></textarea>
      <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">

      <input
        class="icon-button"
        type="file"
        id="postImage"
        accept="image/*"
        name="image"
        style="display: none"
      > 
      <input
        type="file"
        id="postVideo"
        accept="video/*"
        name="video"
        style="display: none"
      />
     
      <button
        type="button"
        class="icon-button"
        
        onclick="document.getElementById('postImage').click();"
        title="Add Photo"
      >
        <i class="fas fa-camera"></i>
      </button>


      <button
        type="button"
        class="icon-button"
        
        onclick="document.getElementById('postVideo').click();"
        title="Add Video"
      >
        <i class="fas fa-video"></i>
      </button>
  
      <button type="submit" name="button">Post</button>
    </form>

    <script src="script.js"></script>
  </body>
</html>
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
  
    if (isset($_POST['button'])) {
      $email = isset($_GET['email']) ? mysqli_real_escape_string($mysqli, $_GET['email']) : '';
      $content = isset($_POST['content']) ? mysqli_real_escape_string($mysqli, $_POST['content']) : '';
      $image = isset($_FILES['image']) ? $_FILES['image']['name'] : '';
      $video = isset($_FILES['video']) ? $_FILES['video']['name'] : '';
       
        $date_joined = date('Y-m-d H:i:s');
        $sql_post = "INSERT INTO post (email, content, image, video, created_at) VALUES ('$email', '$content', '$image', '$video', '$date_joined')";

        if (mysqli_query($mysqli, $sql_post)) {
          $email = urlencode($_GET['email']);
            header("Location: /project2024l3/html/homeemployee.php?email=$email");
            exit();
        } else {
            $error_message = "Error: " . $sql_post. "<br>" . mysqli_error($mysqli);
        }
    }

?>
