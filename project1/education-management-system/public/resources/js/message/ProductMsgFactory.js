app.factory('ProductMsgRESTClient', function ($resource) {
    return $resource('api/message/:id', {id: '@id',message: '@message'}, {
        'query': {method: 'GET', isArray: false },
        'update' : {method: 'PUT', params:{message : '@message'}, isArray: false},
        'delete' : {method: 'DELETE', params:{id:'@id'}, isArray: false}
    });
});