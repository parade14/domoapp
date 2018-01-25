<!DOCTYPE html>
<?php
    require 'modificationClientController.php';
?>
<html>
    <head>
        <meta charset="utf-8">
    <link rel="stylesheet" href="../../web/css/AjoutNouveauClient.css" />
        <link rel="stylesheet" href="../../web/css/user-home-style.css" />
        <title>Modification d'un compte client</title>
    </head>
    <body>
        
        <?php include(dirname(__FILE__).'/../headers/headerUserConnected.php');?>

        <div class="user">
            <header class="user_header">
                <h1 class="user_title">Modification d'un compte client</h1>
            </header>
            
            <form class="form" action="../../templates/modifierProfil/validerModifProfil.php" method="POST">
                                
                <div class="form_group">
                    <input type="text" placeholder="Nom" name="last_name" class="form_input" value="<?php echo $last_name ?>"/>
                </div>
                
                <div class="form_group">
                    <input type="text" placeholder="Prénom" name="first_name" class="form_input" value="<?php echo $first_name ?>"/>
                </div>
                
                <!--<div class="form_group">
                    <input type="text" placeholder="JJ/MM/AAAA" class="form_input" value=""/>
                </div>-->
                               
                <div class="form_group">
                    <input type="text" placeholder="Numéro de Téléphone" name="phone" class="form_input" value="<?php echo $phone ?>"/>
                </div>
                
                <div class="form_group">
                    <input type="email" placeholder="Email" class="form_input" name="email" value="<?php echo $email ?>" />
                </div>
                
                <!--<div class="form_group">
                    <input type="password" placeholder="Password" class="form_input" value=""/>
                </div>-->
                
                <button class="btn" id="modifierBtn" onclick="modifierProfil()" type="button">Modifier</button>
                <input type="submit" class="btn" id="enregistrerBtn" value="Enregistrer" />
                <button class="btn" id="annulerBtn" onclick="annulerForm()" type="button">Annuler</button>
            </form>
        </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="../../web/javascript/modifierClient.js"></script>
</html>