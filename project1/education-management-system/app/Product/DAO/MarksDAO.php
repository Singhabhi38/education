<?php
namespace App\Product\DAO;

use App\MarksModel;
use App\Product\DAOUtil\MarksDTOTransformer;
use App\Product\Response\ResponseGenerator;
use App\Product\Exception\DAOException;

Class MarksDAO implements IMarksDAO{

    private $marksDTOTransformer;

    public function __construct(){
        $this->marksDTOTransformer = new MarksDTOTransformer();
    }

    public function findAll($columns){
        $marks = MarksModel::where('id','<','51')->get();
        if($marks != null){
            foreach($marks as $mark){
                $result[] = $this->marksDTOTransformer->formatDataFromDb($mark);
            }
        }else{
            throw new DAOException("Error fetching all Marks!");
        }
        return $result;
    }

    public function findById($id,$columns){
        $mark = MarksModel::find($id);
        if($mark != null){
            $mark = $this->marksDTOTransformer->formatDataFromDb($mark);
        }else{
            throw new DAOException("Error fetching Marks with id:".$id." !");
        }
        return $mark;
    }

    public function findByIds($ids,$columns){
        $marks = MarksModel::whereIn('id',$ids)->get();
        if($marks != null){
            foreach($marks as $mark){
                $result[] = $this->marksDTOTransformer->formatDataFromDb($mark);
            }
        }else{
            throw new DAOException("Error fetching all Marks!");
        }
        return $result;
    }

    public function create($mark){
        $result = $this->marksDTOTransformer->formatDataToDb($mark);
        unset($result->id); // As we are inserting new record we need to remove any ID
        $insertedMarkModel = MarksModel::create($result);
        return $this->marksDTOTransformer
            ->formatDataFromDb(
                $insertedMarkModel
            );
    }

    public function update($mark){
        $transformedMarksEntity = $this->marksDTOTransformer->formatDataToDb($mark);
        MarksModel::where('id','=',$mark['id'])
            ->update($transformedMarksEntity);
        return $this->marksDTOTransformer->formatDataFromDb($transformedMarksEntity);
    }


    public function deleteById($id){
        $user = MarksModel::where('id','=',$id)->delete();
        if($user == null){
            throw new DAOException("Error deleting a Marks!");
        }
        return null;
    }

    public function deleteByIds($ids){
        $marks = MarksModel::whereIn('id',$ids)->delete();
        if($marks == null){
            throw new DAOException("Error deleting all Marks!");
        }
        return null;
    }
}