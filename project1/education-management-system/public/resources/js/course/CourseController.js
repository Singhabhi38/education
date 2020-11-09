(function () {
    app.controller('CourseFormController', function ($scope,$stateParams,CourseService, GradeService, $element) {

        $scope.stateParams = $stateParams;
        $scope.course = {};
        $scope.course.name;
        $scope.course.class_id;
        $scope.course.grade_id;
        $scope.course.practical;
        $scope.course.practical_marks;
        $scope.course.theory_marks;
        $scope.course.theory;

        $scope.loadAllGrades = function () {
            GradeService.all().then(function(response){
                $scope.grades = response.data;
                console.log($scope.grades);
            });
        }

        $scope.loadCourse = function () {
            $scope.course = CourseService.get({id:$scope.params.id});
        }

        $scope.createCourse = function () {
            CourseService.post($scope.getCourseModel()).then(function(response){
                alert('Course successfully added in the system.'+'\n'+'Check console.log for response.');
            });
        }

        $scope.getCourseModel = function(){
            var course = {
                roomId:$scope.course.roomId,
                gradeId:$scope.course.gradeId,
                name:$scope.course.name,
                practical:$scope.course.practical,
                theory_marks:$scope.course.theory_marks,
                practical_marks:$scope.course.practical_marks,
                theory:$scope.course.theory,
            }

            if($scope.course.id){
                course['id'] = $scope.course.id;
            }
            return course;
        }

        $scope.loadCourseForEdit = function () {
            CourseService.get({id:$scope.stateParams.id}).then(function(response){
                $scope.course = response.data;
            });
        }

        $scope.editState = false;
        if($scope.stateParams.actionParams.action === 'edit'){
            $scope.editState = true;
            $scope.loadCourseForEdit();
        }

        $scope.edit = function(){
            CourseService.update($scope.getCourseModel()).then(function (response) {
                alert('Course Updated.');
            });
        }

        //###########INITIALIZATION//
        $scope.init = function(){
            $scope.loadAllGrades();
        }
        $scope.init();
    });
})();



app.controller('CourseListCardsController', function ($scope, $interval , CourseService, FilterService) {

 $scope.courses;

    $scope.gridOptions = { data: 'courses',
        columnDefs:
            [{field: 'id', displayName: 'ID', width: 50 },
                {field: 'name', displayName: 'Name'  },
                {field: 'roomId', displayName: 'Room id'  },
                {field: 'gradeId', displayName: 'Grade id'  },
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        enableSorting: false,
        selectionRowHeaderWidth: 35,
        enableHorizontalScrollbar: 1,
        enableColumnResizing: true,

    };

    $scope.loadAll = function(){
        CourseService.all().then(function(response) {
            $scope.courses = response.data;
        });
    }

    $scope.deleteCourse = function (id) {
        alert('Do you want to delete the course?');
        CourseService.delete(id).then(function(response) {
            $scope.loadAll();
        });
    }


    $scope.loadAll();
});

app.controller('CourseUserFormController', function ($scope, $stateParams, CourseService, UserService, $state) {
    $scope.courses = {};
    $scope.user;
    $scope.courseUser = {};
    $scope.stateParams = $stateParams;

    $scope.loadUser = function(id){
        UserService.get(id).then(function(response){
            $scope.user = response.data;
        });
    };

    $scope.loadAllCourse = function(){
        CourseService.all().then(function(response){
           $scope.courses = response.data
        });
    }

    $scope.getCourseUserModel = function(){
        var courseUser = {
            userId:$scope.user.id,
            courseId: $scope.courseUser.courseId,
        }
        return courseUser;
    }

    $scope.assignCourseToUser = function () {
        console.log($scope.getCourseUserModel());
        CourseService.assignCourseToUser($scope.getCourseUserModel()).then(function(response){
            alert('Successfully added in the system.'+'\n'+'Check console.log for response.');
        });
    }

    $scope.loadAllCourse();
    $scope.loadUser({id:$scope.stateParams.id});

});


(function () {
app.controller('CourseDetailController', ['$scope', '$stateParams', 'CourseService',
    function CourseDetailController($scope, $stateParams, CourseService) {
        this.stateParams = $stateParams;
        this.course = {};

        this.loadCourses = function() {
            CourseService.get({id: this.stateParams.id}).then(function (response) {
                $scope.course = response.data;
            });
        }

        this.loadCourses();
    }]);
})();