<?php

use Illuminate\Database\Seeder;
use App\GradeModel;
use Illuminate\Support\Facades\Config;
use App\Product\ClientConfigParser\GradesSectionsParser;
use App\Product\DAO\GradeDAO;

class GradesTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $gradeDAO;

    public function __construct(GradeDAO $gradeDAO){
        $this->gradeDAO = $gradeDAO;
    }
    public function run(){
        $gradeList = Config::get('client.grades-sections')['gradeList'];
        $sectionList = Config::get('client.grades-sections')['sectionList'];
        $parsedGradeList = $this->getGradeList($gradeList,$sectionList);

        foreach($parsedGradeList as $key =>  $value ) {
//            dd($value);
            $grade=([
                'name' => $value['name'],
                'short_name' => $value['short_name'],
                'section' => $value['section'],
            ]);
            $this->gradeDAO->create($grade);
        }
    }

    /*
   * Parses the file client.grades-sections.v1.php
   */
    public function getGradeList($defaultGradeList, $defaultSectionList ){
        $result = array();
        foreach($defaultGradeList as $gradeName => $gradeDetail){
            if(!is_array($gradeDetail)){
                foreach($defaultSectionList as $sectionKey => $sectionValue){
                    $name = $this->getName($gradeDetail);
                    $shortName = $this->getShortName($gradeDetail);
                    $year = null;
                    $month = null;
                    $semester = null;
                    $section = $sectionValue;
                    $trimester = null;
                    $month = null;
                    array_push($result,
                        $this->getGradeArray(
                            $name,
                            $shortName,
                            $year,
                            $semester,
                            $section,
                            $trimester,
                            $month
                        ));
                }
            }else{
                foreach($gradeDetail as $gradeSuffix => $gradePrefixString){

                }
            }

        }
        return $result;
    }

    public function getGradeArray($name,
                                  $shortName,
                                  $year,
                                  $semester,
                                  $section,
                                  $trimester,
                                  $month
    ){
        $result = array();
        $result['name'] = $name;
        $result['short_name'] = $shortName;
        $result['year'] = $year;
        $result['semester'] = $semester;
        $result['section'] = $section;
        $result['trimester'] = $trimester; // Not Used Now
        $result['month'] = $month; // Not Used Now
        return $result;
    }

    private function getYearListFromDurationString($durationStr){
        $k = preg_split('-',$durationStr); // e.g 4Y-8SEM
        if($k[0] == '1Y'){
            return array(1);
        }else if($k[0] == '2Y'){
            return array(1,2);
        }else if($k[0] == '4Y'){
            return array(1,2,3,4);
        }else if($k[0] == '5Y'){
            return array(1,2,3,4,5);
        }
        return array();
    }

    private function getSemesterListFromDurationString($durationStr){
        $k = explode('-',$durationStr); // e.g 4Y-8SEM

        $yearOneSemester = array('First Semester', 'Second Semester');
        $yearTwoSemester = array('Third Semester', 'Fourth Semester');
        $yearThreeSemester = array('Fifth Semester','Sixth Semester');
        $yearFourSemester = array('Seventh Semester','Eighth Semester');
        $yearFiveSemester = array('Ninth Semester','Tenth Semester');

        if($k[1] == '2SEM'){
            return array('First Semester', 'Second Semester');
        }else if($k[1] == '4SEM'){
            return array(1,2);
        }else if($k[1] == '4Y'){
            return array(1,2,3,4);
        }else if($k[1] == '5Y'){
            return array(1,2,3,4,5);
        }
        return array();
    }

    private function getYearArray($durationStr){

    }

    private function getSemesterArray($durationStr){

    }

    private function getShortName($gradeStr){
        $k = explode('|',$gradeStr);
        return $k[1];
    }

    private function getName($gradeStr){
        $k = explode('|',$gradeStr);
        return $k[0];
    }
}
