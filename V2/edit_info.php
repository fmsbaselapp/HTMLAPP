<?php
session_start();
include "library.php";

if(isset($_SESSION['user'])):

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
				<h2><b>Bearbeite deine Informationen!</b></h2>
				
				<form action="" method="post">
				<?php
					$user_id = $_SESSION['user'];
					$db = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
					$request = $db->query("SELECT * FROM `User` WHERE `User`.`id` = '$user_id'");
					$request = $request->fetch_object();
					$username = $request->username;

					$db_user = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
					$abfrage = $db_user->query("SELECT * FROM `User` WHERE `User`.`username` = '$username'");
					$abfrage = $abfrage->fetch_object();
					$school = $abfrage->school;
					$class = $abfrage->class;
					$major_subject = $abfrage->major_subject;
					$gender = $abfrage->gender;
					?>
				
				  Deine Schule:<br>
				  <div class="col-12">
					<select name="school" id="school" method="post">
						<option <?php if($school == ""){echo "selected='selected'";}else{echo "";}?> value="">Nicht angegeben</option>
						<option <?php if($school == "Gymnasium Kirschgarten"){echo "selected='selected'";}else{echo "";}?> value="Gymnasium Kirschgarten">Gymnasium Kirschgarten</option>
						<option <?php if($school == "Gymnasium Leonhard"){echo "selected='selected'";}else{echo "";}?> value="Gymnasium Leonhard">Gymnasium Leonhard</option>
						<option <?php if($school == "Gymnasium am Münsterplatz"){echo "selected='selected'";}else{echo "";}?> value="Gymnasium am Münsterplatz">Gymnasium am Münsterplatz</option>
						<option <?php if($school == "Wirtschaftsgymnasium"){echo "selected='selected'";}else{echo "";}?> value="Wirtschaftsgymnasium">Wirtschaftsgymnasium</option>
						<option <?php if($school == "Gymnasium Bäumlihof"){echo "selected='selected'";}else{echo "";}?> value="Gymnasium Bäumlihof">Gymnasium Bäumlihof</option>
					</select>
				</div>
				  Deine Klasse:<br>
				  <input type="text" name="class" value="<?php echo $class;?>"><br>
				  Dein Schwerpunktfach:<br>
				  <input type="text" name="major_subject" value="<?php echo $major_subject;?>"><br>
				  Dein Geschlecht (für Sport):<br>
					<div class="row gtr-uniform">
					<div class="col-4 col-12-small">
						<input type="radio" id="not_stated" name="gender" value="not_stated" <?php if($gender != "Weiblich" and $gender != "Maennlich"){echo "checked";}else{echo "";}?>>
						<label for="not_stated">Nicht angeben</label>
					</div>
					<div class="col-4 col-12-small">
						<input type="radio" id="weiblich" name="gender" value="Weiblich" <?php if($gender == "Weiblich"){echo "checked";}else{echo "";}?>>
						<label for="weiblich">Weiblich</label>
					</div>
					<div class="col-4 col-12-small">
						<input type="radio" id="maennlich" name="gender" value="Maennlich" <?php if($gender == "Maennlich"){echo "checked";}else{echo "";}?>>
						<label for="maennlich">Männlich</label>
					</div>
					</div>
					<br>
				  <?php
					if(isset($_POST['absenden'])){
						$new_school = $_POST['school'];
						$new_class = $_POST['class'];
						$new_major_subject = $_POST['major_subject'];
						$new_gender = $_POST['gender'];
						
						$db_renew = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
						//update school
						$renew_school = $db_renew->prepare("UPDATE `User` SET `school` = '$new_school' WHERE `User`.`username` = '$username'");
						$renew_school->execute();
						//update class
						$renew_class = $db_renew->prepare("UPDATE `User` SET `class` = '$new_class' WHERE `User`.`username` = '$username'");
						$renew_class->execute();
						//update major_subject
						$renew_major_subject = $db_renew->prepare("UPDATE `User` SET `major_subject` = '$new_major_subject' WHERE `User`.`username` = '$username'");
						$renew_major_subject->execute();
						//update gender
						$renew_gender = $db_renew->prepare("UPDATE `User` SET `gender` = '$new_gender' WHERE `User`.`username` = '$username'");
						$renew_gender->execute();
						//back to main page
						header('Location: /index.php');
					}
					?>
				  
				  <input type="submit" name="absenden" value="Speichern"><br>
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

<?php
else:
	echo "Du bist nicht angemeldte!";
endif;
?>