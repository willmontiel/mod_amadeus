<?php
defined('_JEXEC') or die;
 
//Carga el fichero helper.php
require_once __DIR__ . '/helper.php';
 
//Obtiene el formulario para buscar
$form = modAmadeusHelper::getForm($params);
 
//Carga la vista por defecto del módulo
require JModuleHelper::getLayoutPath('mod_amadeus');