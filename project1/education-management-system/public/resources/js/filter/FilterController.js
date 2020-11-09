/**
 * Created by sadhikari on 9/6/2016.
 */
(function () {
    app.controller('FilterDBStoreController', function ($scope, FilterDBStore) {

        $scope.$on('filterDB:register', function (event, data) {
           FilterDBStore.register(data.filterId);
        });

        $scope.$on('filterDB:unregister', function (event, data) {
            FilterDBStore.unregister(data.filterId);
        });

        $scope.$on('filterDB:add', function (event, data) {
            FilterDBStore.add(data.filterId, filterResult);
        });

        $scope.$on('filter:progress', function (event, data) {
            var broadcastData = {filterId: data.filterId};
            $scope.$broadcast('filter:filterProgress', broadcastData);

        });

        $scope.filterSuccess = function(data){
            console.log(data);
            FilterDBStore.update(data.filterId, data.filterValue ,data.filterResult);
        }

    });
})();
