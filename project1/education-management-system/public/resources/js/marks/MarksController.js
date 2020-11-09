app.controller('MarksFormController', function ($scope, $stateParams, MarksService) {
    $scope.mark = {};
    $scope.stateParams = $stateParams;

    $scope.getMarksModel = function(){
        var mark = {
            name:$scope.mark.name,
            user_id:$scope.mark.user_id,
            exam_id:$scope.mark.exam_id,
            remarks:$scope.mark.remarks,
        }

        if($scope.mark.id){
            mark['id'] = $scope.mark.id;
        }
        return mark;
    }


    $scope.signUp = function () {
        MarksService.post($scope.getMarksModel()).then(function(response){
            alert('Marks successfully added in the system.'+'\n'+'Check console.log for response.');
        });
    }


    $scope.createMarks = function () {
        MarksService.post($scope.getMarksModel()).then(function(response){
            alert('Marks successfully added in the system.'+'\n'+'Check console.log for response.');
        });
    }


    // EDIT Section //
    $scope.loadMarksForEdit = function () {
        MarksService.get({id:$scope.stateParams.id}).then(function(response){
            $scope.mark = response.data;
        });
    }

    $scope.editState = false;
    if($scope.stateParams.actionParams.action === 'edit'){
        $scope.editState = true;
        $scope.loadMarksForEdit();
    }

    $scope.edit = function(){
        MarksService.update($scope.getMarksModel()).then(function (response) {
            alert('Marks Updated.');
        });
    }
});

app.controller('MarksListCardsController', function ($scope, MarksService) {

    $scope.marks;

    $scope.gridOptions = { data: 'marks',
        columnDefs:
            [{field: 'id', displayName: 'ID', width: 50 },
                {field: 'name', displayName: 'Name'  },
                {field: 'remarks', displayName: 'Remarks'  },
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        enableSorting: false,
        selectionRowHeaderWidth: 35,
        enableHorizontalScrollbar: 1,
        enableColumnResizing: true,

    };

    $scope.loadAll = function(){
        MarksService.all().then(function(response) {
            $scope.marks = response.data;
        });
    }

    $scope.deleteMarks = function (id) {
        MarksService.delete(id).then(function(response) {
            $scope.loadAll();
        });
    }


    $scope.loadAll();

});

app.controller('MarkProfileController', function ($scope, $stateParams, MarksService) {
    $scope.stateParams = $stateParams;
    $scope.mark = {};

    $scope.loadMarks = function () {
        MarksService.get({id:$scope.stateParams.id}).then(function(response) {
            $scope.mark = response.data;
        });
    }
    $scope.loadMarks();
});