/**
 * Created by sadhikari on 8/20/2016.
 */
var UserService = app.service('SessionService', function ($http) {
    return {
        ping: function(){
            $http.get("session/ping")
                .then(function(response) {
                    console.log(response.data);
                    return response.data;
                }, function(response) {
                    console.log("Something went wrong");
                });
        },
    }
});