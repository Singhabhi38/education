<?php
/**
 * Created by PhpStorm.
 * User: sadhikari
 * Date: 9/11/2016
 * Time: 4:15 PM
 */

namespace App\Product\ClientConfigParser;

class GradesSectionsParser {
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
                            $month,
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
            return $result;
        }
    }

    public function getGradeArray($name,
        $shortName,
        $year,
        $month,
        $semester,
        $section,
        $trimester,
        $month
        ){
        $result = array();
        $result['name'] = $name;
        $result['shortName'] = $shortName;
        $result['year'] = $year;
        $result['semester'] = $semester;
        $result['section'] = $section;
        $result['trimester'] = $trimester; // Not Used Now
        $result['month'] = $month; // Not Used Now
    }

    private function getYearListFromDurationString($durationStr){
        $k = explode('-',$durationStr); // e.g 4Y-8SEM
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

        if($k[1] == '4SEM'){
            return array('First Semester', 'Second Semester');
        }else if($k[1] == '2Y'){
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