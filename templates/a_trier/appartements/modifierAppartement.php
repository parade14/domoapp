<!DOCTYPE html>
<?php
    require 'appartementController.php';
?>

    <html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../../../web/css/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../../web/css/ionicons/css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../../../web/css/user-home-style.css" />
        <link rel="stylesheet" href="../../../web/css/appartement-style.css" />
         <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <title>Titre</title>
    </head>

    <body>
        
        <?php include '../../headers/headerUserConnected.php';?>
        
        
        <div id="conteneur" class="bckg">

            <div class="app row">
                <div class="panel column">
                        <ul class="nav column">
                            <li><div class="row show_hide"><i class="fa fa-home"></i>Mes Appartements</div></li>
                        </ul>
                        <div class="line"></div>
                        <div class="appartment-list">
                        <?php    
                            foreach($accomodations as $item) {
                            echo '
                            <h3 class="appartment form_'.$item->getId().'"> 
                                <span> Appartement '.$item->getId().' </span>
                            </h3>';
                            }?>
                        </div>
                        <div class="add row"><i class="material-icons small">add_circle_outline</i>Ajouter</div>
                </div>
            </div>
           

            <main>
                <div class="larg" id="containerAccommodations">
                    <?php    
                    foreach($accomodations as $item) {
                    echo '
                    <div class="larg-w form_'.$item->getId().'">
                    
                        <div class="angle-wrap">
                            <h3>Appartement '.$item->getId().' </h3>
                            
                            <span onClick="deleteAccommodation('.$item->getId().','.$item->getId().')"><i style="color:red" class="fa fa-trash-o fa-lg"></i></span>
                            
                            <i class="fa fa-angle-left form_'.$item->getId().'"></i>
                            
                        </div>                        

                            <form class="toggleDiv form_'.$item->getId().'" action="insertOrUpdateAppartement.php" method="POST">

                               <input type="hidden" name="id" value="'.$item->getId().'">
                                   
                               <div class="input">
                                    <label>N° </label>
                                    <input class="text-field" type="number" name="numero" value="'.$item->getStreetNumber().'" />
                                </div>
                                
                                <div class="input">
                                    <label>Adresse </label>
                                    <input class="text-field" type="text" name="adresse" value="'.$item->getStreet().'" />
                                </div>
                                
                                <div class="input">
                                    <label>Code Postal </label>
                                    <input class="text-field" type="number" name="codePostal" value="'.$item->getPostalCode().'" />
                                </div>
                                
                                <div class="input">
                                    <label>Ville </label>
                                    <input class="text-field" type="text" name="ville" value="'.$item->getCity().'" />
                                </div>

                                <div class="input">
                                    <label>Superficie </label>
                                    <input class="text-field" type="number" name="superficie" value="'.$item->getArea().'"  />
                                </div>

                                <div class="input">
                                    <label>Nombre d\'habitants </label>
                                    <input class="text-field" type="number" name="nbHabitants" value="'.$item->getInhabitantNumber().'" />
                                </div>
                                
                                <button id="modifierForm_'.$item->getId().'" type="button" onClick="modifierForm('.$item->getId().')">Modifier</button>
                                <input type="submit" class="submit" value="Valider"/>
                                <button class="annulerForm" id="annulerForm_'.$item->getId().'" type="button" onClick="annulerForm('.$item->getId().')">Annuler</button>
                            </form>
                        <div id="dinamic-fields"></div>
                    </div>';
                    }?> 
                </div>
            </main>

        </div>
        <div id="dialog" title="Delete this accommodation">
                Please confirm the deletion
        </div>

        
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../../../web/javascript/apartement.js"></script>
    </body>

</html>