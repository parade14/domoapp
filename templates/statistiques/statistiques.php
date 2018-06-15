<?php
    $user;
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    <link rel="stylesheet" href="../css/AjoutNouveauClient.css" />
        <link rel="stylesheet" href="../css/user-home-style.css" />
        <title>Statistiques</title>
    </head>
    <body>
        
        <?php 
        
        if($user->getProfileType() == 1){
            include(dirname(__FILE__).'/../headers/headerUserConnected.php');
        } else if($user->getProfileType() == 2){
            include(dirname(__FILE__).'/../headers/headerServiceClient.php');
        } else if($user->getProfileType() == 3){
            include(dirname(__FILE__).'/../headers/headerGestConnected.php');
        }
        
        ?>

        <div class="user">
            <header class="user_header">
                <h1 class="user_title">Statistiques</h1>
            </header>
        </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="../javascript/modifierClient.js"></script>
</html>