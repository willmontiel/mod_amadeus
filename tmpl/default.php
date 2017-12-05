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
    <div class="background"></div>
    <form name="searchForm" class="p-10 white-fg">
        <div layout="row" flex="100" layout-align="space-between center" layout-wrap>
            <div flex="auto" class="pl-10 pr-10">
                <md-input-container class="all-width">
                    <label for="from" class="white-fg h3 text-bold">Desde</label>
                    <md-autocomplete
                        ng-disabled="ctrl.isFromDisabled"
                        md-no-cache="ctrl.isFromCached"
                        md-selected-item="ctrl.selectedFrom"
                        md-search-text="ctrl.searchFromText"
                        md-selected-item-change="ctrl.selectedFromChange(item)"
                        md-items="item in ctrl.querySearchFrom(ctrl.searchFromText)"
                        md-item-text="getAirportShortName(item)"
                        md-min-length="1"
                        placeholder="Aeropuerto o ciudad"
                        name="from"
                        md-menu-class="autocomplete-custom-template"
                        required>
                        <md-item-template>
                            <span class="item-title">
                                <span class=""> {{item.city_name}}, {{item.country_name}}, {{item.airport_code}} </span>
                            </span>
                            <span class="item-metadata">
                                <span>&#9992;</span>
                                <span>
                                    <strong class="h7">{{item.airport_name}}</strong>
                                </span>
                            </span>
                        </md-item-template>
                        <md-not-found>
                            No se encontraron coincidencias con el texto "{{ctrl.searchFromText}}"
                        </md-not-found>
                    </md-autocomplete>

                    <div class="h7 white-fg">
                        Escribe y selecciona el aeropuerto o ciudad de origen
                    </div>
                </md-input-container>
            </div>
            
            <div flex="auto" class="pl-10 pr-10">
                <md-input-container class="all-width">
                    <label for="to" class="white-fg h3 text-bold">Hasta</label>
                    <md-autocomplete
                        ng-disabled="ctrl.isToDisabled"
                        md-no-cache="ctrl.isToCached"
                        md-selected-item="ctrl.selectedTo"
                        md-search-text="ctrl.searchToText"
                        md-selected-item-change="ctrl.selectedToChange(item)"
                        md-items="item in ctrl.querySearchTo(ctrl.searchToText)"
                        md-item-text="getAirportShortName(item)"
                        md-min-length="1"
                        placeholder="Aeropuerto o ciudad"
                        name="to"
                        md-menu-class="autocomplete-custom-template"
                        required>
                        <md-item-template>
                            <span class="item-title">
                                <span class=""> {{item.city_name}}, {{item.country_name}}, {{item.airport_code}} </span>
                            </span>
                            <span class="item-metadata">
                                <span>&#9992;</span>
                                <span>
                                    <strong class="h7">{{item.airport_name}}</strong>
                                </span>
                            </span>
                        </md-item-template>
                        <md-not-found>
                            No se encontraron coincidencias con el texto "{{ctrl.searchToText}}"
                        </md-not-found>
                    </md-autocomplete>

                    <div class="h7 white-fg">
                        Escribe y selecciona el aeropuerto o ciudad de destino
                    </div>
                </md-input-container>
            </div>
        </div>

        <div ng-if="openFilters" class="">
            <div layout="row" layout-align="space-between center" class="mb-30" layout-wrap>
                <div flex="auto" layout="row" class="pl-10 pr-10 pt-8" layout-align="start center" layout-wrap>
                    <div class="white-fg z-index-10 h6">Fecha de salida *</div>
                    <div>
                        <md-datepicker md-min-date="minDate" 
                            class="all-width"
                            ng-model="data.startDate"  
                            md-placeholder="--/--/----" 
                            md-open-on-focus
                            name="startDate" 
                            required>
                        </md-datepicker>
                    </div>
                </div>

                <div flex="auto" ng-if="data.flightType == 'RoundTrip'" layout="row" class="pl-10 pr-10 pt-8" layout-align="start center" layout-wrap>
                    <div class="white-fg z-index-10 h6">Fecha de regreso</div>
                    <div>
                        <md-datepicker md-min-date="data.startDate" 
                            class="all-width"
                            ng-disabled="!data.startDate" 
                            ng-model="data.endDate" 
                            md-placeholder="--/--/----" 
                            md-open-on-focus
                            name="endDate">
                        </md-datepicker>
                    </div>
                </div>
            </div>

            <div layout="row" layout-align="space-between center" class="pl-10 pr-10" layout-wrap>
                <div flex="auto" class="pb-10">
                    <md-radio-group layout="row" ng-model="data.flightType" name="flightType" required>
                        <md-radio-button value="RoundTrip" class="md-primary pr-8">Ida y vuelta</md-radio-button>
                        <md-radio-button value="OneWay" class="md-primary pl-8" ng-click="data.endDate = null">Solo ida</md-radio-button>
                    </md-radio-group>
                </div>
                
                <div flex="auto" class="pr-10">
                    <md-input-container class="all-width">
                        <label for="from" class="white-fg h5">Adultos</label>
                        <md-select ng-model="data.adults">
                            <md-option ng-repeat="passenger in passengers" ng-value="passenger" ng-disabled="$index === 0">
                                {{passenger}}
                            </md-option>
                        </md-select>
                    </md-input-container>
                </div>

                <div flex="auto" class="pl-10 pr-10">
                    <md-input-container class="all-width">
                        <label for="from" class="white-fg h5">Niños (2-11)</label>
                        <md-select ng-model="data.childs">
                            <md-option ng-repeat="passenger in passengers" ng-value="passenger">
                                {{passenger}}
                            </md-option>
                        </md-select>
                    </md-input-container>
                </div>

                <div flex="auto" class="pl-10">
                    <md-input-container class="all-width">
                        <label for="from" class="white-fg h5">Infantes (0-2)</label>
                        <md-select ng-model="data.infants">
                            <md-option ng-repeat="passenger in passengers" ng-value="passenger">
                                {{passenger}}
                            </md-option>
                        </md-select>
                    </md-input-container>
                </div>
            </div>

            <div layout="row" layout-align="center center" class="m-15">
                <md-button ng-click="search()" 
                    class="md-raised orange-bg"
                    ng-disabled="searchForm.$invalid || searchForm.$pristine || vm.loading">
                    Buscar
                </md-button>
            </div>
        </div>
    </form>
</div>