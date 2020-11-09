<?php
namespace App\Product\DAO;

use App\RoomModel;
use App\Product\DAOUtil\RoomDTOTransformer;
use App\Product\Response\ResponseGenerator;


Class RoomDAO implements IRoomDAO{

    private $entityDTOTransformer;

    public function __construct(){
        $this->entityDTOTransformer = new RoomDTOTransformer();

    }

    public function findAll($columns){
        $rooms = RoomModel::all();

        $result = array();
        foreach($rooms as $room){
            array_push($result,$this->entityDTOTransformer->formatDataFromDb($room));
        }
        return $result;
    }

    public function findById($id,$columns){
        $room = RoomModel::findOrFail($id);
        $room = $this->entityDTOTransformer->formatDataToDb($room);
        return $room;
    }

    public function findByIds($roomIDs,$columns){
        $rooms = RoomModel::whereIn('id',$roomIDs)->get();
        $result = array();
        foreach($rooms as $room){
            $result[] = $this->entityDTOTransformer->formatDataFromDb($room);
        }
        return $result;
    }

    public function create($room){
        $result = $this->entityDTOTransformer->formatDataToDb($room);
        unset($result->id);
        $insertedRoomModel = RoomModel::create($result);
        return $this->entityDTOTransformer
            ->formatDataFromDb(
                $insertedRoomModel
            );
    }

    public function update($room){
        $transformedRoomEntity = $this->entityDTOTransformer->formatDataToDb($room);
        RoomModel::where('id','=',$room['id'])
            ->update($transformedRoomEntity);
        return $this->entityDTOTransformer->formatDataFromDb($transformedRoomEntity);

    }

    public function deleteById($id){
        $room = RoomModel::where('id','=',$id)->delete();
        if($room == null){
            throw new DAOException("Error deleting a Room!");
        }
        return null;

    }

    public function deleteByIds($ids)
    {
        $rooms = RoomModel::whereIn('id',$ids)->delete();
        if($rooms == null){
            throw new DAOException("Error deleting all Rooms!");
        }
        return null;
    }


}