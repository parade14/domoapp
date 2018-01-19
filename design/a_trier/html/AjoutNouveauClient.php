<!DOCTYPE html>
<html>
<head>
	<title>Ajout d'un nouveau client</title>
</head>
<body>

<fieldset  >

		<form method="post" action="">
			<fieldset>

			<legend>Ajout d'un nouveau client</legend>

			<LABEL for="Prénom"> Prénom : </LABEL>
			<input type="text" name="Prénom" id="prenom" required=""/><br/>

			<LABEL for="Nom"> Nom : </LABEL>
			<input type="text" name="Nom" id="Nom" required=""/> <br/>

			<LABEL for="DateDeNaissance"> Date de Naissance : </LABEL>
			<input type="text" name="DateDeNaissance" id="DateDeNaissance" required=""/> <br/>	

			<LABEL for="AdresseMail"> Adresse Mail : </LABEL>
			<input type="text" name="AdresseMail" id="AdresseMail" required=""/> <br/>

			<LABEL for="Telephone"> Numéro de Téléphone : </LABEL>
			<input type="text" name="Telephone" id="Telephone" required=""/> <br/>

			<LABEL for="Postale"> Adresse Postale : </LABEL>
			<input type="text" name="Postale" id="Postale" required=""/> <br/>

			<LABEL for="MDP"> Mot de Passe Provisoire  : </LABEL>
			<input type="text" name="MDP" id="MDP" required=""/> <br/>

			<input type="submit" name="Envoyer">
		</fieldset>
		</form>

</body>
</html>