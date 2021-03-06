(function () {
  angular.module('amadeus.controllers', [])
        .controller('ctrlSearchAmadeus', ['$scope', '$window', '$q', 'amadeusService', 'restService', 'api', function ($scope, $window, $q, amadeusService, restService, api) {
            var self = this;
            $scope.loading = false;
            $scope.openFilters = false;
            $scope.data = {
                adults: 1,
                childs: 0,
                infants: 0,
                flightType: 'RoundTrip'
            };

            $scope.addDays = function (startDate, numberOfDays) {
                var returnDate = new Date(
                                        startDate.getFullYear(),
                                        startDate.getMonth(),
                                        startDate.getDate()+numberOfDays,
                                        startDate.getHours(),
                                        startDate.getMinutes(),
                                        startDate.getSeconds());
                return returnDate;
            }

            $scope.minDate = $scope.addDays(new Date(), 3);
            $scope.passengers = [];

            for (var i = 0; i < 10; i++) {
                $scope.passengers.push(i);
            }

            self.isFromDisabled = false;
            self.isFromCached = false;
            self.selectedFrom = null;
            self.querySearchFrom = querySearch;
            self.selectedFromChange = selectedFromChange;

            self.isToDisabled = false;
            self.isToCached = false;
            self.selectedTo = null;
            self.querySearchTo = querySearch;
            self.selectedToChange = selectedToChange;

            self.searchTextChange = searchTextChange;

            function searchTextChange(text) {
                $scope.openFilters = true;
            }

            function querySearch (query) {
                var deferred = $q.defer();
                var url = api.airport();
                restService.get(url.getByName + '?name=' + query, {}, {},
                    function(response) {
                        deferred.resolve(response.data);
                    },
                    function(response) {
                        deferred.reject(response);
                    }
                );

                return deferred.promise;
            }

            function selectedFromChange(item) {
                if (item) {
                    self.selectedFrom = item;
                    $scope.data.from = item.airport_code;
                } else {
                    self.selectedFrom = null;
                    $scope.data.from = null;
                }

                $scope.openFilters = true;
            }

            function selectedToChange(item) {
                if (item) {
                    self.selectedTo = item;
                    $scope.data.to = item.airport_code;
                } else {
                    self.selectedTo = null;
                    $scope.data.to = null;
                }

                $scope.openFilters = true;
            }

            $scope.getAirportShortName = function(airport) {
                if (airport) {
                    return airport.city_name + ", " + airport.country_name + ", " + airport.airport_code;
                }

                return "";
            }

            $scope.search = function() {
                var url = amadeusService.getSearchUrl($scope.data);
                if (url && url != "") {
                    $window.open(url, '_blank');
                }
            }

            $scope.hideFilters = function() {
                $scope.openFilters = false;
            }
        }]);
})();