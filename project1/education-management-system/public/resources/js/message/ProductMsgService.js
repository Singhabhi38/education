var ProductMsgService = app.service('ProductMsgService', function (ProductMsgRESTClient) {
    return {
        get: function(id) {
            return ProductMsgRESTClient.get({id:id.id}).$promise;
        },

        post: function(message){
            return ProductMsgRESTClient.save(message).$promise;
        },

        delete: function(id){
            return ProductMsgRESTClient.delete({id:id}).$promise;
        },

        all: function(){
            return ProductMsgRESTClient.query().$promise;
        },

        update: function(message){
            return ProductMsgRESTClient.update(message).$promise;
        }
    }
});