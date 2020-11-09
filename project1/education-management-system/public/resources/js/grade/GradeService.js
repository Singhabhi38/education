var GradeService = app.service('GradeService', function (GradeRESTClient) {

    var customParameters = {'ASSIGN_GRADE_TO_USER' : {'action' : 'assignGradeToUser'},
                            'REMOVE_ALL_GRADES_ASSIGNED_TO_USER' : {'action' : 'removeAllGradeUserData'},
                            };

    return {
        get: function(id) {
            return GradeRESTClient.get({id:id.id}).$promise;
        },

        post: function(grade){
            return GradeRESTClient.save(grade).$promise;
        },

        assignGradeToUser: function(gradeUser){

            gradeUser.customParameters = customParameters['ASSIGN_GRADE_TO_USER'];
            return GradeRESTClient.save(gradeUser).$promise;
        },

        delete: function(id){
            return GradeRESTClient.delete({id:id}).$promise;
        },

        all: function(){
            return GradeRESTClient.query().$promise;
        },

        update: function(grade){
            return GradeRESTClient.update(grade).$promise;
        }
    }
});