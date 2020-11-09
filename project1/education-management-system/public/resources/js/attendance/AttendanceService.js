/**
 * Created by SUDIP CHAND on 2016-08-30.
 */

var AttendanceService = app.service('AttendanceService', function (AttendanceRESTClient) {
    return {
        get: function(id) {
            return AttendanceRESTClient.get({id:id.id}).$promise;
        },

        getEdit:function(id){
            return AttendanceRESTClient.getEdit({id:id.id})
        },

        post: function(attendance){
            return AttendanceRESTClient.save(attendance).$promise;
        },

        all: function(){
            return AttendanceRESTClient.query().$promise;
        },

        edit: function(attendance){
            return AttendanceRESTClient.edit(attendance)
        },



        present: function(attendance){
            attendance.in_or_out = 1;
            return this.post(attendance);
        },

        absent: function(attendance){
            attendance.in_or_out = 0;
            return this.post(attendance);
        }


    }
});
