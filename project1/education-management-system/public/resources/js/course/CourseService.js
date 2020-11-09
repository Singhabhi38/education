var CourseService = app.service('CourseService', function (CourseRESTClient) {

    var customParameters = {'ASSIGN_COURSE_TO_USER' : {'action' : 'assignCourseToUser'},
        'REMOVE_ALL_COURSES_ASSIGNED_TO_USER' : {'action' : 'removeAllCourseUserData'},
    };

    return {
        get: function(id) {
             return CourseRESTClient.get({id:id.id}).$promise;
        },

        getEdit:function(id){
            return CourseRESTClient.getEdit({id:id.id})
        },

        post: function(course){
            return CourseRESTClient.save(course).$promise;
        },

        assignCourseToUser: function(courseUser){

            courseUser.customParameters = customParameters['ASSIGN_COURSE_TO_USER'];
            return CourseRESTClient.save(courseUser).$promise;
        },

        delete: function(id){
            return CourseRESTClient.delete({id:id}).$promise;
        },

        all: function(){
            return CourseRESTClient.query().$promise;
        },

        update: function(course){
            return CourseRESTClient.update(course).$promise;
        }
    }
});