<?php
    $kernel = new \kernel\Kernel();
    $dataBase = $kernel->get("database.object");
    $databaseService = $kernel->get("database.service");
    $databaseService->connect($dataBase);
    $capteurService = $kernel->get("sensor.service");
    $capteurService->setServiceConnect($databaseService);
    $capteurService->setDataBaseObject($dataBase);
    $dataSensorService = $kernel->get("datasensor.service");
    $dataSensorService->setServiceConnect($databaseService);
    $dataSensorService->setDataBaseObject($dataBase);
    
    $accommodations;
    $rooms;
    $idAcc;

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../../web/css/capteur-style.css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <title>Capteurs</title>
    </head>

    <body>
       <?php include(dirname(__FILE__).'/../headers/headerUserConnected.php');?>

       <div class="add_captor hidden">
           <div class="login-header">
               <h2 class="login-header-text">Ajout d'un capteur</h2>
               <i class="fa fa-times login-cross"></i>
           </div>

           <form method="POST" action="../../templates/capteur/creerCapteur.php" class="captor-popup">
               <input type="hidden" name="idAcc" value="<?php echo $idAcc; ?>"/>
               <p><span>Nom du capteur : </span><input type="text" name="name"/></p>
               <p><select id="select-captor"  name="sensor">
                       <option value="temperature">température</option>
                       <option value="pression">pression</option>
                       <option value="lumiere">lumière</option>
                       <option value="humidite">humidité</option>
                       <option value="mouvement">mouvement</option>
                   </select>
               </p>
               <p><select id="select-room" name="room">
                       
                       <?php 
                       foreach($rooms as $room){
                           echo '<option value="'.$room->getId().'">'.$room->getName().'</option>';
                       }?>
                       
                   </select>
               </p>
               <p><input type="submit" value="CREER"></p>
           </form>
       </div>

       <div class="main__menu2">
            <ul>
                <li class="small"><a id="mesApparts" href="index.php">Mes appartements</a></li>
                <?php foreach($accommodations as $acc){
                    echo ' <li class="small"><a id="appart_'.$acc->getId().'" href="index.php?idAcc='.$acc->getId().'">Appartement '.$acc->getId().'</a></li>';
                    }
                ?>
            </ul>
       </div>

       <button id="btnAjoutCapteur" class="add popup-with-form btn-connect" href="#test-form">Ajouter un capteur</button>
       <div class="container-boxes">
       
        <?php foreach($rooms as $room){
            $sensors = $capteurService->getSensorBy('room_id', $room->getId());            
            echo '
                <div class="box first">
                    <!--<span class="icon-cont"><i class="fa fa-bed"></i></span>-->

                    <h3>'.$room->getName(). '</h3>
                    <div class="line"></div>
                    <div class="captor-container">';

                    foreach($sensors as $sensor){
                        switch ($sensor->getType()) {
                            case "temperature":
                                $captorIcon = '<i class="icon fa fa-thermometer-three-quarters"></i>';
                                $typeInput = 1;
                                break;
                            case "lumiere":
                                $captorIcon = '<i class="icon fa fa-lightbulb-o"></i>';
                                break;
                            case "pression":
                                $captorIcon = '<i class="icon fa fa-tachometer" aria-hidden="true"></i>';
                                break;
                            case "humidite":
                                $captorIcon = '<i class="icon ionicons ion-waterdrop"></i>';
                                break;
                        }
                        $lastValue = $dataSensorService->getLastValue($sensor->getId());

                        echo '<div class="captors"><div class="right-captor-box"><span>'.$captorIcon.' </span> 
                               <span>'.$sensor->getName().'</span></div><div class="left-captor-box"><span class="expand">'.$lastValue->getValue().'</span><span class="switch-button open">
                               <i class="switch"></i></span><span onClick="supprimerCapteur('.$sensor->getId().')"<i class="fa fa-trash-o fa-lg"></i></span></div></div>';
                    }

                    echo '</div> </div>';
       }?>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="../../web/javascript/capteur.js"></script>

    </body>
</html>

