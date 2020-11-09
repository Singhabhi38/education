// register the interceptor as a service
app.factory('ProductAuthenticationInterceptor', function($q) {

    var loginURL = 'login';

    return {
        'request': function(config) {
            return config;
        },

        'response': function(response) {
            return response;
        },

        // optional method
        // 'requestError': function(rejection) {
        //     return $q.reject(rejection);
        // },

        // optional method
        'responseError': function(rejection) {
            if(rejection.data === 'Unauthorized.'){
                window.location.href = loginURL;
                return;
            }
            return $q.reject(rejection);
        }
    };
});

app.config(['$httpProvider', function($httpProvider) {
    $httpProvider.interceptors.push('ProductAuthenticationInterceptor');
}]);