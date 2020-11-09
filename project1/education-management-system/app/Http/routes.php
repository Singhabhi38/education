<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//----------Login Routes----------//

//    Route::controllers([
//        'auth' => 'Auth\AuthController',
//        'password' => 'Auth\PasswordController',
//    ]);

Route::get('login', function () {
    return view('auth.login');
});

Route::get('password/reset', function () {
    return redirect('login');
});

Route::post('logout', 'LoginController@logout'); // Using our Own logout logic

Route::post('login', 'Auth\AuthController@postLogin', Config::get('client.info'));

//----------Email Confirmation----------//
Route::get('security/emailAddressVerification','SecurityController@verifyEmailAddressAndActivateUser');

//----------Partials----------//
    Route::get('partial/class-form', function () {
        return view('partials.class-form');
    });

    Route::get('partial/course-form', function () {
        return view('partials.course-form');
    });

    Route::get('partial/course-detail', function () {
        return view('partials.course-detail');
    });

    Route::get('partial/assign-course-to-user-form', function () {
        return view('partials.assign-course-to-user-form');
    });

    Route::get('partial/assign-grade-to-user-form', function () {
        return view('partials.assign-grade-to-user-form');
    });

    Route::get('partial/assign-role-to-user-form', function () {
        return view('partials.assign-role-to-user-form');
    });

    Route::get('partial/grade-form', function () {
        return view('partials.grade-form');
    });

    Route::get('partial/schedule-form', function () {
        return view('partials.schedule-form');
    });

    Route::get('partial/user-form', function () {
        return view('partials.user-form');
    });

    Route::get('partial/user-detail', function () {
        return view('partials.user-detail');
    });

    Route::get('partial/grade-list-card', function () {
        return view('partials.grade-list-card');
    });

    Route::get('partial/grade-detail', function () {
        return view('partials.grade-detail');
    });

    Route::get('partial/mark-detail', function () {
        return view('partials.mark-detail');
    });

    Route::get('partial/course-detail', function () {
        return view('partials.course-detail');
    });

    Route::get('partial/user-list-card', function () {
        sleep(1);
        return view('partials.user-list-card');
    });

    Route::get('partial/schedule-list-card', function () {
        return view('partials.schedule-list-card');
    });

    Route::get('partial/examination-list-card', function () {
        return view('partials.examination-list-card');
    });

    Route::get('partial/examination-detail', function () {
        return view('partials.examination-detail');
    });

    Route::get('partial/class-list-card', function () {
        return view('partials.class-list-card');
    });

    Route::get('partial/course-list-card', function () {
        return view('partials.course-list-card');
    });

    Route::get('partial/attendance-list-card', function () {
        return view('partials.attendance-list-card');
    });

    Route::get('partial/marks-list-card', function () {
        return view('partials.marks-list-card');
    });

    Route::get('partial/role-form', function () {
        return view('partials.role-form');
    });

    Route::get('partial/role-list-card', function () {
        return view('partials.role-list-card');
    });

    Route::get('partial/role-detail', function () {
        return view('partials.role-detail');
    });

    Route::get('partial/attendance-form', function () {
        return view('partials.attendance-form');
    });

    Route::get('partial/marks-form', function () {
        return view('partials.marks-form');
    });

    Route::get('partial/login-form', function () {
        return view('partials.login-form');
    });

    Route::get('partial/examination-form', function () {
        return view('partials.examination-form');
    });

    Route::get('partial/room-form', function () {
        return view('partials.room-form');
    });

    Route::get('partial/room-list-card', function () {
    return view('partials.room-list-card');
    });

    Route::get('partial/room-detail', function () {
    return view('partials.room-detail');
    });

    Route::get('partial/address-form', function () {
    return view('partials.address-form');
    });

   Route::get('partial/address-list-card', function () {
    return view('partials.address-list-card');
    });

   Route::get('partial/address-detail', function () {
    return view('partials.address-detail');
    });


    Route::get('partial/dashboard', function () {
        return view('partials.dashboard');
    });

    Route::get('partial/transaction-form', function () {
        return view('partials.transaction-form');
    });

    Route::get('partial/transaction-list-card', function () {
        return view('partials.transaction-list-card');
    });

    Route::get('partial/message-form', function() {
        return view('partials.message-form');
    });

    Route::get('partial/message-list-card', function() {
        return view('partials.message-list-card');
    });

    Route::get('partial/message-detail', function() {
        return view('partials/message-detail');
    });


/*#######################################SECURE-AREA#####################################//
 *#######################################SECURE-AREA#####################################//
 *#######################################Authenticated users#############################//
 */######################################SECURE-AREA#####################################//
Route::group(
    ['middleware' => 'productMiddleware'],
    function() {

            Route::get('ping', function(){
                dd($_SERVER);
            });

            Route::get('/', function () {
                return view('index', Config::get('client.info'));
            });

            //----------Restful Routes----------//
            Route::get('api/filter',"FilterController@filter");//----------Filter----------//

            Route::resource('api/room','RoomController');

            Route::resource('api/address','AddressController');

            Route::resource('api/course','CourseController');

            Route::resource('api/grade','GradeController');

            Route::resource('api/user', 'UserController');

            Route::resource('api/userdetail','UserDetailController');

            Route::resource('api/role','RoleController');

            Route::resource('api/permission','PermissionController');

            Route::resource('api/examination','ExaminationController');

            Route::resource('api/marks','MarksController');

            Route::resource('api/attendance','AttendanceController');

            Route::resource('api/schedule','ScheduleController');

            Route::resource('api/transaction','TransactionController');

            Route::resource('api/address','AddressController');

            Route::resource('api/message', 'ProductMsgController');

});