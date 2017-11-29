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
 
<div id="amadeus-searcher" ng-app="amadeus" ng-controller="ctrlSearchAmadeus as ctrl" ng-cloak> 
    <div layout="row" flex="100" layout-align="space-between center">
        <div flex="50" class="pr-10">
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
        
        <div flex="50" class="pl-10">
            <md-input-container class="all-width">
                <label for="to">Hasta</label>
                <md-autocomplete
                    ng-disabled="ctrl.isToDisabled"
                    md-no-cache="ctrl.isToCached"
                    md-selected-item="ctrl.selectedTo"
                    md-search-text="ctrl.searchToText"
                    md-selected-item-change="ctrl.selectedToChange(item)"
                    md-items="item in ctrl.querySearchTo(ctrl.searchToText)"
                    md-item-text="item.name"
                    md-min-length="0"
                    placeholder="Aeropuerto o ciudad">
                    <md-item-template>
                        <span md-highlight-text="ctrl.searchToText" md-highlight-flags="^i">{{item.name}}</span>
                    </md-item-template>
                    <md-not-found>
                        Se encontraron coincidencias con el texto "{{ctrl.searchToText}}"
                    </md-not-found>
                </md-autocomplete>

                <div class="h7 grey-fg">
                    Escribe y selecciona el aeropuerto o ciudad de destino
                </div>
            </md-input-container>
        </div>
    </div>

    <div ng-if="openFilters" class="mt-8">
        <div layout="row" layout-align="start center">
            <md-radio-group layout="row" ng-model="data.route">
                <md-radio-button value="1" class="md-primary pr-8">Ida y vuelta</md-radio-button>
                <md-radio-button value="2" class="md-primary pl-8"> Solo ida </md-radio-button>
            </md-radio-group>
        </div>

        <div layout="row" layout-align="space-between center">
            <div flex="50" class="pr-10">
                <div class="h5">Fecha de salida</div>
                <md-datepicker md-min-date="minDate" ng-model="data.startDate" md-placeholder="-/-/-" md-open-on-focus></md-datepicker>
            </div>

            <div flex="50" class="pr-10">
                <div class="h5">Fecha de regreso</div>
                <md-datepicker md-min-date="data.startDate" ng-disabled="!data.startDate" ng-model="data.endDate" md-placeholder="-/-/-" md-open-on-focus></md-datepicker>
            </div>
        </div>

        <div layout="row" layout-align="space-between center">
            <div flex class="pr-10">
                <label for="from">Adultos</label>
                
            </div>

            <div flex class="pl-10 pr-10">
                <label for="from">Niños</label>
                
            </div>

            <div flex class="pl-10">
                <label for="from">Infantes</label>
                
            </div>
        </div>
    </div>
</div>