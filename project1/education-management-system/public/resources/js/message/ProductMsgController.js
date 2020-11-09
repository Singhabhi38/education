app.controller('MessageFormController', function ($scope, $stateParams, ProductMsgService, UserService) {

    $scope.message = {};
    $scope.users = {};
    // $scope.message.subject;
    // $scope.message.message;
    // $scope.message.recipients;
    $scope.stateParams = $stateParams;

    $scope.createMessage = function(){
        ProductMsgService.post($scope.getMessageModel()).then(function(response){
            alert("Message Created. Check console.log for returned object.");
            console.log(response.data);
        });
    }

    $scope.loadAllUsers = function() {
        UserService.all().then(function(response){
           $scope.users = response.data
        });

    }

    $scope.getMessageModel = function(){
        var message = {
            subject:$scope.message.subject,
            message:$scope.message.message,
            recipients:$scope.message.recipients,
        }

        if($scope.message.id){
            message['id'] = $scope.message.id;
        }
        return message;
    }

    $scope.loadAllUsers();

});

app.controller('MessageListCardsController', function ($scope, ProductMsgService) {

    $scope.messages = {};


    $scope.loadAll = function(){
        ProductMsgService.all().then(function(response) {
            $scope.messages = response.data;
            $scope.message.currentUserId = response.data.currentUserId;

        });
    }


    $scope.loadAll();

});

app.controller('MessageProfileController', function ($scope, $stateParams, ProductMsgService) {
    $scope.stateParams = $stateParams;
    $scope.message = {};

    $scope.loadMessages = function () {
        ProductMsgService.get({id:$scope.stateParams.id}).then(function(response) {
            $scope.message = response.data;
        });
    }
    $scope.loadMessages();
});
