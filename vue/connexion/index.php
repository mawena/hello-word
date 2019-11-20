<section>
	<link rel="stylesheet" type="text/css" href="./vue/connexion/style.css">
	<?php
	if (!isset($_SESSION['identifiant']))
	{
		if(isset($_SESSION['connexion']) AND $_SESSION['connexion'] == 'inscription')
		{
			echo '
			<form class="form-style-9" method="post" action="./controleur/connexion/index_post.php">
				<ul>
					<li>
					<input type="text" name="Identifiant" class="field-style field-split align-left" placeholder="Identifiant" required/>
					<input type="password" name="Password" class="field-style field-split align-right" placeholder="Mot de passe" required/>
					</li>

					<li>
						<input type="text" name="Nom" class="field-style field-split align-left" placeholder="Nom" required/>
						<input type="text" name="Prenoms" class="field-style field-split align-right" placeholder="Prenoms" required/>
					</li>
					
					<li>
						<input type="tel" name="Tel" class="field-style field-split align-left" placeholder="Numéro de téléphone" required/>
						<input type="email" name="Adresse_mail" class="field-style field-split align-right" placeholder="Adresse mail" required/>
					</li>
						
					<li>
						<label for="Date_de_naissance" class="align-left" >Date de naissance:</label>
						<br/>
						<input type="date" name="Date_de_naissance" class="field-style field-full align-none" placeholder="Date de naissance" id="Date_de_naissance" required/>
					</li>
					<li>
						<label for="Sexe" class="align-right">Sexe:</label>
						<select name="Sexe" id="Sexe" class="field-style field-full align-none" required>
							<option value="M">Homme</option>
							<option value="F">Femme</option>
						</select>

					</li>
					
					<li>
						<textarea name="Signature" class="field-style" placeholder="Signature"></textarea>
					</li>
					<li>
						<input type="reset" value="Effacer" />
						<input type="submit" value="Inscription" />
						<br/><br/><a href="./controleur/connexion/index_post.php?connexion=connexion" class="detail">Se connecter</a></input>
					</li>
				</ul>
			</form>
			';
		}
		else
		{
			echo '
			<form class="form-style-9" method="post" action="./controleur/connexion/index_post.php">
				<ul>
					<li>
					<input type="text" name="Identifiant" class="field-style field-split align-left" placeholder="Identifiant" required/>
					<input type="password" name="Password" class="field-style field-split align-right" placeholder="Mot de passe" required/>
					</li>

					<li>
						<input type="submit" value="Connexion" />
						<br/><br/><a href="./controleur/connexion/index_post.php?connexion=inscription" class="detail">S\'inscrire</a></input>
					</li>
				</ul>
			</form>
			';
		}
	}
	else
	{
		echo '<p class="red-color">Vous êtes déja connecté</p>';
	}
	
	if (isset($_SESSION['erreur']))
	{
		if ($_SESSION['erreur'] == 'Identifiant_exist')
		{
			echo '<p class="red-color">Cet Identifiant existe déja dans la base de données.<br/>Veuillez en choisir un autre.</p>';
		}
		if ($_SESSION['erreur'] == 'Identifiant_exist_not')
		{
			echo '<p class="red-color">Cet Identifiant n\'existe pas dans la base de données.<br/>Veuillez en choisir un autre, ou vous inscrire.</p>';
		}
		if ($_SESSION['erreur'] == 'Identifiant_not')
		{
			echo '<p class="red-color">Cet Identifiant n\'est pas valide.<br/>Veuillez en choisir un autre</p>';
		}
		if ($_SESSION['erreur'] == 'Password_incorect')
		{
			echo '<p class="red-color">L\'identifiant et le mot de passe ne corespondent pas.<br/>Veuillez réessayer.</p>';
		}
		unset($_SESSION['erreur']);
	}
	?>
</section>