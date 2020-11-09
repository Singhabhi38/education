<?php

namespace App\Http\Controllers;

use App\Product\ProductTrait\Request\RequestContainsIds;
use App\Product\Service\PermissionService;
use Illuminate\Http\Request;
use App\Http\Requests;

class PermissionController extends Controller
{
    use RequestContainsIds;
    private $permissionService;

    public function __construct(PermissionService $prmService){
        $this->permissionService = $prmService;
        //
        $this->middleware('simpleCustomGETPOSTCache');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $_ids = $this->getValidIds($request);
        if(!empty($_ids)){
            return $this->permissionService->findByIds($request,$_ids);
        }
        return $this->permissionService->findAll($request);
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
        return $this->permissionService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        return $this->permissionService->findById($request,$id);
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
         return $this->permissionService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        return $this->permissionService->deleteById($request,$id);
//        return $this->permissionService->deleteByIds($request,array($id));
    }
}
