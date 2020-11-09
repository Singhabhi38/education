<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product\ProductTrait\Request\RequestContainsCustomParameters;
use App\Product\ProductTrait\Request\RequestContainsIds;
use App\Product\Service\RoomService;

class RoomController extends Controller
{
    use RequestContainsIds;
    use RequestContainsCustomParameters;
    private $roomService;


    public function __construct(RoomService $roomService){
        $this->roomService = $roomService;
        //
        $this->middleware('simpleCustomGETPOSTCache');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        $_ids = $this->getValidIds($request);
        if(!empty($_ids)){
            return $this->roomService->findByIds($request,$_ids);
        }
        return $this->roomService->findAll($request);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        return $this->roomService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request){
        return $this->roomService->findById($request,$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->roomService->update($request,$id);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        return $this->roomService->deleteById($request,$id);
//        return $this->permissionService->deleteByIds($request,array($id));
    }
}