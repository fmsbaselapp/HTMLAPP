<?php
echo "START<br>";
  
$db = new mysqli('localhost:3306','eucomis.ch','el2002io','User');


if($db->connect_error):
  echo $db->connect_error;
endif;

$benutzername = "elio";

$abfrage = $db->query("SELECT * FROM `User` WHERE `User`.`username` = '$benutzername'");
$abfrage = $abfrage->fetch_object();
$result = $abfrage->activated;

if ($result == 1):
	echo "Show Website!<br>";
else:
	echo "Not activated!<br>";
endif;

echo "<br>END";
?>