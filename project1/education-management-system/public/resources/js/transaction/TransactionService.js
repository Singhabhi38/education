/**
 * Created by Krishna on 10/2/2016.
 */
var TransactionService = app.service('TransactionService', function (TransactionRESTClient) {
    return {
        get: function(id) {
            return TransactionRESTClient.get({id:id.id}).$promise;
        },

        post: function(transaction){
            return TransactionRESTClient.save(transaction).$promise;
        },

        delete: function(id){
            return TransactionRESTClient.delete({id:id}).$promise;
        },

        all: function(){
            return TransactionRESTClient.query().$promise;
        },

        update: function(transaction){
            return TransactionRESTClient.update(transaction).$promise;
        }
    }
});