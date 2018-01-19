<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../design/css/home-style.css" />
		<link rel="stylesheet" href="../design/css/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../design/css/ionicons/css/ionicons.min.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title> Nascop </title>
	</head>

<?php echo $hello ?>
	<body>
		<div class="login hidden">
			<div class="login-header">
				<h2 class="login-header-text">Log in </h2>
				<i class="fa fa-times login-cross"></i>
			</div>

			<form method="POST" action="user/user-home.php" class="login-container">
				<p><input type="email" placeholder="Email"></p>
				<p><input type="password" placeholder="Password"></p>
				<p><input type="submit" value="Log in"></p>
			</form>
		</div>

		<div class="background"></div>
        <header id="head_page">
            <div class="menu">
                <div id="logo">
                    <img src="../design/images/logo_nascop.png" alt="Logo Nascop" />
                </div>

                <nav>
                    <ul>
                        <li><a class="menu_effect" href="#"> Accueil </a> </li>
                        <li><a class="menu_effect" href="#"> Notre offre </a> </li>
                        <li><a class="menu_effect" href="#contact"> Contact </a> </li>
                        <li><a class="menu_effect btn-connect"> Connexion </a> </li>
                        <li><a class="menu_effect" href="#"> Langue </a> </li>
                    </ul>
                </nav>
            </div>

            <div class="banner">
                <div class="banner-text">
                    <h1>Nascop.</h1>
                     <h3>Gérer sa maison depuis son canapé.</h3>
                     <hr />
                </div>
            </div>

        </header>
        <section>
            <article id="wrap-description">
                <article class="nascop_description articles">
                    <h2> Qui sommes-nous ?  </h2>

                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam nec sagittis massa. Nulla facilisi. Cras id arcu lorem, et semper purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis vel enim mi, in lobortis sem. Vestibulum luctus elit eu libero ultrices id fermentum sem sagittis. Nulla imperdiet mauris sed sapien dignissim id aliquam est aliquam. Maecenas non odio ipsum, a elementum nisi. Mauris non erat eu erat placerat convallis. Mauris in pretium urna. Cras laoreet molestie odio, consequat consequat velit commodo eu. Integer vitae lectus ac nunc posuere pellentesque non at eros. Suspendisse non lectus lorem.</p>

                </article>

            </article>

            <article class="offer_description articles">

                <h2> Notre offre </h2>

                <div class="advntg-dscrptn">
                    <div class="advntg-elem">
                        <i class="fa fa-shield fa-3x" aria-hidden="true"></i>
                        <h3> Securité </h3>
                        <li class="offer-list">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Capteur de mouvements infrarouge </br>
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Détection d'intrusions </br>
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Alarme opérationnelle 24h/24
                        </li>
                    </div>


                    <div class="advntg-elem">
                        <i class="fa fa-coffee fa-3x" aria-hidden="true"></i>
                        <h3> Confort </h3>
                        <li class="offer-list">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Gérer la température des pièces </br>
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Vérifier le taux d'humidité </br>
                        </li>
                    </div>

                </div>

                <a href="#" class="button learn-more"> En savoir plus </a>


            </article>

        </section>

			<div class="contact" id="contact">
				<div class="container">
					<div class="form-wrapper">
						<h2>Contact</h2>
						<div class="row cf">
							<p>Votre Nom : </p>
							<input class="text-input" type="text" name="text1" id="text1">
						</div>
						<div class="row cf">
							<p>Votre Email : </p>
							<input class="text-input" type="text" name="text1" id="text1">
						</div>
						<div class="row cf">
							<div class="message">Votre Message : </div>
							<textarea name="t1" id="t1"></textarea>
						</div>
						<row class="cf">
							<input class="submit" type="submit" value="Envoyer">
						</row>
					</div>
				</div>
			</div>

			<footer>
				<div id="coordonnees">
					<p> Nascop </br> Région Parisienne </br> +33 6 43 52 09 38 </br> mail@nascop.com
					</p>

				<div class="bottom-bar">
					Tous droits Réservés © 2017 | Nascop
				</div>
				<div id="copyright">
					<p> Tous droits réservés 2017 - © NASCOP - Solution Domotique </p>
				</div>

			</footer>

		<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
		<script src="../javascript/login-user.js"></script>
	</body>

</html>