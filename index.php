<?php
$fmsbasel_html = file_get_contents('https://display.edubs.ch/gl1');
$fmsbasel_doc = new DOMDocument();
$fmsbasel_doc->loadHTML($fmsbasel_html);



echo $fmsbasel_html
?>