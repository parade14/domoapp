<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="../../../web/design/css/capteur-style.css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
        <title>Titre</title>
    </head>

    <body>
       <?php include '../../headers/headerUserConnected.php'; ?>

       <div class="add_captor hidden">
           <div class="login-header">
               <h2 class="login-header-text">Ajout d'un capteur</h2>
               <i class="fa fa-times login-cross"></i>
           </div>

           <form action="" class="captor-container">
               <p><select id="select-captor">
                       <option value="1">captor_name_1</option>
                       <option value="2">captor_name_2</option>
                       <option value="3">captor_name_3</option>
                   </select>
               </p>
               <p><select id="select-room">
                       <option value="1">room_name_1</option>
                       <option value="2">room_name_2</option>
                       <option value="new_room">new_room</option>
                   </select>
               </p>
               <p><input type="submit" value="CREER"></p>
           </form>
       </div>

       <div class="main-wrapper">
           <div class="icon-effect-1 icon-effect-1a">
               <a href="#" class="icon"><i class="fa fa-lightbulb-o"></i></a>
               <a href="#" class="icon"><i class="fa fa-thermometer-three-quarters"></i></a>
               <a href="#" class="icon"><i class="ionicons ion-waterdrop"></i></a>
               <a href="#" class="icon"><i class="ionicons ion-android-walk"></i></a>
               <a href="#" class="icon"><i class="fa fa-tachometer" aria-hidden="true"></i></a>
               <a href="#" class="icon"><i class="ionicons ion-android-walk"></i></a>
               <a href="#" class="icon"><i class="ionicons ion-android-walk"></i></a>
               <a href="#" class="icon"><i class="ionicons ion-android-walk"></i></a>
           </div>
       </div>

       <div class="main__menu2">
            <ul>
                <li class="small"><a href="#">Mes appartements</a></li>
                <li class="small"><a href="#">Appartement 1</a></li>
                <li class="small"><a href="#">Appartement 2</a></li>
            </ul>
       </div>

       <button class="add popup-with-form btn-connect" href="#test-form"><i class="ionicons ion-plus-round"></i></button>

        <div class="container-boxes">
            <div class="box first">
                <span class="icon-cont"><i class="fa fa-bed"></i></span>

                <h3>Chambre 1</h3>

                <ul class="hidden">
                    <li>Lorem ipsum dolor</li>
                    <li>Set amet consecuter</li>
                    <li>Lorem ipsum dolor</li>
                    <li>Set amet consecuter</li>
                </ul>
                <a class="expand"><span>17</span></a>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <script src="../../../web/javascript/capteur.js"></script>

    </body>
</html>

