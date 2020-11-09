/**
 * #####################################################################################################################
 * ####################################filterUserByStatus###############################################################
 * #####################################################################################################################
 */
(function () {
    app.directive('filterUserByStatus', function() {
        var filterId = 'filterUserByStatus';

        return {
            restrict: 'EA',

            // transclude: false,

            scope: {
                filterSuccess: '&filterSuccess',
            },

            template:   '<label for="'+filterId+'">Status</label>'+
                        '<select name="'+filterId+'" ng-model="filterValue">' +
                        '<option ng-repeat="filterOption in filterOptions" ng-value="filterOption.status">' +
                        '{{filterOption.status}}' +
                        '</option>' +
                        '</select>',

            link: function(scope, elem, attrs) {
                elem.bind('change', function() {
                    scope.triggerFilter(scope.filterValue);
                });
            },

            controller : ['$scope','FilterService','$timeout', function ($scope, FilterService,$timeout) {
                $scope.loadFilterPickList = function () {
                    FilterService.filterUserByStatus().then(function(response){
                        $scope.filterOptions = response.data.data;
                    });
                };

                $scope.triggerFilter = function(filterValue){
                    FilterService.filterUserByStatus(filterValue).then(function(response){
                        var filterSuccessData = {filterId:filterId,filterValue:$scope.filterValue,filterResult:response.data.data};
                        $scope.filterSuccess(filterSuccessData);
                    });
                }

                // ######### Initialization ######### //
                $scope.init = function(){
                    $scope.loadFilterPickList();
                }
                $scope.init();
            }],
        };
    });

})();

/**
 * #####################################################################################################################
 * ####################################filterUserByCourse###############################################################
 * #####################################################################################################################
 */
(function () {
    app.directive('filterUserByCourse', function() {
        var filterId = 'filterUserByCourse';

        return {
            restrict: 'A',

            transclude: false,

            scope: {
                filterOptions: '=?filterOptions'
            },

            template:   '<label for="'+filterId+'">Course</label>'+
            '<select name="'+filterId+'" ng-model="filterValue">' +
            '<option ng-repeat="filterOption in filterOptions" ng-value="filterOption.id" >' +
            '{{filterOption.id}} : {{filterOption.name}}' +
            '</option>' +
            '</select>',

            link: function(scope, elem, attrs) {
                elem.bind('change', function() {
                    scope.triggerFilter(scope.filterValue);
                });
            },

            controller : ['$scope','FilterService','$timeout', function ($scope, FilterService,$timeout) {
                $scope.loadFilterPickList = function () {
                    FilterService.filterUserByCourse().then(function(response){
                        $scope.filterOptions = response.data.data;
                    });
                };

                $scope.triggerFilter = function(filterValue){
                    $scope.$emit('filter:progress',{filterId:filterId});
                    FilterService.filterUserByCourse(filterValue).then(function(response){
                        var filterSuccessData = {filterId:filterId,filterValue:$scope.filterValue,filterResult:response.data.data};
                        $scope.$emit('filter:success', filterSuccessData);
                    });
                }

                // ######### Initialization ######### //
                $scope.init = function(){
                    $scope.loadFilterPickList();
                }
                $scope.init();
            }],
        };
    });
})();


/**
 * #####################################################################################################################
 * ####################################filterUserByGrade###############################################################
 * #####################################################################################################################
 */
(function () {
    app.directive('filterUserByGrade', function() {
        var filterId = 'filterUserByGrade';

        return {
            restrict: 'A',

            transclude: false,

            scope: {
                filterOptions: '=?filterOptions'
            },

            template:   '<label for="'+filterId+'">Grade</label>'+
            '<select name="'+filterId+'" ng-model="filterValue">' +
            '<option ng-repeat="filterOption in filterOptions" ng-value="filterOption.id" >' +
            '{{filterOption.name}}' +'({{filterOption.short_name}})' + ' {{filterOption.section}}' +
            '</option>' +
            '</select>',

            link: function(scope, elem, attrs) {
                elem.bind('change', function() {
                    scope.triggerFilter(scope.filterValue);
                });
            },

            controller : ['$scope','FilterService','$timeout', function ($scope, FilterService,$timeout) {
                $scope.loadFilterPickList = function () {
                    FilterService.filterUserByGrade().then(function(response){
                        $scope.filterOptions = response.data.data;
                    });
                };

                $scope.triggerFilter = function(filterValue){
                    $scope.$emit('filter:progress',{filterId:filterId});
                    FilterService.filterUserByGrade(filterValue).then(function(response){
                        var filterSuccessData = {filterId:filterId,filterValue:$scope.filterValue,filterResult:response.data.data};
                        $scope.$emit('filter:success', filterSuccessData);
                    });
                }

                // ######### Initialization ######### //
                $scope.init = function(){
                    $scope.loadFilterPickList();
                }
                $scope.init();
            }],
        };
    });
})();

(function () {
    app.directive('filterUserByRole', function() {
        var filterId = 'filterUserByRole';

        return {
            restrict: 'A',

            transclude: false,

            scope: {
                filterOptions: '=?filterOptions'
            },

            template:   '<label for="'+filterId+'">Role</label>'+
            '<select name="'+filterId+'" ng-model="filterValue">' +
            '<option ng-repeat="filterOption in filterOptions" ng-value="filterOption.id" >' +
            '{{filterOption.name}}'  +
            '</option>' +
            '</select>',

            link: function(scope, elem, attrs) {
                elem.bind('change', function() {
                    scope.triggerFilter(scope.filterValue);
                });
            },

            controller : ['$scope','FilterService','$timeout', function ($scope, FilterService,$timeout) {
                $scope.loadFilterPickList = function () {
                    FilterService.filterUserByRole().then(function(response){
                        $scope.filterOptions = response.data.data;
                    });
                };

                $scope.triggerFilter = function(filterValue){
                    $scope.$emit('filter:progress',{filterId:filterId});
                    FilterService.filterUserByRole(filterValue).then(function(response){
                        var filterSuccessData = {filterId:filterId,filterValue:$scope.filterValue,filterResult:response.data.data};
                        $scope.$emit('filter:success', filterSuccessData);
                    });
                }

                // ######### Initialization ######### //
                $scope.init = function(){
                    $scope.loadFilterPickList();
                }
                $scope.init();
            }],
        };
    });
})();

/**
 * #####################################################################################################################
 * ####################################filterAttendanceByUser###############################################################
 * #####################################################################################################################
 */
(function () {
    app.directive('filterAttendanceByUser', function() {
        var filterId = 'filterAttendanceByUser';

        return {
            restrict: 'A',

            transclude: false,

            scope: {
                filterOptions: '=?filterOptions'
            },

            template:   '<label for="'+filterId+'">User</label>'+
            '<select name="'+filterId+'" ng-model="filterValue">' +
            '<option ng-repeat="filterOption in filterOptions" ng-value="filterOption.id" >' +
            '{{filterOption.user_id}}'+
            '</option>' +
            '</select>',

            link: function(scope, elem, attrs) {
                elem.bind('change', function() {
                    scope.triggerFilter(scope.filterValue);
                });
            },

            controller : ['$scope','FilterService','$timeout', function ($scope, FilterService,$timeout) {
                $scope.loadFilterPickList = function () {
                    FilterService.filterAttendanceByUser().then(function(response){
                        $scope.filterOptions = response.data.data;
                    });
                };

                $scope.triggerFilter = function(filterValue){
                    $scope.$emit('filter:progress',{filterId:filterId});
                    FilterService.filterAttendanceByUser(filterValue).then(function(response){
                        var filterSuccessData = {filterId:filterId,filterValue:$scope.filterValue,filterResult:response.data.data};
                        $scope.$emit('filter:success', filterSuccessData);
                    });
                }

                // ######### Initialization ######### //
                $scope.init = function(){
                    $scope.loadFilterPickList();
                }
                $scope.init();
            }],
        };
    });
})();