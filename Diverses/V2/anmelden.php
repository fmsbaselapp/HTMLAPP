	<html>

		<head>
			<meta name="robots" content="noindex" />
			<!-- Global site tag (gtag.js) - Google Analytics -->
			<script async src='https://www.googletagmanager.com/gtag/js?id=UA-126562528-1'></script>
			<script>
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				gtag('config', 'UA-126562528-1');
			</script>

			<title>eucomis.ch</title>
			<meta charset='utf-8' />
			<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no' />
			<link rel='stylesheet' href='assets/css/main.css' />
			<noscript><link rel='stylesheet' href='assets/css/noscript.css' /></noscript>
		</head>

		<body class="is-preload">

			<div id='wrapper'>
			<header id='header' class='alt'>
			</header>
			<div id='main'>

			<section id="content" class='main'>
				<div class="content">
				<h2><b>Anmelden</b></h2>

				<form action="" method="post">
				  Dein Edubs-Mailadresse:<br>
				  <input type="text" name="benutzername" placeholder="vorname.nachname@stud.edubs.ch"><br>
				  Dein Passwort:<br>
				  <input type="password" name="passwort" placeholder="Passwort"><br>
				  <a href="index.php?page=registrieren">Noch kein Konto? Jetzt Registrieren!</a><br><br>

				  <?php
					// Als Daten müssen folgende nacheinander eingetragen werden
					// Host | Meist localhost
					// Benutzer | Benutzername der Datenbank
					// Passwort | Passwort der Datenbank. Wenn keins vorhanden einfach leer lasssen
					// Datenbank | Name der Datenbank
					$db = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
					if($db->connect_error):
					  echo $db->connect_error;
					endif;

					if(isset($_POST['absenden'])):
					  $benutzername = strtolower($_POST['benutzername']);
					  $passwort = $_POST['passwort'];
					  $passwort = md5($passwort);

					  $search_user = $db->prepare("SELECT id FROM User WHERE username = ? AND password = ?");
					  $search_user->bind_param('ss',$benutzername,$passwort);
					  $search_user->execute();
					  $search_result = $search_user->get_result();


					  if($search_result->num_rows == 1):
						$search_object = $search_result->fetch_object();

						//check if account is activated
						$db_user = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
						$abfrage = $db_user->query("SELECT * FROM `User` WHERE `User`.`username` = '$benutzername'");
						$abfrage = $abfrage->fetch_object();
						$activated = $abfrage->activated;
						if($activated == 1):
							//im session cookie schauen ob es der richtige benutzer ist
							$_SESSION['user'] = $search_object->id;
							header('Location: /index.php');
						else:
							echo '<blockquote style="border-left: 10px solid #d28ea6;">Dein Account muss noch aktiviert werden. Schau in deinen Mails! (Es kann bis zu 24h gehen bis das Mail kommt)</blockquote>';
						endif;
					  else:
						echo '<blockquote style="border-left: 10px solid #d28ea6;">Dein Passwort oder deine E-Mailadresse ist falsch!</blockquote>';
					  endif;
					endif;
					?>

				  <input type="submit" name="absenden" value="Anmelden"><br>
				</form>

			</section>

			</div>
			</div>
			<!-- Footer -->
			<footer id='footer'>
				<section>
					<h2>Sonstiges</h2>
					<p>Falls du irgendwelche Ideen hast, dann sende mir gerne eine E-Mail. Falls du ein begabter Informatiker bist, kannst du mich auch gerne kontaktieren und mit mir zusammen diese Website gestallten!</p>
				</section>
				<section>
					<h2>Konakt</h2>
					<dl class='alt'>
						<dt>E-Mail:</dt>
						<dd><a href='mailto:info@eucomis.ch?subject=Ich habe eine alte Prüfung!'>info@eucomis.ch</a></dd>
					</dl>
				</section>
				<p class='copyright'>&copy;eucomis. Design: <a href='https://html5up.net'>HTML5 UP</a>.</p>
			</footer>
		</body>


	</html>
