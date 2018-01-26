<!DOCTYPE html>

<html>

<?php include('head.php'); ?>

	<body>
		<div class="login <?= ($formRetry)? "": "hidden"?>">
			<div class="login-header">
				<h2 class="login-header-text">Log in </h2>
				<i class="fa fa-times login-cross"></i>
			</div>

			<form method="POST" action="index.php" class="login-container">
                <?=($formRetry) ? "badCredentials" :"" ?>
				<p><input type="email" name="email" placeholder="Email"></p>
				<p><input type="password" name="password" placeholder="Password"></p>
				<p><input type="submit" value="Log in"></p>
			</form>
		</div>

		<div class="background"></div>
        <header id="head_page">
            <div class="menu">
                <div id="logo">
                    <img src="images/logo_nascop.png" alt="Logo Nascop" />
                </div>

                <nav>
                    <ul>
                        <li><a class="menu_effect" href="#"> Accueil </a> </li>
                        <li><a class="menu_effect" href="#"> Notre offre </a> </li>
                        <li><a class="menu_effect" href="#contact"> Contact </a> </li>
                        <li><a class="menu_effect btn-connect" href="#" > Connexion </a> </li>
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
                            Capteur de mouvements infrarouge <br />
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Détection d'intrusions <br />
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Alarme opérationnelle 24h/24
                        </li>
                    </div>

                    
                    
                    

                    <div class="advntg-elem">
                        <i class="fa fa-coffee fa-3x" aria-hidden="true"></i>
                        <h3> Confort </h3>
                        <li class="offer-list">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Gérer la température des pièces <br />
                            <i class="fa fa-check" aria-hidden="true"></i>
                            Vérifier le taux d'humidité <br />
                        </li>
                    </div>

                </div>

                <a href="#" class="button learn-more"> En savoir plus </a>


            </article>

        </section>

<?php include('footer.php') ; ?>