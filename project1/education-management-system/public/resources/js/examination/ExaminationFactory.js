app.factory('ExaminationRESTClient', function ($resource) {
     return $resource('api/examination/:id', {id: '@id', examination: '@examination'}, {
          'query': {method: 'GET', isArray: false },
          'update' : {method: 'PUT', params:{examination : '@examination'}, isArray: false},
          'delete' : {method: 'DELETE', params:{id:'@id'}, isArray: false}
     });
});