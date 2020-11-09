var RoomService = app.service('RoomService', function (RoomRESTClient) {
    return {
        get: function(id) {
            return RoomRESTClient.get({id:id.id}).$promise;
        },

        post: function(room){
            return RoomRESTClient.save(room).$promise;
        },

        delete: function(id){
            return RoomRESTClient.delete({id:id}).$promise;
        },

        all: function(){
            return RoomRESTClient.query().$promise;
        },

        update: function(room){
            return RoomRESTClient.update(room).$promise;
        }
    }
});