<?php
defined('_JEXEC') or die;
 
//Carga de ficheros .CSS y JS
$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::base(true).'/modules/mod_amadeus/lib/angular-material/angular-material.min.css');

$doc->addScript(JURI::base(true).'/modules/mod_amadeus/lib/angular/angular.min.js', 'text/javascript');
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/lib/angular-material/angular-animate.min.js', 'text/javascript');
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/lib/angular-material/angular-aria.min.js', 'text/javascript');

$doc->addScript(JURI::base(true).'/modules/mod_amadeus/lib/angular-material/angular-material.min.js', 'text/javascript');

$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/mod_amadeus.js', 'text/javascript');
$doc->addStyleSheet(JURI::base(true).'/modules/mod_amadeus/css/mod_amadeus.css');

$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/app/app.js', 'text/javascript');
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/app/controllers.js', 'text/javascript');
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/app/directives.js', 'text/javascript');
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/app/services.js', 'text/javascript');
 
?>
 
<div class="container-fluid" ng-app="amadeus" ng-controller="ctrlSearchAmadeus as Ctrl" ng-cloa> 
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
                    <input class="form-check-input" type="radio" name="route" id="route1" value="1" checked>
                    Ida y vuelta
                </label>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="route" id="route2" value="2">
                    Solo ida
                </label>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="form-group">
                <label for="from">Fecha de salida</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="Aeropuerto o ciudad">
                <small id="from" class="form-text text-muted">Escribe y selecciona el aeropuerto o ciudad de origen</small>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="from">Fecha de regreso</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="Aeropuerto o ciudad">
                <small id="from" class="form-text text-muted">Escribe y selecciona el aeropuerto o ciudad de origen</small>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="form-group">
                <label for="from">Fecha de salida</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="Aeropuerto o ciudad">
                <small id="from" class="form-text text-muted">Escribe y selecciona el aeropuerto o ciudad de origen</small>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                <label for="from">Fecha de regreso</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="Aeropuerto o ciudad">
                <small id="from" class="form-text text-muted">Escribe y selecciona el aeropuerto o ciudad de origen</small>
            </div>
        </div>
    </div>
</div>