app.factory('AddressRESTClient', function ($resource) {
    return $resource('api/address/:id', {id: '@id',address: '@address'}, {
        'query': {method: 'GET', isArray: false },
        'update' : {method: 'PUT', params:{address : '@address'}, isArray: false},
        'delete' : {method: 'DELETE', params:{id:'@id'}, isArray: false}
    });
});