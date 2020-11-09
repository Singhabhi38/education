(function () {
    app.factory('DisplayErrorInDialogInterceptor', function($q, $mdDialog) {

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
                return $q.reject(rejection);
            }
        };
    });

    app.config(['$httpProvider', function($httpProvider) {
        $httpProvider.interceptors.push('ProductAuthenticationInterceptor');
    }]);

})();