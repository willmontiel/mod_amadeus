(function () {
  angular.module('amadeus.controllers', [])
        .controller('ctrlSearchAmadeus', ['$scope', '$window', '$http', function ($scope, $window,$http) {
            var self = this;
            $scope.loading = false;
            $scope.openFilters = false;

            self.isFromDisabled = false;
            self.isFromCached = false;
            self.selectedFrom = null;
            self.cities = [
                {
                    name: 'Cali, Colombia (CLO)',
                    description: 'Alfonso B. Aragon'
                },
                {
                    name: 'Bogotá, Colombia (BOG)',
                    description: 'El Dorado international'
                },
                {
                    name: 'Barranquilla, Colombia (BAQ)',
                    description: 'E. Cortissoz'
                }
            ];
            self.querySearchFrom = querySearch;
            self.selectedFromChange = selectedFromChange;

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
                } else {
                    self.selectedFrom = null;
                }
            }
        }]);
})();