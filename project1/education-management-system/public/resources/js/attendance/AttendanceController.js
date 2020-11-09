(function () {
    app.controller('AttendanceController', ['$scope', '$stateParams', 'AttendanceService',
        function AttendanceController($scope, $stateParams, AttendanceService) {

        }]);
})();



app.controller('AttendanceListCardsController', function ($scope, AttendanceService) {

    $scope.attendances;

    $scope.gridOptions = { data: 'attendances',
        columnDefs:
            [{field: 'id', displayName: 'ID', width: 50 },
                {field: 'userId', displayName: 'User ID', width: 150  },
                {field: 'in_or_out', displayName: 'Status', width: 150  },
                 {field: 'comment', displayName: 'Comment', width: 150  }
            ],
        enableRowSelection: true,
        enableSelectAll: true,
        selectionRowHeaderWidth: 35,
    };

    $scope.loadAll = function(){
        AttendanceService.all().then(function(response) {
            $scope.attendances = response.data;
        });
    }

    $scope.loadAll();

});