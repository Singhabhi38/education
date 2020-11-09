app.factory('UserRESTClient', function ($resource) {
     return $resource('api/user/:id', {id: '@id',user: '@user'}, {
          'query': {method: 'GET', isArray: false },
          'update' : {method: 'PUT', params:{user : '@user'}, isArray: false},
          'delete' : {method: 'DELETE', params:{id:'@id'}, isArray: false}
     });
});