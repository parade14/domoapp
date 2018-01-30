<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../web/css/accueilServiceclient.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
        <title>Service client</title>
        <script src="https://use.fontawesome.com/be7fe78f06.js"></script>
    </head>
    
    <body>
    <nav>
        <ul>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title">
                    <div class=icon>
                        <i class="fa fa-user-circle fa-2x" aria-hidden="true"></i>
                    </div>
                    <a href="" onclick="searchUser();return false;"><span>Rechercher un profil client</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title">
                    <div class=icon>
                        <i class="fa fa-plus-square-o fa-2x" aria-hidden="true"></i>
                    </div>
                    <a href="" onclick="addUser();return false;"><span>Ajouter un nouveau client</span></a>
                </div>
            </li>
            <li class="var_nav">
                <div class="link_bg"></div>
                <div class="link_title">
                    <div class=icon>
                        <i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
                    </div>
                    <a href="#"><span>Messagerie</span></a>
                </div>
            </li>
        </ul>
    </nav>
        
        
        
        
        
        
        
        
<div id="dialog-search-user" title="Rechercher un profil client" style="display:none">
    <form id="formSearchUser">
        <span>Nom du client : </span><input name="nameUser" id="nameUser" type="text"/>
        <br/>            
        <div id="listResults">

        </div>
    </form>
</div>
        
<div id="dialog-add-user" title="Ajouter un profil client" style="display:none">
    <form id="formAddUser" method="POST" action="../../templates/serviceClient/createUser.php">
        <span>Nom : </span><input name="lastName" type="text"/>
        <br/>      
        <span>Prénom : </span><input name="firstName" type="text"/>
        <br/> 
        <span>Email : </span><input name="email" type="email"/>
        <br/> 
        <span>Téléphone : </span><input name="phone" type="number"/>
        <br/> 
        <span>Mot de passe : </span><input name="password" type="password"/>
        <br/><br/>    
        <span>Type de profil : </span><input min="1" max="3" name="profileType" type="number"/>
        <br/>
        <i>(1) Utilisateur</i><br/>
        <i>(2) Service Client</i><br/>
        <i>(3) Gestionnaire</i><br/>
        <br/>  
        <input type="submit" value="Créer"/>
        </div>
    </form>
</div>


    </body>
</html>

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../web/javascript/serviceClient.js"></script>