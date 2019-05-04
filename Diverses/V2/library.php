<?php

//PDF suchen und anzeigen
function getPDF($subject){
	$dir = "/var/www/vhosts/eucomis.ch/httpdocs/exams_pdf/$subject/";
	$arrayFileNames = scandir($dir);
	$numberOfFiles = count($arrayFileNames) - 2;


	//wenn es keine Prüfungen in diesm Fach gibt
	if ($arrayFileNames == false or $numberOfFiles == 0){
		$teacherFirstName = "-";
		$teacherLastName = "";
		$description = "Noch keine Prüfung in diesem Fach :(";
		$html .= "
		<tr>
			<td style='color:#636363;' >$teacherFirstName $teacherLastName</td>
			<td style='color:#636363;'>$description</td>
			<td><a href='exams_pdf/$subject/$fileName' class='button icon fa-download small disabled' download></a></td>
		</tr>

		";
		echo $html;
		return;
	}

	for ($x=0; $x<$numberOfFiles; $x++){
		$fileName = $arrayFileNames[$x+2]; //file Name mit "_datum.pdf" (oder andere endung...)
		$wholeName = substr($fileName, 0, strlen($fileName)-9);  //file Name ohne "_datum.pdf"

		//Vornamen
		$posUnderscore = strpos($wholeName, "_"); //sucht position vom ersten underscore
		$teacherFirstName = substr($wholeName,0, $posUnderscore); //von anfang bis zum ersten underscore
		$wholeName = str_replace($teacherFirstName."_", "",$wholeName); //lösche vornamen aus ganzem file Namen
		$teacherFirstName = ucfirst($teacherFirstName); //ersten Buchstaben gross machen

		//Nachnamen
		$posUnderscore = strpos($wholeName, "_"); //sucht position vom ersten underscore
		$teacherLastName = substr($wholeName,0, $posUnderscore); //von anfang bis zum ersten underscore
		$wholeName = str_replace($teacherLastName."_", "",$wholeName); //lösche vornamen aus ganzem file Namen
		$teacherLastName = ucfirst($teacherLastName); //ersten Buchstaben gross machen

		//Beschreibung
		$wholeName = str_replace("_"," ",$wholeName); //ersetze alle underscore durch leerschläge
		$description = ucfirst($wholeName); //ersten Buchstaben gross machen

		//ergänze html
		$html .= "
		<tr>
			<td style=color:#636363 >$teacherFirstName $teacherLastName</td>
			<td style=color:#636363>$description</td>
			<td><a href='exams_pdf/$subject/$fileName' class='button icon fa-download small' download></a></td>
		</tr>

		";
	}
	//give back html code
	echo $html;
}

//html code stück holen, dass die heutigen sachen anzeigt
function getToday($source){
	if (substr_count($source, "h3") == 4){
		$sourcecode = file_get_contents($source);
		$result = stringBetween($sourcecode,"</h3>","<h3>");
	}
	else{
		$result = "";
	}
	return $result;
}

//html code stück holen, dass die morgigen sachen anzeigt
function getTomorrow($source){
	if (substr_count($source, "h3") == 4){
		$sourcecode = file_get_contents($source);
		$result = stringBetween($sourcecode,"</h3>","");
		$result = stringBetween($result,"<h3>","<h2>");
		$result = substr($result, strpos($result, "<div")); //namen des heutigen tages herausnehmen
	}
	else{
		$sourcecode = file_get_contents($source);
		$result = stringBetween($sourcecode,"<h3>","");
		$result = stringBetween($result,"</h3>","<h2>");
	}
	return $result;
}

//html code in die richtige form bringen, dass es schön angezeigt wird
function convertToRightFormat($string){
	$string = str_replace ('<div class="panel panel-default">', '<div rel=\'stylesheet\' href=\'assets/css/table.css\' class="panel panel-default"  >', $string);
	$string = str_replace ( '<div class="panel-heading">', '<div rel=\'stylesheet\' href=\'assets/css/table.css\' class="panel-heading" style="background-color:#F7F7F7;border-radius: 3px;">', $string);
	$result = str_replace ( '<div class="panel-body">', '<div rel=\'stylesheet\' href=\'assets/css/table.css\' class="panel-body">', $string);
	return $result;
}

//aus einem String ein stück zwischen zwei strings finden
function stringBetween ($strText,$startWord,$endWord){

	if ($endWord == ""){
		$intPositionStartWordFromAll = strpos($strText , $startWord);
		$strAllBehindStartWord = substr ($strText, $intPositionStartWordFromAll);
		$result = str_replace($startWord,"",$strAllBehindStartWord);
		return $result;
	}
	$intPositionStartWordFromAll = strpos($strText , $startWord);
	$strAllBehindStartWord = substr ($strText, $intPositionStartWordFromAll);
	$intPositionStartWord = strpos($strAllBehindStartWord , $startWord);
	$intPositionEndWord = strpos($strAllBehindStartWord , $endWord);
	if ($intPositionStartWord === false){ //Wenn es das Startwort nicht gibt -> false
		return false;
	}
	else if($intPositionEndWord === false){ //Wenn es das Endwort nicht gibt -> false
		return false;
	}
	else if(strpos($strAllBehindStartWord , $startWord) >= strpos($strAllBehindStartWord , $endWord)){ //Wenn das Startwort nach dem Endwort kommt -> false
		return false;
	}
	else{
		//Das dazwischen
		$intStartPositionContent = $intPositionStartWord + strlen($startWord);
		$intEndPositionContent = $intPositionEndWord - $intStartPositionContent;
		$result = substr ($strAllBehindStartWord ,$intStartPositionContent,$intEndPositionContent);
		//Das danach
		$strText = substr ($strAllBehindStartWord , $intPositionEndWord);
		//Ausgeben
		return $result;
	}
}


?>
