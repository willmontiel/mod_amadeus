(function () {
    angular.module('amadeus.services', [])
        .factory('amadeusService', ['$http', '$q', function ($http, $q) {
                function getSearchUrl(data) {
                    var host = 'https://www-amer.epower.amadeus.com/';
                    var client = 'cruceroturismo/#';

                    var params = [
                        'AdtCount=' + data.adults,
                        'Method=Search',
                        'Child=' + data.childs,
                        'Infant=' + data.infants,
                        'DepartureDate=' + (data.startDate.getMonth() + 1) + '/' + data.startDate.getDate() + '/' + data.startDate.getFullYear(),
                        'ReturnDate=' + (data.endDate.getMonth() + 1) + '/' + data.endDate.getDate() + '/' + data.endDate.getFullYear(),
                        'From=' + data.from,
                        'To=' + data.to
                    ];


                    return host + client + params.join('&');
                }

                return {
                    getSearchUrl: getSearchUrl,
                };

                }])

})();