<?php
$page = strtolower($_GET['page']);

if($page != ""):
	//check if account is activated
	$db_user = new mysqli('localhost:3306','eucomis.ch','el2002io','User');
	$insert_checksum = $db_user->prepare("UPDATE `User` SET `activated` = '1' WHERE `User`.`checksum` = '$page';");
	$insert_checksum->execute();
	echo "Dein Account wurde aktiviert!";
endif;
?>
<!--reload page and get to main page-->
<meta http-equiv="refresh" content="0; URL=https://www.eucomis.ch/index.php?page=anmelden">
