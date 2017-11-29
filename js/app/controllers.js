(function () {
  angular.module('amadeus.controllers', [])
          .controller('ctrlSearchAmadeus', ['$scope', '$window', '$http', function ($scope, $window,$http) {
              var self = this;
              $scope.loading = false;
            }]);
})();