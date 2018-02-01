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
                        <li><a class="menu_effect" href="#offre"> Notre offre </a> </li>
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

                    <p> Créée en 2017, Nascop est une start-up spécialisée dans la domotique. Elle résulte de la volonté de 6 ingénieurs passionnés à optimiser et à faciliter le contrôle des maisons qui sont de plus en plus connectées. Nascop apporte aux foyers français et internationaux son expertise et son support technique. Elle offre une solution haute gamme, flexible dynamique et à l’écoute de ses clients.
                        <br/>Nascop c’est :
                        la sécurité assurée pour votre foyer,
                        la gestion de vos pièces afin d’optimiser votre consommation,
                        la réduction de vos factures,
                        la simplicité d’utilisation depuis votre canapé.</p>

                </article>

            </article>

            <article class="offer_description articles" id="offre">

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


            </article>

        </section>

<?php include('footer.php') ; ?>