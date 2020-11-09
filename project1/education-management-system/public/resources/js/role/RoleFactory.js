/**
 * Created by sadhikari on 8/19/2016.
 */
app.factory('RoleRESTClient', function ($resource) {
    return $resource('api/role/:id', {id: '@id',grade: '@role'}, {
        'query': {method: 'GET', isArray: false },
        'update' : {method: 'PUT', params:{grade : '@role'}, isArray: false},
        'delete' : {method: 'DELETE', params:{id:'@id'}, isArray: false}
    });
});