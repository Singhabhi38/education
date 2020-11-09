app.factory('GradeRESTClient', function ($resource) {
    return $resource('api/grade/:id', {id: '@id',grade: '@grade'}, {
        'query': {method: 'GET', isArray: false },
        'update' : {method: 'PUT', params:{grade : '@grade'}, isArray: false},
        'delete' : {method: 'DELETE', params:{id:'@id'}, isArray: false}
    });
});