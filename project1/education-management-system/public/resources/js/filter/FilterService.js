/**
 * Created by sadhikari on 9/6/2016.
 */


var FilterService = app.service('FilterService', function ($http) {

    var apiURI = 'api/filter';

    return {

        filterUserByStatus: function(value){
            var comparisonOp = "=";
            var filterId = 'filterUserByStatus';

            var params = {id:filterId};

            if(value === undefined){
                params.getFilterPickList = true;
            }else{
                params.params = value;
                params.comparisonOp = comparisonOp;
            }

            return $http
                .get(apiURI,{
                    params:params
                });
        },

        filterUserByCourse: function(value) {
            var comparisonOp = '=';
            var filterId = 'filterUserByCourse';

            var params = {id:filterId};

            if(value === undefined){
                params.getFilterPickList = true;
            }else{
                params.params = value;
                params.comparisonOp = comparisonOp;
            }

            return $http
                .get(apiURI,{
                    params:params
                });
        },

        filterUserByRole: function(value) {
            var comparisonOp = '=';
            var filterId = 'filterUserByRole';

            var params = {id:filterId};

            if(value === undefined){
                params.getFilterPickList = true;
            }else{
                params.params = value;
                params.comparisonOp = comparisonOp;
            }

            return $http
                .get(apiURI,{
                    params:params
                });
        },

        filterUserByGrade: function(value) {
            var comparisonOp = '=';
            var filterId = 'filterUserByGrade';

            var params = {id:filterId};

            if(value === undefined){
                params.getFilterPickList = true;
            }else{
                params.params = value;
                params.comparisonOp = comparisonOp;
            }

            return $http
                .get(apiURI,{
                    params:params
                });
        },

        filterCourseByGrade: function(value) {
            var comparisonOp = '=';
            var filterId = 'filterCourseByGrade';

            var params = {id:filterId};

            if(value === undefined){
                params.getFilterPickList = true;
            }else{
                params.params = value;
                params.comparisonOp = comparisonOp;
            }

            return $http
                .get(apiURI,{
                    params:params
                });
        },

        filterAttendanceByUser: function(value) {
            var comparisonOp = '=';
            var filterId = 'filterAttendanceByUser';

            var params = {id:filterId};

            if(value === undefined){
                params.getFilterPickList = true;
            }else{
                params.params = value;
                params.comparisonOp = comparisonOp;
            }

            return $http
                .get(apiURI,{
                    params:params
                });
        },
    }

});