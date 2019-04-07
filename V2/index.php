<html>
  <head>
    <title>Eucomis:Login</title>
  </head>
  <body>
<?php
session_start();
// Seite?
$page = strtolower($_GET['page']);

// Nutzer ist angemeldet?
// TODO: Prüfen ob Nutzer angemeldet ist
if(isset($_SESSION['user'])):
  require_once('ui.php');
  require_once('exams.php');
  require_once('edit_info.php');
else:
  if($page == 'anmelden'):
    require_once('anmelden.php');
  elseif($page == 'registrieren'):
    require_once('registrieren.php');

  else:
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

		<body class="is-preload">

			<div id='wrapper'>
			<header id='header' class='alt'>
			</header>
			<div id='main'>

			<section id="content" class='main'>
				<div class="content">
				<h2><b>eucomis.ch</b></h2>
				<a href="index.php?page=anmelden" class="button large">Anmelden</a>
				<a href="index.php?page=registrieren" class="button large">Registrieren</a><br><br>
				</div>
				<p>Regristriere dich, falls du das erste Mal hier bist! </p>
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
<?php
  endif;
endif;
?>
  </body>
</html>
