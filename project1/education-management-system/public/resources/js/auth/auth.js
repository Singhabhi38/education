/**
 * Created by sadhikari on 8/28/2016.
 */

app.controller('LoginController', function ($scope, $http) {
    var loginURL = 'login';

    var logoutURL = 'logout';

    $scope.logout = function(){
        $http.post(logoutURL, {}, {})
            .success(function (data, status, headers, config) {
                window.location.href = loginURL;
            })
            .error(function (data, status, header, config) {

            });
    }
});