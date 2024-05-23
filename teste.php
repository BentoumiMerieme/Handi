<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge" /> -->
    <!-- <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon" /> -->
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="\project2024l3\css\style.css" />
    <title>Handi</title>
    <link
      rel="icon"
      href=  "\project2024l3\img\logo.png"
      type="image/icon type"
    />
  </head>

  <style>
    .menu-btn {
        cursor: pointer;
        position: fixed;
        top: 30px;
        right: 90px;
        z-index: 9999;
        outline: none;
    }

    .menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
        position: absolute;
        background-color: #f9f9f9;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        z-index: 1;
        display: none;
        top: 80px; /* ajuster la position verticale du menu */
        right: 90px;
    }

    .menu li {
        /* border-bottom: 5px solid #ddd; */
    }

    .menu li:last-child {
        border-bottom: none;
    }

    .menu li a {
        display:flex;
        align-items: center;
        width:160px;
        padding: 15px 20px;
        text-decoration: none;
        color: #333;
      }
      .menu li a i {
        margin-right: 10px; 
      }
      .menu li a:hover {
        background-color: #f1f1f1;
      }

      #menu-toggle:checked + .menu {
        display: block;
      }

      #menu-toggle {
        display: none;
        -webkit-appearance: none; 
        -moz-appearance: none;
        appearance: none;
      }

      .icon-link {
        background-image: url('/project2024l3/img/home-button-for-interface.png');
        background-size: cover; 
        width: 32px; 
        height: 32px;
        display: inline-block; 
        margin: 0 10px; 
      }

      .icon-linkp {
        background-image: url('/project2024l3/img/user.png');
        background-size: cover; 
        width: 32px; 
        height: 32px;
        display: inline-block; 
        margin: 0 10px;
      }

      .icon-linko {
        background-image: url('/project2024l3/img/edit.png');
        background-size: cover; 
        width: 32px; 
        height: 32px;
        display: inline-block; 
        margin: 0 100px;
      }

      .icon-linka {
        background-image: url('/project2024l3/img/bookmark.png');
        background-size: cover; 
        width: 32px; 
        height: 32px;
        display: inline-block; 
        margin: 0 100px;
      }
      .search-container {
        position: relative;
      }
      .recherche{
        height:40px;
        padding:5px 10px;
        border:none;
        border-radius: 25px;
        outline:none;
        background-color: #eee;
        margin-left: 10px;
        width: 300px;
      }
      .error-container {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
      }
      .nav-middle{
        margin-right: 20%;
      }
      .error-message{
        display: block; 
        color: red; 
        font-size: 14px; 
        margin-top: 5px; 
        margin-left: 10px;
      }
     
      .links-container {
        display: flex;
        justify-content: center;
        gap: 20px; /* تعيين المسافة بين الروابط */
      }

      .icon-link, .icon-linkp, .icon-linko, .icon-linka {
    /* قم بتعيين خلفية وأبعاد الصور حسب الحاجة */
        background-size: cover;
        width: 32px;
        height: 32px;
      }

  </style>
  <body>
        <?php
        include "data.config.php";
        echo $sitepath2;
        ?>

        <div class="nav-left">           
            <?php echo '<img src="https://localhost/project2024l3/img/logo.png'.'" alt="Logo2" />'; ?>
            
        </div>

  </body>
</html>
