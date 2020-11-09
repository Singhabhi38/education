<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Product Description">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$orgName}}</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="resources/images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="">
    <link rel="apple-touch-icon-precomposed" href="resources/images/ios-desktop.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="resources/images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="shortcut icon" href="resources/images/favicon.png">
    <link rel="stylesheet" href="vendor/angular-material/1_0_7/angular-material-1.0.7.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/main.css">
    <link rel="stylesheet" href="vendor/angular-ui-grid/3_2_1/ui-grid.css">

    <link rel="stylesheet" href="vendor/font-awesome/4_5_0/font-awesome-4.5.0.min.css">



</head>
<body ng-app="app">

<div class="">
    @include('partials.top-menu')
    @include('partials.left-side-bar')
    <main class="">
        <div ui-view></div>
    </main>
</div>

<!-- Angular Components -->
<script src="vendor/angular/1_3_15/angular-1.3.15.min.js"></script>
<script src="vendor/angular-material/1_0_7/angular-material-1.0.7.min.js"></script>
<script src="vendor/angular-aria/1_3_15/angular-aria-1.3.15.min.js"></script>
<script src="vendor/angular-animate/1_3_15/angular-animate-1.3.15.min.js"></script>
<script src="vendor/angular-ui-router/0_3_1/angular-ui-router-0.3.1.min.js"></script>
<script src="vendor/angular-ui-grid/3_2_1/ui-grid.min.js"></script>
<script src="vendor/angular-resource/1_3_15/angular-resource-1.3.15.js"></script>

<!-- Ramda.js functional programming library -->
{{--<script src="vendor/ramda/0_22_1/ramda-0.22.1.min.js"></script>--}}

<!-- Main Entry -->
<script src="resources/js/app.js"></script>
<script src="resources/js/routes.js"></script>

<script src="resources/js/user-userdetail/UserService.js"></script>
<script src="resources/js/user-userdetail/UserFactory.js"></script>
<script src="resources/js/user-userdetail/UserController.js"></script>

<script src="resources/js/grade/GradeService.js"></script>
<script src="resources/js/grade/GradeFactory.js"></script>
<script src="resources/js/grade/GradeController.js"></script>

<script src="resources/js/schedule/ScheduleService.js"></script>
<script src="resources/js/schedule/ScheduleFactory.js"></script>
<script src="resources/js/schedule/ScheduleController.js"></script>


<script src="resources/js/room/RoomService.js"></script>
<script src="resources/js/room/RoomFactory.js"></script>
<script src="resources/js/room/RoomController.js"></script>

<script src="resources/js/course/CourseService.js"></script>
<script src="resources/js/course/CourseFactory.js"></script>
<script src="resources/js/course/CourseController.js"></script>

<script src="resources/js/role/RoleController.js"></script>
<script src="resources/js/role/RoleService.js"></script>
<script src="resources/js/role/RoleFactory.js"></script>

<script src="resources/js/attendance/AttendanceController.js"></script>
<script src="resources/js/attendance/AttendanceService.js"></script>
<script src="resources/js/attendance/AttendanceFactory.js"></script>


<script src="resources/js/marks/MarksController.js"></script>
<script src="resources/js/marks/MarksService.js"></script>
<script src="resources/js/marks/MarksFactory.js"></script>

<script src="resources/js/message/ProductMsgController.js"></script>
<script src="resources/js/message/ProductMsgService.js"></script>
<script src="resources/js/message/ProductMsgFactory.js"></script>

<script src="resources/js/examination/ExaminationController.js"></script>
<script src="resources/js/examination/ExaminationService.js"></script>
<script src="resources/js/examination/ExaminationFactory.js"></script>

<script src="resources/js/address/AddressController.js"></script>
<script src="resources/js/address/AddressService.js"></script>
<script src="resources/js/address/AddressFactory.js"></script>

<script src="resources/js/session/SessionController.js"></script>
<script src="resources/js/session/SessionService.js"></script>

<script src="resources/js/auth/auth.js"></script>

<script src="resources/js/filter/FilterController.js"></script>
<script src="resources/js/filter/FilterService.js"></script>

<script src="resources/js/transaction/TransactionService.js"></script>
<script src="resources/js/transaction/TransactionFactory.js"></script>
<script src="resources/js/transaction/TransactionController.js"></script>



<script src="vendor/jquery/3_1_0/jquery-3.1.0.js"></script>

</body>
</html>