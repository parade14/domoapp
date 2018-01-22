<!DOCTYPE html>
<?php
    require 'modificationClientController.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../../web/css/AjoutNouveauClient.css" />
        <link rel="stylesheet" href="../../../web/css/user-home-style.css" />
        <title>Modification d'un compte client</title>
    </head>
    <body>
        
        <?php include '../../headers/headerUserConnected.php'; ?>

        <div class="user">
            <header class="user_header">
                <h1 class="user_title">Modification d'un compte client</h1>
            </header>
            
            <form class="form">
                                
                <div class="form_group">
                    <input type="text" placeholder="Nom" class="form_input" value="<?php echo $last_name ?>"/>
                </div>
                
                <div class="form_group">
                    <input type="text" placeholder="Prénom" class="form_input" value="<?php echo $first_name ?>"/>
                </div>
                
                <!--<div class="form_group">
                    <input type="text" placeholder="JJ/MM/AAAA" class="form_input" value=""/>
                </div>-->
                               
                <div class="form_group">
                    <input type="text" placeholder="Numéro de Téléphone" class="form_input" value="<?php echo $phone ?>"/>
                </div>
                
                <div class="form_group">
                    <input type="email" placeholder="Email" class="form_input" value="<?php echo $email ?>" />
                </div>
                
                <!--<div class="form_group">
                    <input type="password" placeholder="Password" class="form_input" value=""/>
                </div>-->
                
                <button class="btn" type="button">Modifier</button>
                <!--<button class="btn" type="button">Enregistrer</button>-->
            </form>
        </div>

    </body>
</html>