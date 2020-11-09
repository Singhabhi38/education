app.controller('UserController', function ($scope, UserService, SessionService) {
    $scope.loadUser = function () {
        UserService.get({id:1}).then(function(response) {
            $scope.user = response.data;
        });
    }
    $scope.loadUser();
});

app.controller('UserFormController', function ($scope, $stateParams, UserService , $state) {
    $scope.user = {};
    $scope.user.userDetail = {};
    $scope.stateParams = $stateParams;
    $scope.showFormProgressSpinner = false;

    $scope.showFormProgress = function(){
        $scope.showFormProgressSpinner = true;
    }

    $scope.hideFormProgress = function(){
        $scope.showFormProgressSpinner = false;
    }

    $scope.getUserModel = function(){
        var user = {
            email:$scope.user.email,
            password:$scope.user.password,
            confirm:$scope.user.confirm,
            firstName:$scope.user.firstName,
            lastName:$scope.user.lastName,
        }

        if($scope.user.id){
            user['id'] = $scope.user.id;
        }
        return user;
    }

    $scope.signUp = function () {
        $scope.showFormProgress();
        UserService.post($scope.getUserModel())
                    .then(
                    function(response){
                        $scope.hideFormProgress();
                        alert('User successfully added in the system.'+'\n'+'Check console.log for response.');
                    },
                    function(){

                    }
                    );
    }

    // EDIT Section //
    $scope.loadUserForEdit = function () {
        UserService.get({id:$scope.stateParams.id}).then(function(response){
            $scope.user = response.data;
        });
    }

    $scope.editState = false;
    if($scope.stateParams.actionParams.action === 'edit'){
        $scope.editState = true;
        $scope.loadUserForEdit();
    }

    $scope.edit = function(){
        UserService.update($scope.getUserModel()).then(function (response) {
            alert('User Updated.');
        });
    }
});


app.controller('UserListCardsController', function ($scope, UserService) {

    $scope.users;

    $scope.gridOptions = { data: 'users',
        columnDefs:
            [{field: 'id', displayName: 'ID', width: 50 },
             {field: 'userDetail.fullName', displayName: 'Name'  },
             {field: 'email', displayName: 'Email' },
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        enableSorting: false,
        selectionRowHeaderWidth: 35,
        enableHorizontalScrollbar: 1,
        enableColumnResizing: true,
    };

    $scope.loadAll = function(){
        UserService.all().then(function(response) {
            $scope.users = response.data;
        });
    }

    $scope.deleteUser = function (id) {
        UserService.delete(id).then(function(response) {
            $scope.loadAll();
        });
    }

    $scope.loadAll();

});


app.controller('UserProfileController', function ($scope, $stateParams, UserService, AttendanceService) {
    $scope.stateParams = $stateParams;
    $scope.user = {};
    $scope.showFormProgressSpinner = false;

    $scope.noOfattendanceRecords = 0;

    $scope.presentOrAbsentStyle = 'md-raised';

    $scope.loadUser = function () {
        $scope.showFormProgress();
        UserService.get({id:$scope.stateParams.id}).then(function(response) {
            $scope.user = response.data;
            $scope.user.courses = response.data.courses;
            $scope.updateAttendanceCount();
            // showing the latest Record
            $scope.user.attendanceRecords.reverse();
            $scope.hideFormProgress();
        });
    }

    $scope.updateAttendanceCount = function(){
        $scope.noOfattendanceRecords = $scope.user.attendanceRecords.length;
    }

    $scope.showFormProgress = function(){
        $scope.showFormProgressSpinner = true;
    }

    $scope.hideFormProgress = function(){
        $scope.showFormProgressSpinner = false;
    }

    $scope.present = function(){
        $scope.showFormProgress();
        AttendanceService.present({userId:$scope.user.id, comment: ''}).then(function(response){
            console.log("Posting present Response : "+response.data);
            $scope.loadUser();
            $scope.hideFormProgress();
        });
    }

    $scope.absent = function(){
        $scope.showFormProgress();
        AttendanceService.absent({userId:$scope.user.id, comment:''})
        .then(function(response){
            console.log("Posting present Response : "+response.data);
            $scope.loadUser();
            $scope.hideFormProgress();
        }
        );
    }


    $scope.gridOptions = { data: 'user.attendanceRecords',
        columnDefs:
            [
             {field: 'in_or_out', displayName: 'Present / Absent', width: 300  },
             {field: 'updatedAtHuman', displayName: 'Time', width: 300},
             {field: 'nepaliDate', displayName: 'Date', width: 300},
             {field: 'comment', displayName: 'Comment', width: 300},
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        selectionRowHeaderWidth: 35,
    };


    $scope.loadUser();
});