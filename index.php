<?php
include_once "Zend/Locale.php";
$zend_locale = new Zend_Locale(Zend_Locale::BROWSER);
$lang = $zend_locale->getLanguage();
$lang = "{$lang}.html";
if (file_exists($lang)) {
	include($lang);
	} else {
	include("en.html");
	}
?>