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

$search_user = $db->prepare("SELECT * FROM User WHERE id = ?");
$search_user->bind_param('i',$_SESSION['user']);
$search_user->execute();
$search_result = $search_user->get_result();

if($search_result->num_rows == 1 ):
  $search_object = $search_result->fetch_object();

  if(isset($_POST['abmelden'])):
    session_destroy();
    header('Location: /index.php');
  endif;

//echo 'Willkommen zurück, '.$search_object->username.'!<br>';
//echo '<form action="" method="post"><input type="submit" name="abmelden" value="Abmelden"></form>';

if(isset($_POST['edit_info'])):
	header('Location: /edit_info.php');
endif;

?>

<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php
include "library.php";
?>

<html>
	<head>

		<meta name="robots" content="noindex" />

		<title>eucomis.ch</title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no' />
		<link rel='stylesheet' href='assets/css/main.css' />
		<noscript><link rel='stylesheet' href='assets/css/noscript.css' /></noscript>
	</head>
	<body class='is-preload'>

		<!-- Wrapper -->
			<div id='wrapper'>

				<!-- Header -->
					<header id='header' class='alt'>
						<span class='logo'><a href='index.php'> <img src='images/logo.svg' alt='' /> </a> </span>
						<h1>Gymnasium Kirschgarten</h1>
						<p>Alte Prüfungen und Stundenplanänderungen</p>
					</header>

				<!-- Nav -->
					<nav id='nav'>
						<ul>
							<li><a href='#intro' class='active'>Wo bist du Hier?</a></li>
							<li><a href='#user' >Deine Angaben</a></li>
							<li><a href='#first'>Alte Prüfungen</a></li>
							<li><a href='#second'>Aktuelles!</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id='main'>

						<!-- Introduction -->
							<section id='intro' class='main'>
								<div class='spotlight'>
									<div class='content'>


										<header class='major'>
											<h2>eucomis.ch</h2>
										</header>
										<p>Auf dieser Seite werde ich alte Prüfungen aus dem Gymnasium Kirschgarten hochladen. Später wird auch noch ein System dazukommen, welches dir deine 'persönlichen' Stundenplanänderungen mitteilt!</p>

									</div>
									<span class='image'><img src='images/gkg_schulhaus.jpg' alt='' /></span>
								</div>
							</section>

							<!-- Personal Info -->
							<section id='user' class='main'>
								<div class='spotlight'>
									<div class='content'>

										<h2>Du bist angemeldet mit: <b><?php echo $search_object->username; ?></b></h2>

										<div class="row">
											<div class="col-6 col-12-medium">
												<ul class="actions stacked">
													<!-- button to sign out-->
													<li><form action="" method="post"><input class="button primary fit" type="submit" name="abmelden" value="Abmelden"></form></li>
												</ul>

											</div>
											<div class="col-6 col-12-medium">
												<ul class="actions stacked" >
													<!-- button to edit info-->
													<li><form action="" method="post"><input class="button fit" type="submit" name="edit_info" value="Bearbeiten"></form></li>
												</ul>
											</div>
										</div>

										<div class="table-wrapper">
											<table style=color:#636363 class="doFixed doAutoWidth">
												<tbody>
													<tr>
														<td>Schulhaus</td>
														<td><?php
															//get user data from table
															$username = $search_object->username;
															$db_user = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
															$abfrage = $db_user->query("SELECT * FROM `User` WHERE `User`.`username` = '$username'");
															$abfrage = $abfrage->fetch_object();
															$school = $abfrage->school;
															//message that shows when there is no data!
															$error_message = "Klicke auf \"Bearbeiten\" um die Website zu personalisieren";
															if ($school == ""){
																echo $error_message;
															}
															else{
																echo $school;
															}
															?></td>
													</tr>
													<tr>
														<td>Klasse</td>
														<td><?php
															$username = $search_object->username;
															$db_user = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
															$abfrage = $db_user->query("SELECT * FROM `User` WHERE `User`.`username` = '$username'");
															$abfrage = $abfrage->fetch_object();
															$class = $abfrage->class;
															if ($class == ""){
																echo $error_message;
															}
															else{
																echo $class;
															}
															?></td>
													</tr>
													<tr>
														<td>Schwerpunktfach</td>
														<td><?php
															$username = $search_object->username;
															$db_user = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
															$abfrage = $db_user->query("SELECT * FROM `User` WHERE `User`.`username` = '$username'");
															$abfrage = $abfrage->fetch_object();
															$major_subject = $abfrage->major_subject;
															if ($major_subject == ""){
																echo $error_message;
															}
															else{
																echo $major_subject;
															}
															?></td>
													</tr>
													<tr>
														<td>Geschlecht (für Sport)</td>
														<td><?php
															$username = $search_object->username;
															$db_user = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
															$abfrage = $db_user->query("SELECT * FROM `User` WHERE `User`.`username` = '$username'");
															$abfrage = $abfrage->fetch_object();
															$gender = $abfrage->gender;
															if ($gender == "not_stated" or $gender == ""){
																echo $error_message;
															}
															else{
																$gender = str_replace ( 'ae', 'ä', $gender);
																echo $gender;
															}
															?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</section>

						<!-- Alte Prüfungen -->
							<section id='first' class='main special'>
								<header class='major'>
									<h2>Alte Prüfungen!</h2>
								</header>
								<ul class='features'>
									<li>
										<span class='icon major style5 fa-calculator'></span>
										<h3>Mathematik</h3>
										<a href='exams.php#mathematics' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style5 fa-grav'></span>
										<h3>Physik</h3>
										<a href='exams.php#physics' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style5 fa-superscript'></span>
										<h3>Pham</h3>
										<a href='exams.php#pham' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style4 fa-flask'></span>
										<h3>Chemie</h3>
										<a href='exams.php#chemistry' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style4 fa-bug'></span>
										<h3>Biologie</h3>
										<a href='exams.php#biology' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style4 fa-globe'></span>
										<h3>Geografie</h3>
										<a href='exams.php#geography' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style3 fa-language'></span>
										<h3>Deutsch</h3>
										<a href='exams.php#german' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style3 fa-language'></span>
										<h3>Französisch</h3>
										<a href='exams.php#french' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style3 fa-language'></span>
										<h3>Englisch</h3>
										<a href='exams.php#english' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style2 fa-university'></span>
										<h3>Geschichte</h3>
										<a href='exams.php#history' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style2 fa-music'></span>
										<h3>Musik</h3>
										<a href='exams.php#music' class='button'>Zu den Prüfungen!</a>
									</li>
									<li>
										<span class='icon major style2 fa-flask'></span>
										<h3>EF: Chemie</h3>
										<a href='exams.php#ef_chemie' class='button'>Zu den Prüfungen!</a>
									</li>

								</ul>

							</section>

						<!-- Stundenplanänderungen -->
							<section id='second' class='main special'>
								<header class='major'>
									<h2>Aktuelles!</h2>
									<p>Hier werden in Zukunft nur noch Ausfälle angezeigt die für dich wichtig sind!</p>
								</header>
								<h2>Heute</h2>

								<?php
								$today = getToday("https://display.edubs.ch/gkg1");
								//$today = getToday("source_code.html");
								$today = convertToRightFormat($today);
								echo $today;
								?>

								<h2>Morgen</h2>

								<?php
								$tomorrow = getTomorrow("https://display.edubs.ch/gkg1");
								//$tomorrow = getTomorrow("source_code.html");
								$tomorrow = convertToRightFormat($tomorrow);
								echo $tomorrow;
								?>

								<footer class='major'>
									<ul class='actions special'>
										<li><a href='https://display.edubs.ch/gkg1' class='button' target="_blank">Offizielle Website!</a></li>
									</ul>
								</footer>
							</section>

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

			</div>

		<!-- Scripts -->
			<script src='assets/js/jquery.min.js'></script>
			<script src='assets/js/jquery.scrollex.min.js'></script>
			<script src='assets/js/jquery.scrolly.min.js'></script>
			<script src='assets/js/browser.min.js'></script>
			<script src='assets/js/breakpoints.min.js'></script>
			<script src='assets/js/util.js'></script>
			<script src='assets/js/main.js'></script>

	</body>
</html>

<?php

else:
	header('Location: /index.php');

endif;

?>
