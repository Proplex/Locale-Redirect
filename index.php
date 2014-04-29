<?php
include_once "Zend/Locale.php";
try {
    $zend_locale = new Zend_Locale(Zend_Locale::BROWSER);
} catch (Zend_Locale_Exception $e) {
    $zend_locale = new Zend_Locale('en');
}
$lang = $zend_locale->getLanguage();
$lang = "{$lang}.html";
if (file_exists($lang)) {
        include($lang);
        } else {
        include("en.html");
        }
?>
