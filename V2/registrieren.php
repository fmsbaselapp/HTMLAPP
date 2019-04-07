<?php
include "library.php";
?>

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
				<h2><b>Registrieren</b></h2>

				<form action="" method="post">
				  Gib deine Edubs-Mailadresse an:<br>
				  <input type="text" name="benutzername" placeholder="vorname.nachname@stud.edubs.ch" size="30"><br>
				  Dein Passwort:<br>
				  <input type="password" name="passwort" placeholder="Passwort" size="30"><br>
				  Wiederhole dein Passwort:<br>
				  <input type="password" name="passwort_wiederholen" placeholder="Passwort"><br>
				  <a href="index.php?page=anmelden">Schon ein Konto? Jetz anmelden!</a><br><br>

<?php
// Als Daten müssen folgende nacheinander eingetragen werden
// Host | Meist localhost
// Benutzer | Benutzername der Datenbank
// Passwort | Passwort der Datenbank. Wenn keins vorhanden einfach leer lasssen
// Datenbank | Name der Datenbank
$db = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
if($db->connect_error):
	echo("-----------------");
	echo $db->connect_error;
	echo("-----------------");
endif;
if(isset($_POST['absenden'])):

  $benutzername = $_POST['benutzername'];
  $passwort = $_POST['passwort'];
  $passwort_wiederholen = $_POST['passwort_wiederholen'];

  $search_user = $db->prepare("SELECT id FROM User WHERE username = ?");
  $search_user->bind_param('s',$benutzername);
  $search_user->execute();
  $search_result = $search_user->get_result();

  if($search_result->num_rows == 0):
    if($passwort == $passwort_wiederholen AND strpos($benutzername, '@stud.edubs.ch') !== false):
      $passwort = md5($passwort);
      $insert = $db->prepare("INSERT INTO User (username,password) VALUES (?,?)");
      $insert->bind_param('ss',$benutzername,$passwort);
      $insert->execute();
      if($insert !== false):?>
		<blockquote style="border-left: 10px solid #8ed2a1;">Dein Account wurde erfolgreich erstellt!</blockquote><br>
		<a href="index.php?page=anmelden" class="button large">Jetzt anmelden!</a><br><br>
	<?php
		//create Checksum
		$checksum = md5($benutzername.mt_rand(173, 183728));
		//insert checksum to table
		$db_user = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
		$insert_checksum = $db_user->prepare("UPDATE `User` SET `checksum` = '$checksum' WHERE `User`.`username` = '$benutzername';");
		$insert_checksum->execute();
		//creat mail-text and send it
		$text = 'Danke, dass du dich registriert hast. Klicke auf diesen Link um das Account zu aktivieren: http://www.eucomis.ch/checksumchecker.php?page='.$checksum;
		mail($benutzername ,"Hier ist der Aktivierungslink!", $text , "From: Eucomis <info@eucomis.ch>");
		//mail to me to get a notification when someone registers
		mail("maxpeteristcoolgmail.com" ,"Anmeldung auf Eucomis!", $benutzername , "From: Eucomis <info@eucomis.ch>");
      endif;
    elseif($passwort != $passwort_wiederholen):
      echo '<blockquote style="border-left: 10px solid #d28ea6;">Deine Passwörter stimmen nicht überein!</blockquote>';
	else:
		echo '<blockquote style="border-left: 10px solid #d28ea6;">Du musst deine Edubs-Mailadresse angeben!</blockquote>';
    endif;
  else:
    echo '<blockquote style="border-left: 10px solid #d28ea6;">Es hat sich schon jemand anderes mit dieser Email-Adresse angemeldet! Falls das deine Email-Adresse sein sollte, dann schreib mir auf info@eucomis.ch</blockquote>';
  endif;

endif;
?>


				  <input type="submit" name="absenden" value="Absenden"><br>
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
