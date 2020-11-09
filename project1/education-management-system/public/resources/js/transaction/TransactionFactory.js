/**
 * Created by Krishna on 10/2/2016.
 */
app.factory('TransactionRESTClient', function ($resource) {
    return $resource('api/transaction/:id', {id: '@id',transaction: '@transaction'}, {
        'query': {method: 'GET', isArray: false },
        'update' : {method: 'PUT', params:{transaction : '@transaction'}, isArray: false},
        'delete' : {method: 'DELETE', params:{id:'@id'}, isArray: false}
    });
});