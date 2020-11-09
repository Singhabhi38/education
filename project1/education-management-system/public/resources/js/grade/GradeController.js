app.controller('GradeController', function ($scope, GradeService, SessionService) {
    $scope.loadGrade = function () {
        GradeService.get({id:1}).then(function(response) {
            $scope.grade = response.data;
        });
    }
    $scope.loadGrade();
});

app.controller('GradeFormController', function ($scope, $stateParams, GradeService) {
    $scope.grade = {};
    $scope.stateParams = $stateParams;

    $scope.getGradeModel = function(){
        var grade = {
            name:$scope.grade.name,
            short_name:$scope.grade.short_name,
            section:$scope.grade.section,
            year:$scope.grade.year,
            semester:$scope.grade.semester,
            trimester:$scope.grade.trimester,
            month:$scope.grade.month,
        }

        if($scope.grade.id){
            grade['id'] = $scope.grade.id;
        }
        return grade;
    }


    $scope.createGrade = function () {
        GradeService.post($scope.getGradeModel()).then(function(response){
            alert('Grade successfully added in the system.'+'\n'+'Check console.log for response.');
        });
    }


    // EDIT Section //
    $scope.loadGradeForEdit = function () {
        GradeService.get({id:$scope.stateParams.id}).then(function(response){
            $scope.grade = response.data;
        });
    }

    $scope.editState = false;
    if($scope.stateParams.actionParams.action === 'edit'){
        $scope.editState = true;
        $scope.loadGradeForEdit();
    }

    $scope.edit = function(){
        GradeService.update($scope.getGradeModel()).then(function (response) {
            alert('Grade Updated.');
        });
    }
});



app.controller('GradeUserFormController', function ($scope, $stateParams,CourseService, GradeService, UserService,FilterService, $state) {
    $scope.grades = {};
    $scope.user;
    $scope.gradeUser = {};
    $scope.stateParams = $stateParams;

    $scope.loadUser = function(id){
        UserService.get(id).then(function(response){
            $scope.user = response.data;
        });
    };

    $scope.loadAllGrades = function(){
        GradeService.all().then(function(response){
           $scope.grades = response.data
        });
    }

    $scope.getGradeUserModel = function(){
        var gradeUser = {
            userId:$scope.user.id,
            gradeId: $scope.gradeUser.gradeId,
        }
        return gradeUser;
    }

    $scope.assignGradeToUser = function () {
        var gradeModel = $scope.getGradeUserModel()
        GradeService.assignGradeToUser(gradeModel).then(function(response){
            alert('Successfully added in the system.'+'\n'+'Check console.log for response.');
            // ;
        });
    }

    $scope.loadAllGrades();
    $scope.loadUser({id:$scope.stateParams.id});

});



app.controller('GradeListCardsController', function ($scope, GradeService) {

    $scope.grades;

    $scope.gridOptions = { data: 'grades',
        columnDefs:
            [{field: 'id', displayName: 'ID', width: 50 },
                {field: 'name', displayName: 'Name'  },
                {field: 'section', displayName: 'Section'  },
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        enableSorting: false,
        selectionRowHeaderWidth: 35,
        enableHorizontalScrollbar: 1,
        enableColumnResizing: true,

    };

    $scope.loadAll = function(){
        GradeService.all().then(function(response) {
            $scope.grades = response.data;
        });
    }

    $scope.deleteGrade = function (id) {
        GradeService.delete(id).then(function(response) {
            $scope.loadAll();
        });
    }

    $scope.loadAll();

});


app.controller('GradeProfileController', function ($scope, $stateParams, GradeService) {
    $scope.stateParams = $stateParams;
    $scope.grade = {};

    $scope.loadGrades = function () {
        GradeService.get({id:$scope.stateParams.id}).then(function(response) {
            $scope.grade = response.data;
        });
    }
    $scope.loadGrades();
});