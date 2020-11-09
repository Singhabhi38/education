var AddressService = app.service('AddressService', function (AddressRESTClient) {
    return {
        get: function(id) {
            return AddressRESTClient.get({id:id.id}).$promise;
        },

        post: function(address){
            return AddressRESTClient.save(address).$promise;
        },

        delete: function(id){
            return AddressRESTClient.delete({id:id}).$promise;
        },

        all: function(){
            return AddressRESTClient.query().$promise;
        },

        update: function(address){
            return AddressRESTClient.update(address).$promise;
        }
    }
});