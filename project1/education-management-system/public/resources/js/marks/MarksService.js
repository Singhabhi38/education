var MarksService = app.service('MarksService', function (MarksRESTClient) {
    return {
        get: function(id) {
            return MarksRESTClient.get({id:id.id}).$promise;
        },

        getEdit:function(id){
            return MarksRESTClient.getEdit({id:id.id})
        },

        post: function(marks){
            return MarksRESTClient.save(marks).$promise;
        },

        all: function(){
            return MarksRESTClient.query().$promise;
        },
        
        delete: function(id){
            return MarksRESTClient.delete({id:id}).$promise;
        },

        edit: function(marks){
            return MarksRESTClient.edit(marks)
        }
    }
});