app.factory('RoomRESTClient', function ($resource) {
     return $resource('api/room/:id', {id: '@id',room: '@room'}, {
          'query': {method: 'GET', isArray: false },
          'update' : {method: 'PUT', params:{room : '@room'}, isArray: false},
          'delete' : {method: 'DELETE', params:{id:'@id'}, isArray: false}
     });
});