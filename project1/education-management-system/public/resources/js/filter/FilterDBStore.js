/**
 * Created by sadhikari on 11/5/2016.
 */
(function () {
    app.factory('FilterDBStore', function () {

        var filterStore = {};

        var CURRENT = '%CURRENT-FILTER%';
        var CURRENT_VALUE = '%CURRENT-FILTER-VALUE%';

        return {
            unregister: function(filterId){
                delete filterStore[filterId];
            },

            register: function(filterId){
                filterStore[filterId] = [];
            },

            filter: function(value){
            },

            update: function(filterId, filterValue, filterResult){
                if(filterStore[filterId] === undefined){
                    filterStore[filterId] = {};
                }
                filterStore[filterId][filterValue] = filterResult;
                // filterStore[filterId][CURRENT] = filterResult;
                filterStore[filterId][CURRENT_VALUE] = filterValue;
                console.log(filterStore);
            },

            flush: function(){
            },
        }
    });
})();