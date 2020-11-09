app.controller('SessionController', function ($scope, SessionService) {

    $scope.isUserLoggedIn = true;
    $scope.isUserLoggedIn = SessionService.ping();

});