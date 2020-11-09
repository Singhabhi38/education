/**
 * Created by sadhikari on 8/14/2016.
 */

app.config(function($stateProvider, $urlRouterProvider) {
    $stateProvider

    // ATTENDANCE
        .state('takeAttendanceOfCourse', {
            url: '/attendance/take/course/{id}',
            views: {
                '': {templateUrl: 'partial/attendance-form'}
            }
        })

        .state('attendanceCreate', {
            url: '/attendance/create',
            views: {
                '': {templateUrl: 'partial/attendance-form'}
            }
        })

        .state('attendanceListCard', {
            url: '/attendance/all',
            views: {
                '': {templateUrl: 'partial/attendance-list-card'}
            }
        })

        // Room
        .state('roomCreate', {
            url: '/room/create',
            params: {
                stateTitle: 'Create Room',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/room-form'}
            }
        })

        .state('roomListCard', {
            url: '/room/all',
            views: {
                '': {templateUrl: 'partial/room-list-card'}
            }
        })

        .state('roomDetail', {
            url: '/room/{id}/detail',
            params: {
                stateTitle: 'Class Detail',
                actionParams: {action:'view-detail'},
            },
            views: {
                '': {templateUrl: 'partial/room-detail'}
            }

        })

        .state('roomEdit', {
            url: '/room/edit/{id}',
            params: {
                stateTitle: 'Edit Room',
                actionParams: {action:'edit'},
            },
            views: {

                '': {
                    templateUrl: 'partial/room-form',
                },
            }
        })

        // Address
        .state('addressCreate', {
            url: '/address/create',
            params: {
                stateTitle: 'Create Address',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/address-form'}
            }
        })

        .state('addressListCard', {
            url: '/address/all',
            views: {
                '': {templateUrl: 'partial/address-list-card'}
            }
        })

        .state('addressDetail', {
            url: '/address/{id}/detail',
            params: {
                stateTitle: 'Class Detail',
                actionParams: {action:'view-detail'},
            },
            views: {
                '': {templateUrl: 'partial/address-detail'}
            }

        })

        .state('addressEdit', {
            url: '/address/edit/{id}',
            params: {
                stateTitle: 'Edit Address',
                actionParams: {action:'edit'},
            },
            views: {

                '': {
                    templateUrl: 'partial/address-form',
                },
            }
        })


        // COURSE
        .state('courseCreate', {
            url: '/course/create',
            params: {
                stateTitle: 'Create Course',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/course-form'}
            }
        })

        .state('courseEdit', {
            url: '/course/edit/{id}',
            params: {
                stateTitle: 'Edit Course',
                actionParams: {action:'edit'},
            },
            views: {
                '': {templateUrl: 'partial/course-form',
                },
            }
        })

        .state('courseListCard', {
            url: '/my/subjects',
            views: {
                '': {templateUrl: 'partial/course-list-card'}
            }
        })

        .state('courseDetail', {
            url: '/course/{id}/detail',
            params: {
                stateTitle: 'Course Detail',
                actionParams: {action:'view-detail'},
            },
            views: {
                '': {templateUrl: 'partial/course-detail'},
                'attendanceForm@courseDetail' : {
                    templateUrl: 'partial/attendance-form',
                },
                'scheduleForm@courseDetail' : {
                    templateUrl: 'partial/schedule-form'
                },
            }
        })

        .state('assignCourseToUser', {
            url: '/assign/user/{id}/course',
            params: {
                stateTitle: 'Assign course to User',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/assign-course-to-user-form'}
            }
        })

        // DASHBOARD / HOME
        .state('dashboard',{
            url:'/my/home',
            views:{
                '': {templateUrl: 'partial/dashboard'}
            }
        })

        // EXAMINATION
        .state('examinationCreate', {
            url: '/examination/create',
            params: {
                stateTitle: 'Create Examination',
                actionParams: {action:'create'},
            },
            templateUrl: 'partial/examination-form'
        })

        .state('examinationListCard', {
            url: '/examination/all',
            views: {
                '': {templateUrl: 'partial/examination-list-card'}
            }
        })

        .state('examinationDetail', {
            url: '/examination/{id}/detail',
            params: {
                stateTitle: 'Class Detail',
                actionParams: {action:'view-detail'},
            },
            views: {
                '': {templateUrl: 'partial/examination-detail'}
            }
        })

        .state('examinationEdit', {
            url: '/examination/edit/{id}',
            params: {
                stateTitle: 'Edit Examination',
                actionParams: {action:'edit'},
            },
            views: {

                '': {templateUrl: 'partial/examination-form',
                },
            }
        })

        // GRADE
        .state('gradeCreate', {
            url: '/grade/create',
            params: {
                stateTitle: 'Create Grade',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/grade-form'}
            }
        })

        .state('assignGradeToUser', {
            url: '/assign/user/{id}/grade-class-level',
            params: {
                stateTitle: 'Assign Grade to User',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/assign-grade-to-user-form'}
            }
        })

        .state('gradeDetail', {
            url: '/grade/{id}/detail',
            params: {
                stateTitle: 'Class Detail',
                actionParams: {action:'view-detail'},
            },
            views: {
                '': {templateUrl: 'partial/grade-detail'}
            }
        })

        .state('gradeListCard', {
            url: '/my/classes',
            views: {
                '': {templateUrl: 'partial/grade-list-card'}
            }
        })

        .state('gradeAssign',{
            url:'/grade/assign',
            views: {
                '': {templateUrl:'partial/grade-user-form'}
            }
        })


        .state('gradeEdit', {
            url: '/grade/edit/{id}',
            params: {
                stateTitle: 'Edit Grade',
                actionParams: {action:'edit'},
                },
            views: {            

                '': {templateUrl: 'partial/grade-form',
                },
            }
        })

        .state('gradeAssigns',{
            url:'/grade/assigns',
            views: {
                '': {templateUrl:'partial/grade-user-forms'}
            }
        })

        // MARKS
        .state('marksCreate', {
            url: '/create',
            params: {
                stateTitle: 'Create',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/marks-form'}
            }
        })

        .state('markDetail', {
            url: '/mark/{id}/detail',
            params: {
                stateTitle: 'Mark Detail',
                actionParams: {action:'view-detail'},
            },
            views: {
                '': {templateUrl: 'partial/mark-detail'}
            }
        })

        .state('marksListCard', {
            url: '/marks/all',
            views: {
                '': {templateUrl: 'partial/marks-list-card'}
            }
        })

        // ROLE
        .state('roleCreate', {
            url: '/role/create',
            params: {
                stateTitle: 'Create Role',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/role-form'}
            }
        })

        .state('roleListCard', {
            url: '/role/all',
            views: {
                '': {templateUrl: 'partial/role-list-card'}
            }
        })

        .state('roleDetail', {
            url: '/role/{id}/detail',
            params: {
                stateTitle: 'Class Detail',
                actionParams: {action:'view-detail'},
            },
            views: {
                '': {templateUrl: 'partial/role-detail'}
            }
        })

        .state('roleEdit', {
            url: '/role/edit/{id}',
            params: {
                stateTitle: 'Edit Role',
                actionParams: {action:'edit'},
            },
            views: {

                '': {templateUrl: 'partial/role-form',
                },
            }
        })

        .state('assignRoleToUser', {
            url: '/assign/role/{id}/roles',
            params: {
                stateTitle: 'Assign Role to User',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/assign-role-to-user-form'}
            }
        })

        // SCHEDULE
        .state('scheduleCreate', {
            url: '/create',
            params: {
                stateTitle: 'create',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/schedule-form'}
            }
        })

        .state('scheduleListCard', {
            url: '/schedule/all',
            views: {
                '': {templateUrl: 'partial/schedule-list-card'}
            }
        })

        .state('scheduleEdit', {
            url: '/schedule/edit/{id}',
            params: {
                stateTitle: 'Edit Schedule',
                actionParams: {action:'edit'},
            },
            views: {
                '': {templateUrl: 'partial/schedule-form',
                },
            }
        })

        // USER
        .state('userCreate', {
            url: '/register',
            params: {
                stateTitle: 'Register',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/user-form'}
            }
        })

        .state('userProfile', {
            url: '/user/{id}/profile',
            params: {
                stateTitle: 'User Profile',
                actionParams: {action:'viewDetail'},
            },
            views: {
                '': {templateUrl: 'partial/user-detail'}
            }
        })

        .state('userListCard', {
            url: '/user/all',
            views: {
                '': {templateUrl: 'partial/user-list-card'}
            }
        })

        .state('userEdit', {
            url: '/user/edit/{id}',
            params: {
                stateTitle: 'Edit User',
                actionParams: {action:'edit'},
            },
            views: {
                '': {templateUrl: 'partial/user-form',
                },
            }
        })

        //Messages
        .state('messageCreate', {
            url: '/message/create',
            params: {
                stateTitle: 'Create Message',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/message-form'}
            }
        })
        .state('messageListCard', {
            url: '/message/all',
            views: {
                '': {templateUrl: 'partial/message-list-card'}
            }
        })
        .state('messageDetail', {
            url: '/message/{id}/detail',
            params: {
                stateTitle: 'Message Detail',
                actionParams: {action:'view-detail'},
            },
            views: {
                '': {templateUrl: 'partial/message-detail'}
            }
        })

        // Transactions
        .state('transactionCreate', {
            url: '/transaction/create',
            params: {
                stateTitle: 'Transaction',
                actionParams: {action:'create'},
            },
            views: {
                '': {templateUrl: 'partial/transaction-form'}
            }
        })

        .state('transactionListCard', {
            url: '/transaction/all',
            views: {
                '': {
                    templateUrl: 'partial/transaction-list-card',
                },
            }
        })

        .state('transactionEdit', {
            url: '/transaction/edit/{id}',
            params: {
                stateTitle: 'Edit Transaction',
                actionParams: {action:'edit'},
            },
            views: {
                '': {templateUrl: 'partial/transaction-form',
                },
            }

        })

    $urlRouterProvider.otherwise('/user/all');

});