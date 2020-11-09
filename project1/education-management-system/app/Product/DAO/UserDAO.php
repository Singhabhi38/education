<?php
namespace App\Product\DAO;

use App\Events\UserCreated;
use App\Log\LogUtil;
use App\Product\DAOUtil\GradeDTOTransformer;
use App\Product\DAOUtil\RoleDTOTransformer;
use App\Product\DAOUtil\CourseDTOTransformer;
use App\UserDetailModel;
use App\UserModel;
use App\Product\DAOUtil\UserDTOTransformer;
use App\Product\DAOUtil\UserDetailDTOTransformer;
use App\Product\DAOUtil\AttendanceDTOTransformer;
use App\Product\Response\ResponseGenerator;
use App\Product\Exception\DAOException;

Class UserDAO extends BaseDAO implements IUserDAO{

    private $LOGGER ;

    //CONSTANTS
    private $COURSES_STR = 'courses';
    private $ROLES_STR = 'roles';
    private $GRADES_STR = 'grades';
    private $USER_DETAIL_STR = 'userDetail';
    private $ATTENDANCE_RECORDS_STR = 'attendanceRecords';

    private $userDTOTransformer;
    private $userDetailDTOTransformer;
    private $attendanceDTOTransformer;
    private $gradeDTOTransformer;
    private $roleDTOTransformer;
    private $courseDTOTransformer;

    public function __construct(){
        $this->userDTOTransformer = new UserDTOTransformer();
        $this->userDetailDTOTransformer = new UserDetailDTOTransformer();
        $this->attendanceDTOTransformer = new AttendanceDTOTransformer();
        $this->gradeDTOTransformer = new GradeDTOTransformer();
        $this->roleDTOTransformer = new RoleDTOTransformer();
        $this->courseDTOTransformer = new CourseDTOTransformer();
        // Logger Initialization
        $this->LOGGER = LogUtil::getLoggerInstance(UserDAO::class);
    }

    public function findAll($columns){
        /*
         * When client/frontend asks for all the Users' record just attach UserDetail Associated with the individual user
         * No need to send extra entities like Grades of the user, Attendance of the user as it will cause heavy load on Server/DB/Cache
         */
        $this->LOGGER->info('Finding all users.');
        $users = UserModel::with('userDetail')
                        ->where('id','<','26')->get(); // Limiting to 50 until we have Pagination implemented

        if($users != null){
            $result = array();
            foreach($users as $key => $user){
                $result[$key] = $this->userDTOTransformer->formatDataFromDb($user);
                // Attaching Related entities
                $attachedEntities = $this->attachRelatedEntitiesByFormatting($user);
                $result[$key][$this->USER_DETAIL_STR] = $attachedEntities[$this->USER_DETAIL_STR];
            }
        }else{
            throw new DAOException("Error fetching all Users!");
        }

        return $result;
    }

    public function findById($id,$columns){
        $this->LOGGER->info('Finding User : '.$id);
        $user = UserModel::with('userDetail')
                            ->with('attendanceRecords')
                            ->with('grades')
                            ->with('roles')
                            ->with('courses')
                            ->find($id);
        $userFromDB = $user;
        $attachedEntities = $this->attachRelatedEntitiesByFormatting($user);
        if($user != null){
            $user = $this->userDTOTransformer->formatDataFromDb($user);
            $user[$this->USER_DETAIL_STR] = $attachedEntities[$this->USER_DETAIL_STR];
            $user[$this->GRADES_STR] = $attachedEntities[$this->GRADES_STR];
            $user[$this->ROLES_STR] = $attachedEntities[$this->ROLES_STR];
            $user[$this->COURSES_STR] = $attachedEntities[$this->COURSES_STR];
            $user[$this->ATTENDANCE_RECORDS_STR] = $attachedEntities[$this->ATTENDANCE_RECORDS_STR];
        }else{
            throw new DAOException("Error fetching User with id:".$id." !");
        }
        return $user;
    }

    public function findByIds($ids,$columns){
        $this->LOGGER->info('Finding Users : '.json_encode($ids));
        $users = UserModel::whereIn('id',$ids)->get();
        if($users != null){
            $result = array();
            foreach($users as $key => $user){
                $result[$key] = $this->userDTOTransformer->formatDataFromDb($user);
                $attachedEntities = $this->attachRelatedEntitiesByFormatting($user);
                $result[$key][$this->USER_DETAIL_STR] = $attachedEntities[$this->USER_DETAIL_STR];
            }
        }else{
            throw new DAOException("Error fetching all Users!");
        }
        return $result;
    }

    public function create($user){
        $this->LOGGER->info('Creating a new user');
        $userInput = $user;
        $user['emailVerificationCode'] = mt_rand(100000, 999999); // Adding Random 6 digit Number
        $this->assignUpdatedAtToCurrentDate($user);
        $this->assignCreatedAtToCurrentDate($user);
        $transformedUser = $this->userDTOTransformer->formatDataToDb($user);
        unset($transformedUser->id); // As we are inserting new record we need to remove any ID that may have come from front end
        $this->LOGGER->info('Creating User with Input to DB : '.json_encode($transformedUser));
        $insertedUserModel = UserModel::create($transformedUser); // Actually create User Record Here

        // Insert UserDetail for the Above User
        $userDetail = array();
        $userDetail['userId'] = $insertedUserModel->id;
        $userDetail['firstName'] = $userInput['firstName'];
        $userDetail['lastName'] = $userInput['lastName'];
        $transformedUserDetail = $this->userDetailDTOTransformer->formatDataToDb($userDetail);
        unset($transformedUserDetail->id); // As we are inserting new record we need to remove any ID that may have come from front end
        $this->LOGGER->info('Creating UserDetail with Input to DB : '.json_encode($transformedUserDetail).' for User : '.$insertedUserModel['id'] );
        $insertedUserDetailModel = UserDetailModel::create($transformedUserDetail); // Actually create UserDetail Record Here

        // Fire Event for Creating User
        $insertedUserModel = $this->findById($insertedUserModel->id,array());
        event(new UserCreated($insertedUserModel));

        // Return new created User Entity to front end
        return $insertedUserModel;
    }

    /*
     * Updating Single User
     */
    public function update($user){
        $user = $this->assignUpdatedAtToCurrentDate($user);
        $transformedUserEntity = $this->userDTOTransformer->formatDataToDb($user);
        UserModel::where('id','=',$user['id'])
                  ->update($transformedUserEntity);
        return $this->userDTOTransformer->formatDataFromDb($transformedUserEntity);
    }

    /*
     * Deleting Single User
     */
    public function deleteById($id){
        $this->LOGGER->info('Deleting User '.$id);
        $user = UserModel::where($this,'id','=',$id)->delete();
        if($user == null){
            throw new DAOException("Error deleting user with given IDs!");
        }
        return null;
    }

    /*
     * Deleting Multiple Users
     */
    public function deleteByIds($ids){
        $users = UserModel::whereIn('id',$ids)->delete();
        if($users == null){
            throw new DAOException("Error deleting users with given IDs!");
        }
        return null;
    }

    /*
     * ###########################################################################################################
     * ############Entity Relation Code###########################################################################
     * ###########################################################################################################
     * We need this special function to attach Formatted Entities Related to a particular entity(User)
     */
    public function attachRelatedEntitiesByFormatting($user){
        $result = array();
        // Attaching UserDetail If available
        $userDetail = $user->userDetail()->get();
        if(null != $userDetail && !empty($userDetail)){
            foreach($userDetail as $usrDetail){
                // Formatting for UserDetail associated with the user done here
                $result[$this->USER_DETAIL_STR] = $this->userDetailDTOTransformer->formatDataFromDb($usrDetail);
            }
        }

        // Attaching Grades if available
        $userGrades = $user->grades()->get();
        if(null != $userGrades && !empty($userGrades)){
            $result[$this->GRADES_STR] = array();
            foreach($userGrades as $userGrade){
                // Formatting for Grade associated with the user done here
                $result[$this->GRADES_STR][] = $this->gradeDTOTransformer->formatDataFromDb($userGrade);
            }
        }

        $userCourses = $user->courses()->get();
        if(null != $userCourses && !empty($userCourses)){
            $result[$this->COURSES_STR] = array();
            foreach($userCourses as $userCourse){
                // Formatting for Course associated with the user done here
                $result[$this->COURSES_STR][] = $this->courseDTOTransformer->formatDataFromDb($userCourse);
            }
        }

        $userRoles = $user->roles()->get();
        if(null != $userRoles && !empty($userRoles)) {
            $result[$this->ROLES_STR] = array();
            foreach ($userRoles as $userRole) {
                // Formatting for Role associated with the user done here
                $result[$this->ROLES_STR][] = $this->roleDTOTransformer->formatDataFromDb($userRole);
            }
        }

        $userAttendanceRecords = $user->attendanceRecords()->get();
//        dd($userAttendanceRecords);
        if(null != $userAttendanceRecords && !empty($userAttendanceRecords)){
            $result[$this->ATTENDANCE_RECORDS_STR] = array();
            foreach($userAttendanceRecords as $userAttendanceRecord){
                $result[$this->ATTENDANCE_RECORDS_STR][] = $this->attendanceDTOTransformer->formatDataFromDb($userAttendanceRecord);
            }
        }
        return $result;
    }
}