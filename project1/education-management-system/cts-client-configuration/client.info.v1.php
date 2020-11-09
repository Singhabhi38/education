<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 8/28/2016
 * Time: 8:03 PM
 */

return [
    'uniqueClientId' => 'SCHOOL_0001',
    'serverName' => 'CTS-Demo Server _',
    'orgName' => 'Some School Name',
    'schoolOrCollege' => 'school', // 'college'
    'defaultRolesAndPermissions' => array(
                                        'Student' => [],
                                        'Teacher' => ['can-view-any-user'],
                                        'Principal' => ['can-delete-any-user'],
                                        'Vice-Principal' => ['can-edit-any-user'],
                                        'Administrator' => ['can-delete-any-user'],
                                        'Accountant' => ['can-edit-any-user','can-view-financial-data'],
                                        'Class-Teacher' => [],
                                        'Head-of-Department' => [],
                                    ), // ! - Order or value should not be changed - ! //

    'examinationTypes' => array(
        'Quiz',
        'Unit Test',
        'Test',
        'Mid-Term Examination',
        'Open Book Test',
        'Final Examination',
        'Practical Examination',
    ),

    'scheduleTypes' => array(
        'Holiday',
        'Government Holiday',
        'Dashain Holiday',
        'Tihar Holiday',
        'New Year Holiday',
    ),
];