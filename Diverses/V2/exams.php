<?php
session_start();
include "library.php";

if(isset($_SESSION['user'])):

?>

<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->


<html>
	<head>
	
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src='https://www.googletagmanager.com/gtag/js?id=UA-126562528-1'></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'UA-126562528-1');
		</script>
		
		<title>Alte Prüfungen aus dem Gymnasium Kirschgarten (GKG)</title>
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
						<h1>Alte Prüfungen</h1>
						<p>Sende auch deine alten Prüfungen ein, damit andere profitieren können!</p>
					</header>

				<!-- Nav -->
					<nav id='nav'>
						<ul>
							<li><a href='#mathematics'>Mathematik</a></li>
							<li><a href='#physics'>Physik</a></li>
							<li><a href='#pham'>Pham</a></li>
							<li><a href='#chemistry'>Chemie</a></li>
							<li><a href='#biology'>Biologie</a></li>
							<li><a href='#geography'>Geografie</a></li>
							<li><a href='#german'>Deutsch</a></li>
							<li><a href='#french'>Französisch</a></li>
							<li><a href='#english'>Englisch</a></li>
							<li><a href='#history'>Geschichte</a></li>
							<li><a href='#music'>Musik</a></li>
							<li><a href='#ef_chemie'>EF: Chemie</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id='main'>
							<section class='main'>
							<h2><strong>Hilf mit!</strong></h2>
							<p>Sende deine alten Prüfungen ein und hilf somit anderen! Du kannst mir die Prüfungen per E-Mail senden: <a href='mailto:info@eucomis.ch?subject=Ich habe eine alte Prüfung!'>info@eucomis.ch</a> </p>
							</section>
							
							
							
						<!-- mathematics -->
							<section id='mathematics' class='main'>
								<h3>Mathematik</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(mathematics); ?>

													
												</tbody>
											</table>
										</div>
							</section>

						<!-- physics -->
							<section id='physics' class='main'>
								<h3>Physik</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(physics); ?>

													
												</tbody>
											</table>
										</div>
							</section>
							
						<!-- pham -->
							<section id='pham' class='main'>
								<h3>Pham</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(pham); ?>

													
												</tbody>
											</table>
										</div>
							</section>	
						
						<!-- chemistry -->
							<section id='chemistry' class='main'>
								<h3>Chemie</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(chemistry); ?>

													
												</tbody>
											</table>
										</div>
							</section>
							
						<!-- biology -->
							<section id='biology' class='main'>
								<h3>Biologie</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(biology); ?>

												</tbody>
											</table>
										</div>
							</section>

						<!-- geography -->
							<section id='geography' class='main'>
								<h3>Geografie</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(geography); ?>

												</tbody>
											</table>
										</div>
							</section>
							
						<!-- german -->
							<section id='german' class='main'>
								<h3>Deutsch</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(german); ?>

													
												</tbody>
											</table>
										</div>
							</section>	
						
						<!-- french -->
							<section id='french' class='main'>
								<h3>Französisch</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(french); ?>

												</tbody>
											</table>
										</div>
							</section>	

						<!-- english -->
							<section id='english' class='main'>
								<h3>Englisch</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(english); ?>

													
												</tbody>
											</table>
										</div>
							</section>

						<!-- history -->
							<section id='history' class='main'>
								<h3>Geschichte</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(history); ?>

												</tbody>
											</table>
										</div>
							</section>
							
						<!-- music -->
							<section id='music' class='main'>
								<h3>Musik</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(music); ?>

													
												</tbody>
											</table>
										</div>
							</section>	
							
						<!-- ef chemie -->
							<section id='ef_chemie' class='main'>
								<h3>EF: Chemie</h3>
										<div class='table-wrapper'>
											<table>
												<thead>
													<tr>
														<th>Lehrer/in</th>
														<th>Thema</th>
														<th>Download</th>
													</tr>
												</thead>
												<tbody>
												
<?php getPDF(ef_chemie); ?>

													
												</tbody>
											</table>
										</div>
							</section>	

					</div>

				<!-- Footer -->
					<footer id='footer'>
						<section>
							<h2>Sonstiges</h2>
							<p>Falls du irgendwelche Ideen hast, dann sende mir gerne eine E-Mail. Falls du ein begabter Informatiker bist, kannst du mich auch gerne kontaktieren und mit mir zusammen diese Website zu gestallten!</p>
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
	echo "Du bist nicht angemeldet!";
endif;
?>
