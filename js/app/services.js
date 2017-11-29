(function () {
    angular.module('amadeus.services', [])
        .factory('amadeusService', ['$http', '$q', function ($http, $q) {
                function getSearchUrl(data) {
                    var host = 'https://www-amer.epower.amadeus.com/';
                    var client = 'cruceroturismo/#';

                    var params = [
                        'AdtCount=' + validateValue(data.adults),
                        'Method=Search',
                        'Child=' + validateValue(data.childs),
                        'Infant=' + validateValue(data.infants),
                        'DepartureDate=' + formatDate(data.startDate, 'm/d/Y'),
                        'ReturnDate=' + formatDate(data.endDate, 'm/d/Y'),
                        'From=' + validateValue(data.from),
                        'To=' + validateValue(data.to)
                    ];


                    return host + client + params.join('&');
                }

                function validateValue(value) {
                    if (value == undefined || value == null) {
                        return "";
                    }

                    return value;
                }

                function formatDate(date, format) {
                    if (date == undefined || date == null) {
                        return "";
                    }

                    if (format == "m/d/Y") {
                        return (date.getDate() < 10 ? "0" + date.getDate() : date.getDate()) + '/' + (date.getMonth() + 1) + '/' + date.getFullYear();
                    }

                    return "";
                }

                return {
                    getSearchUrl: getSearchUrl,
                    validateValue: validateValue,
                    formatDate: formatDate
                };

            }])

})();