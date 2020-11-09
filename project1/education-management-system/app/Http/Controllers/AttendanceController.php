<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product\ProductTrait\Request\RequestContainsIds;
use App\Product\Service\AttendanceService;
use App\Http\Requests;

class AttendanceController extends Controller
{
    use RequestContainsIds;
    private $attendanceService;

    public function __construct(AttendanceService $attendanceService){
        $this->attendanceService = $attendanceService;

        //
        $this->middleware('simpleCustomGETPOSTCache');
    }

    public function index(Request $request)
    {
        $_ids = $this->getValidIds($request);
        if(!empty($_ids)){
            
             return $this->attendanceService->deleteByIds($request,$_ids);
        }

        //Returning All Attendances
       
         return $this->attendanceService->findAll($request);
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
    public function store(Request $request)
    {
         return $this->attendanceService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        return $this->attendanceService->findById($request,$id);
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
        return $this->attendanceService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request,$id)
    // {
    //     return $this->attendanceService->deleteById($request,$id);
    //  // return $this->attendanceService->deleteByIds($request,array($id));
    // }
}
