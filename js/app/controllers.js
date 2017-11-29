(function () {
  angular.module('amadeus.controllers', [])
        .controller('ctrlSearchAmadeus', ['$scope', '$window', '$http', 'amadeusService', function ($scope, $window, $http, amadeusService) {
            var self = this;
            $scope.loading = false;
            $scope.openFilters = false;
            $scope.data = {
                adults: 1,
                childs: 0,
                infants: 0,
                route: 1
            };

            $scope.minDate = new Date();

            self.isFromDisabled = false;
            self.isFromCached = false;
            self.selectedFrom = null;
            self.cities = [
                {
                    id: 'CLO',
                    name: 'Cali, Colombia (CLO)',
                    description: 'Alfonso B. Aragon'
                },
                {
                    id: 'BOG',
                    name: 'Bogotá, Colombia (BOG)',
                    description: 'El Dorado international'
                },
                {
                    id: 'BAQ',
                    name: 'Barranquilla, Colombia (BAQ)',
                    description: 'E. Cortissoz'
                }
            ];

            $scope.passengers = [];

            for (var i = 0; i < 10; i++) {
                $scope.passengers.push(i);
            }

            self.querySearchFrom = querySearch;
            self.selectedFromChange = selectedFromChange;


            self.isToDisabled = false;
            self.isToCached = false;
            self.selectedTo = null;
            self.querySearchTo = querySearch;
            self.selectedToChange = selectedToChange;

            function querySearch (query) {
                var results = query ? self.cities.filter( createFilterFor(query) ) : self.cities;
                return results;
            }

            function createFilterFor(query) {
                var lowercaseQuery = angular.lowercase(query);

                return function filterFn(city) {
                    res = angular.lowercase(city.name);
                    return res.indexOf(lowercaseQuery.toLowerCase())!=-1;
                };
            }

            function selectedFromChange(item) {
                if (item) {
                    self.selectedFrom = item;
                    $scope.data.from = item.id;
                } else {
                    self.selectedFrom = null;
                    $scope.data.from = null;
                }

                $scope.openFilters = true;
            }

            function selectedToChange(item) {
                if (item) {
                    self.selectedTo = item;
                    $scope.data.to = item.id;
                } else {
                    self.selectedTo = null;
                    $scope.data.to = null;
                }
            }

            $scope.search = function() {
                console.log(amadeusService.getSearchUrl($scope.data));
            }
        }]);
})();