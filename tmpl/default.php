<?php
defined('_JEXEC') or die;
 
//Carga de ficheros .CSS y JS
$doc = JFactory::getDocument();
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/mod_amadeus.js', 'text/javascript');
$doc->addStyleSheet(JURI::base(true).'/modules/mod_amadeus/css/mod_amadeus.css');
 
?>
 
<div class="">
    <input type="text" placeholder="search">
</div>