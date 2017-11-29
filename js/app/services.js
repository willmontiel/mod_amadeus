(function () {
    angular.module('amadeus.services', [])
        .factory('amadeusService', ['$http', '$q', function ($http, $q) {
                function createSearchUrl(data) {
                    var host = 'https://www-amer.epower.amadeus.com';
                    var client = 'cruceroturismo';

                    return data;
                }

                return {
                    createSearchUrl: createSearchUrl,
                };

                }])

})();