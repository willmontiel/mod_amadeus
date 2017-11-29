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

$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/app/services.js', 'text/javascript');
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/app/controllers.js', 'text/javascript');
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/app/directives.js', 'text/javascript');
$doc->addScript(JURI::base(true).'/modules/mod_amadeus/js/app/app.js', 'text/javascript');
 
?>
 
<div ng-app="amadeus" ng-controller="ctrlSearchAmadeus as ctrl" ng-cloak> 
    <div layout="row" layout-align="space-between center">
        <div>
            <md-input-container class="all-width">
                <label for="from">Desde</label>
                <md-autocomplete
                    ng-disabled="ctrl.isFromDisabled"
                    md-no-cache="ctrl.isFromCached"
                    md-selected-item="ctrl.selectedFrom"
                    md-search-text="ctrl.searchFromText"
                    md-selected-item-change="ctrl.selectedFromChange(item)"
                    md-items="item in ctrl.querySearchFrom(ctrl.searchFromText)"
                    md-item-text="item.name"
                    md-min-length="0"
                    placeholder="Aeropuerto o ciudad">
                    <md-item-template>
                        <span md-highlight-text="ctrl.searchFromText" md-highlight-flags="^i">{{item.name}}</span>
                    </md-item-template>
                    <md-not-found>
                        Se encontraron coincidencias con el texto "{{ctrl.searchFromText}}"
                    </md-not-found>
                </md-autocomplete>

                <div class="h7 grey-fg">
                    Escribe y selecciona el aeropuerto o ciudad de origen
                </div>

            </md-input-container>
        </div>
        
        <div>
            <div class="form-group">
                <label for="from">Hasta</label>
                <input type="text" class="form-control" id="to" name="to" placeholder="Aeropuerto o ciudad">
                <div class="h7 grey-fg">
                    Escribe y selecciona el aeropuerto o ciudad de destino
                </div>
            </div>
        </div>
    </div>

    <div ng-if="openFilters" class="mt-5">
        <div layout="row" layout-align="start center">
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="route" id="route1" value="1" checked>
                    Ida y vuelta
                </label>
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="route" id="route2" value="2">
                    Solo ida
                </label>
            </div>
        </div>

        <div layout="row" layout-align="space-between center">
            <div class="form-group">
                <label for="from">Fecha de salida</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="Aeropuerto o ciudad">
                <small id="from" class="form-text text-muted">Escribe y selecciona el aeropuerto o ciudad de origen</small>
            </div>

            <div class="form-group">
                <label for="from">Fecha de regreso</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="Aeropuerto o ciudad">
                <small id="from" class="form-text text-muted">Escribe y selecciona el aeropuerto o ciudad de origen</small>
            </div>
        </div>

        <div layout="row" layout-align="space-between center">
            <div class="form-group">
                <label for="from">Adultos</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="Aeropuerto o ciudad">
            </div>

            <div class="form-group">
                <label for="from">Niños</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="Aeropuerto o ciudad">
            </div>

            <div class="form-group">
                <label for="from">Infantes</label>
                <input type="text" class="form-control" id="from" name="from" placeholder="Aeropuerto o ciudad">
            </div>
        </div>
    </div>
</div>