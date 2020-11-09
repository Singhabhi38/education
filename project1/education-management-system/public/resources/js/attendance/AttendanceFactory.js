/**
 * Created by SUDIP CHAND on 2016-08-30.
 */

app.factory('AttendanceRESTClient', function ($resource) {
    return $resource('api/attendance/:id', {id: '@id'}, {
        'query': {method: 'GET', isArray: false }
    });
});