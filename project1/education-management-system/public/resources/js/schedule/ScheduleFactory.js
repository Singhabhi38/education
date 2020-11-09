app.factory('ScheduleRESTClient', function ($resource) {
     return $resource('api/schedule/:id', {id: '@id'}, {
          'query': {method: 'GET', isArray: false },
          'update' : {method: 'PUT', params:{schedule : '@schedule'}, isArray: false},
          'delete' : {method: 'DELETE', params:{id:'@id'}, isArray: false}
     });
});