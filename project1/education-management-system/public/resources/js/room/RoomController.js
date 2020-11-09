app.controller('RoomFormController', function ($scope, $stateParams, RoomService) {
    $scope.room = {};
    $scope.stateParams = $stateParams;

    $scope.getRoomModel = function(){
        var room = {
            name:$scope.room.name,
            building:$scope.room.building,
            room:$scope.room.room,
            floor:$scope.room.floor,

        }

        if($scope.room.id){
            room['id'] = $scope.room.id;
        }
        return room;
    }


    $scope.createRoom = function () {

        RoomService.post($scope.getRoomModel()).then(function(response){
            alert('Room successfully added in the system.'+'\n'+'Check console.log for response.');
        });
    }


    // EDIT Section //
    $scope.loadRoomForEdit = function () {
        RoomService.get({id:$scope.stateParams.id}).then(function(response){
            $scope.room = response.data;
        });
    }

    $scope.editState = false;
    if($scope.stateParams.actionParams.action === 'edit'){
        $scope.editState = true;
        $scope.loadRoomForEdit();
    }

    $scope.edit = function(){
        RoomService.update($scope.getRoomModel()).then(function (response) {
            alert('Room Updated.');
        });
    }
});

app.controller('RoomListCardsController', function ($scope, RoomService) {

    $scope.rooms;


    $scope.gridOptions = { data: 'rooms',

        columnDefs:
            [
                {field: 'id', displayName: 'ID', width: 50 },
                {field: 'name', displayName: 'Name', width: 300  },
                {field: 'building', displayName: 'Building ID', width: 150  },
                {field: 'room', displayName: 'Room ID', width: 150  },
                {field: 'floor', displayName: 'Floor ID', width: 150  },
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        selectionRowHeaderWidth: 35,
    };

    $scope.loadAll = function(){
        RoomService.all().then(function(response) {
            $scope.rooms = response.data;
        });
    }

    $scope.deleteRoom = function (id) {
        RoomService.delete(id).then(function(response) {
            $scope.loadAll();
        });
    }


    $scope.loadAll();

});

app.controller('RoomProfileController', function ($scope, $stateParams, RoomService) {
    $scope.stateParams = $stateParams;
    $scope.room = {};

    $scope.loadRooms = function () {
        RoomService.get({id:$scope.stateParams.id}).then(function(response) {
            $scope.room = response.data;
        });
    }
    $scope.loadRooms();
});