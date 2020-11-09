app.controller('ScheduleFormController', function ($scope, $stateParams, ScheduleService) {
    $scope.schedule = {};
    $scope.stateParams = $stateParams;

    $scope.getScheduleModel = function(){
        var schedule = {
            name:$scope.schedule.name,
            from:$scope.schedule.from,
            to:$scope.schedule.to,
            except_date_time_csv:$scope.schedule.except_date_time_csv,
            sun:$scope.schedule.sun,
            mon:$scope.schedule.mon,
            tue:$scope.schedule.tue,
            wed:$scope.schedule.wed,
            thu:$scope.schedule.thu,
            fri:$scope.schedule.fri,
            sat:$scope.schedule.sun,
        }

        if($scope.schedule.id){
            schedule['id'] = $scope.schedule.id;
        }
        return schedule;
    }


    $scope.createSchedule = function () {
        ScheduleService.post($scope.getScheduleModel()).then(function(response){
            alert('Schedule successfully added in the system.'+'\n'+'Check console.log for response.');
        });
    }


    // EDIT Section //
    $scope.loadScheduleForEdit = function () {
        ScheduleService.get({id:$scope.stateParams.id}).then(function(response){
            $scope.schedule = response.data;
        });
    }

    $scope.editState = false;
    if($scope.stateParams.actionParams.action === 'edit'){
        $scope.editState = true;
        $scope.loadScheduleForEdit();
    }

    $scope.edits = function(){
        ScheduleService.update($scope.getScheduleModel()).then(function (response) {
            alert('Schedule Updated.');
        });
    }
});



app.controller('ScheduleListCardsController', function ($scope, ScheduleService) {

    $scope.schedules;

    $scope.gridOptions = { data: 'schedules',
        columnDefs:
            [
                {field: 'name', displayName: 'Name', width: 180  },
                {field: 'from', displayName: 'From', width: 200 },
                {field: 'to', displayName: 'To', width: 200 },
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        selectionRowHeaderWidth: 35,
    };

    $scope.loadAll = function(){
        ScheduleService.all().then(function(response) {
            $scope.schedules = response.data;
        });
    }

    $scope.deleteSchedule = function (id) {
        ScheduleService.delete(id).then(function(response) {
            $scope.loadAll();
        });
    }


    $scope.loadAll();

});








//
// app.controller('UserProfileController', function ($scope, $stateParams, UserService) {
//     $scope.stateParams = $stateParams;
//
//     $scope.loadUser = function () {
//         UserService.get({id:$scope.stateParams.id}).then(function(response) {
//             $scope.user = response.data;
//         });
//     }
//
//     $scope.gridOptions = { data: 'user.attendanceRecords',
//         columnDefs:
//             [{field: 'createdAtNp', displayName: 'Date', width: 150},
//                 {field: 'in_or_out', displayName: 'Present / Absent', width: 300  },
//                 {field: 'comment', displayName: 'Comment', width: 300  },
//             ],
//         enableRowSelection: true,
//         enableSelectAll: true,
//         selectionRowHeaderWidth: 35,
//     };
//
//     $scope.loadUser();
//
// });