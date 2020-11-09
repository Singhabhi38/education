app.controller('ExaminationFormController', function ($scope, $stateParams, ExaminationService) {
    $scope.examination = {};
    // $scope.examination.name;
    // $scope.showFormProgressSpinner = false;
    $scope.stateParams = $stateParams;

    $scope.getExaminationModel = function(){
        var examination = {
            name:$scope.examination.name,
            grade_id:$scope.examination.grade_id,
            course_id:$scope.examination.course_id,
            room_id:$scope.examination.room_id,
        }

        if($scope.examination.id){
            examination['id'] = $scope.examination.id;
        }
        return examination;
    }

    $scope.loadExamination = function () {
        $scope.examination = ExaminationService.get({id:$scope.params.id});
    }

    $scope.createExamination = function () {
        ExaminationService.post($scope.getExaminationModel()).then(function(response){
            alert('Examination successfully added in the system.'+'\n'+'Check console.log for response.');
        });
    }

    // EDIT Section //
    $scope.loadExaminationForEdit = function () {
        ExaminationService.get({id:$scope.stateParams.id}).then(function(response){
            $scope.examination = response.data;
        });
    }

    $scope.editState = false;
    if($scope.stateParams.actionParams.action === 'edit'){
        $scope.editState = true;
        $scope.loadExaminationForEdit();
    }

    $scope.edit = function(){
        ExaminationService.update($scope.getExaminationModel()).then(function (response) {
            alert('Examination Updated.');
        });
    }
});

app.controller('ExaminationListCardsController', function ($scope, ExaminationService) {

    $scope.examinations;


    $scope.gridOptions = { data: 'examinations',

        columnDefs:
            [
             {field: 'id', displayName: 'ID', width: 50 },
             {field: 'name', displayName: 'Name', width: 300  },
                {field: 'grade_id', displayName: 'Grade ID', width: 150  },
                {field: 'course_id', displayName: 'Course ID', width: 150  },
                {field: 'room_id', displayName: 'Room ID', width: 150  },
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        selectionRowHeaderWidth: 35,
    };

    $scope.loadAll = function(){
        ExaminationService.all().then(function(response) {
            $scope.examinations = response.data;
        });
    }

    $scope.deleteExamination = function (id) {
        ExaminationService.delete(id).then(function(response) {
            $scope.loadAll();
        });
    }


    $scope.loadAll();

});

app.controller('ExaminationProfileController', function ($scope, $stateParams, ExaminationService) {
    $scope.stateParams = $stateParams;
    $scope.examination = {};

    $scope.loadExaminations = function () {
        ExaminationService.get({id:$scope.stateParams.id}).then(function(response) {
            $scope.examination = response.data;
        });
    }
    $scope.loadExaminations();
});