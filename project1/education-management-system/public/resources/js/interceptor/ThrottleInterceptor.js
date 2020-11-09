// register the interceptor as a service
app.factory('ThrottleInterceptor', function($q, $timeout) {

    return {
        'request': function(config) {
            return config;
            // setTimeout(function(){
            //
            // }, ( Math.random() * 12) );

        },

        'response': function(response) {
            return response;
        },

        // optional method
        // 'requestError': function(rejection) {
        //     return $q.reject(rejection);
        // },

        // optional method
        // 'responseError': function(rejection) {
        // }
    };
});

app.config(['$httpProvider', function($httpProvider) {
    $httpProvider.interceptors.push('ThrottleInterceptor');
}]);