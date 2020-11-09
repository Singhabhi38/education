/**
 * Created by sadhikari on 8/19/2016.
 */

app.controller('RoleFormController', function ($scope, $stateParams, RoleService) {

    $scope.role = {};
    $scope.role.name;
    $scope.role.displayName;
    $scope.role.description;
    $scope.stateParams = $stateParams;

    $scope.createRole = function(){
        RoleService.post($scope.getRoleModel()).then(function(response){
            alert("Role Created. Check console.log for returned object.");
            console.log(response.data);
        });
    }

    $scope.getRoleModel = function(){
        var role = {
            name:$scope.role.name,
            display_name:$scope.role.displayName,
            description:$scope.role.description,
        }

        if($scope.role.id){
            role['id'] = $scope.role.id;
        }
        return role;
    }

    // EDIT Section //
    $scope.loadRoleForEdit = function () {
        RoleService.get({id:$scope.stateParams.id}).then(function(response){
            $scope.role = response.data;
        });
    }

    $scope.editState = false;
    if($scope.stateParams.actionParams.action === 'edit'){
        $scope.editState = true;
        $scope.loadRoleForEdit();
    }

    $scope.edit = function(){
        RoleService.update($scope.getRoleModel()).then(function (response) {
            alert('Role Updated.');
        });
    }

});


app.controller('RoleUserFormController', function ($scope, $stateParams, RoleService, UserService, $state) {
    $scope.roles = {};
    $scope.user;
    $scope.roleUser = {};
    $scope.stateParams = $stateParams;

    $scope.loadUser = function(id){
        UserService.get(id).then(function(response){
            $scope.user = response.data;
        });
    };

    $scope.loadAllRoles = function(){
        RoleService.all().then(function(response){
            $scope.roles = response.data
        });
    }

    $scope.getRoleUserModel = function(){
        var roleUser = {
            userId:$scope.user.id,
            roleId: $scope.roleUser.roleId,
        }
        return roleUser;
    }

    $scope.assignRoleToUser = function () {
        console.log($scope.getRoleUserModel());
        RoleService.assignRoleToUser($scope.getRoleUserModel()).then(function(response){
            alert('Successfully added in the system.'+'\n'+'Check console.log for response.');
        });
    }

    $scope.loadAllRoles();
    $scope.loadUser({id:$scope.stateParams.id});

});

app.controller('RoleListCardsController', function ($scope, RoleService) {

    $scope.roles;

    $scope.gridOptions = { data: 'roles',
        columnDefs:
            [{field: 'id', displayName: 'ID', width: 50 },
                {field: 'name', displayName: 'Name'  },
                {field: 'displayName', displayName: 'Display Name'  },
                {field: 'description', displayName: 'Description'  },
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        enableSorting: false,
        selectionRowHeaderWidth: 35,
        enableHorizontalScrollbar: 1,
        enableColumnResizing: true,

    };

    $scope.loadAll = function(){
        RoleService.all().then(function(response) {
            $scope.roles = response.data;
        });
    }

    $scope.deleteRole = function (id) {
        //confirm deletion from user
        // alert("deleting");
        $confirm = confirm("Are you sure to delete?");
        if ($confirm) {
            RoleService.delete(id).then(function(response) {
                $scope.loadAll();
            });

        }

    }

    $scope.loadAll();

});

app.controller('RoleProfileController', function ($scope, $stateParams, RoleService) {
    $scope.stateParams = $stateParams;
    $scope.role = {};

    $scope.loadRoles = function () {
        RoleService.get({id:$scope.stateParams.id}).then(function(response) {
            $scope.role = response.data;
        });
    }
    $scope.loadRoles();
});