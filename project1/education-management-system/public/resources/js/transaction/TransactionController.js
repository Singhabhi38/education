/**
 * Created by Krishna on 10/2/2016.
 */
app.controller('TransactionFormController', function ($scope, $stateParams, TransactionService, FilterService) {
    var activeStatus = 'ACTIVE';
    $scope.transaction = {};
    $scope.stateParams = $stateParams;
    $scope.userIds;

    $scope.loadAllActiveUsers = function(){
        FilterService.filterUserByStatus(activeStatus).then(function(response){
            $scope.userIds = response.data;
            //console.log($scope.userIds);
        });
    };

    $scope.loadAllActiveUsers();

    $scope.getTransactionModel = function(){
        var transaction = {
            name:$scope.transaction.name,
            type:$scope.transaction.type,
            billNo:$scope.transaction.billNo,
            amount:$scope.transaction.amount,
            remarks:$scope.transaction.remarks,

            // needs to implement dynamic binding
            userId:1,
        }

        if($scope.transaction.id){
            transaction['id'] = $scope.transaction.id;
        }
        return transaction;
    }


    $scope.save = function () {
        console.log($scope.getTransactionModel());
        TransactionService.post($scope.getTransactionModel()).then(function(response){
            alert('Transaction successfully added in the system.'+'\n'+'Check console.log for response.');
            console.log(response);
        });
    }


    // EDIT Section //
    $scope.loadTransactionForEdit = function () {
        TransactionService.get({id:$scope.stateParams.id}).then(function(response){
            $scope.transaction = response.data;
        });
    }

    $scope.editState = false;
    if($scope.stateParams.actionParams.action === 'edit'){
        $scope.editState = true;
        $scope.loadTransactionForEdit();
    }

    $scope.edit = function(){
        TransactionService.update($scope.getTransactionModel()).then(function (response) {
            alert('Transaction Updated.');
        });
    }
});

app.controller('TransactionListCardsController', function ($scope, TransactionService) {

    $scope.transactions;

    $scope.gridOptions = { data: 'transactions',
        columnDefs:
            [{field: 'id', displayName: 'ID', width: 50 },
                {field: 'name', displayName: 'Name', width: 300  }
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        selectionRowHeaderWidth: 35,
    };

    $scope.loadAll = function(){
        TransactionService.all().then(function(response) {
            $scope.transactions = response.data;
        });
    }

    $scope.deleteTransaction = function (id) {
        TransactionService.delete(id).then(function(response) {
            $scope.loadAll();
        });
    }


    $scope.loadAll();

});