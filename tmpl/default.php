<?php
defined('_JEXEC') or die;
 
//Carga de ficheros .CSS y JS
$doc = JFactory::getDocument();
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/mod_amadeus.js', 'text/javascript');
$doc->addStyleSheet(JURI::base(true).'/modules/mod_amadeus/css/mod_amadeus.css');
 
?>
 
<div class="container-fluid"> 
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="from">Desde</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="Aeropuerto o ciudad">
                <small id="from" class="form-text text-muted">Escribe y selecciona el aeropuerto o ciudad de origen</small>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="from">Hasta</label>
                <input type="text" class="form-control" id="to" name="to" placeholder="Aeropuerto o ciudad">
                <small id="to" class="form-text text-muted">Escribe y selecciona el aeropuerto o ciudad de destino</small>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    Option one is this and that&mdash;be sure to include why it's great
                </label>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    Option one is this and that&mdash;be sure to include why it's great
                </label>
            </div>
        </div>
    </div>
</div>