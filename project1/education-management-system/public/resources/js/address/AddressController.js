app.controller('AddressFormController', function ($scope,$stateParams,AddressService) {
    $scope.address = {};
    $scope.stateParams = $stateParams;

    $scope.getAddressModel = function(){
        var address = {
            address:$scope.address.address,
            zone:$scope.address.zone,
            district:$scope.address.district,


        }

        if($scope.address.id){
            address['id'] = $scope.address.id;
        }
        return address;
    }
    $scope.createAddress = function () {
        AddressService.post($scope.getAddressModel()).then(function (response) {
            alert('Address successfully added in the system.'+'\n'+'Check console.log for response.');
        });
    }

    // EDIT Section //
    $scope.loadAddressForEdit = function () {
        AddressService.get({id:$scope.stateParams.id}).then(function(response){
            $scope.address = response.data;
        });
    }

    $scope.editState = false;
    if($scope.stateParams.actionParams.action === 'edit'){
        $scope.editState = true;
        $scope.loadAddressForEdit();
    }

    $scope.edit = function(){
        AddressService.update($scope.getAddressModel()).then(function (response) {
            alert('Address Updated.');
        });
    }
});

app.controller('AddressListCardsController', function ($scope, AddressService) {

    $scope.addresses;


    $scope.gridOptions = { data: 'addresses',
        columnDefs:

            [ {field: 'id', displayName: 'ID', width: 50 },
               {field: 'address', displayName: 'Address'},
                {field: 'zone', displayName: 'Zone'},
                {field: 'district', displayName: 'District'},

            ],
        enableRowSelection: true,
        enableSelectAll: true,
        selectionRowHeaderWidth: 35,
    };

    $scope.loadAll = function(){
        AddressService.all().then(function(response) {
            $scope.addresses = response.data;
        });
    }

    $scope.deleteAddress = function (id) {
        AddressService.delete(id).then(function(response) {
            $scope.loadAll();
        });
    }


    $scope.loadAll();

});

app.controller('AddressProfileController', function ($scope, $stateParams, AddressService) {
    $scope.stateParams = $stateParams;
    $scope.address = {};

    $scope.loadAddresses = function () {
        AddressService.get({id:$scope.stateParams.id}).then(function(response) {
            $scope.address = response.data;
        });
    }
    $scope.loadAddresses();
});