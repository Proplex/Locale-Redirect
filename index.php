<?php
include_once "assets/Locale.php";
$zend_locale = new Zend_Locale(Zend_Locale::BROWSER);
$lang = $zend_locale->getLanguage();
$lang = "{$lang}.html";
include($lang);
?>