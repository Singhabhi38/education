app.factory('MarksRESTClient', function ($resource) {
    return $resource('api/marks/:id', {id: '@id'}, {
        'query': {method: 'GET', isArray: false }
    });
});