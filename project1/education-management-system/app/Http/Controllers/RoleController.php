<?php

namespace App\Http\Controllers;

use App\Product\ProductTrait\Request\RequestContainsCustomParameters;
use App\Product\ProductTrait\Request\RequestContainsIds;
use App\Product\Service\RoleService;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    use RequestContainsIds;
    use RequestContainsCustomParameters;
    private $roleService;
    private $ASSIGN_ROLE_TO_USER_ACTION_STR = 'assignRoleToUser';

    public function __construct(RoleService $rService){
        $this->roleService = $rService;

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
            return $this->roleService->findByIds($request,$_ids);
        }

        //Returning All Roles
        return $this->roleService->findAll($request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->requestHasCustomParameters($request)){
            if($this->getActionFromCustomParameters($request) == $this->ASSIGN_ROLE_TO_USER_ACTION_STR){
                return $this->roleService->assignRoleToUser($request);
            }
        }

        return $this->roleService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        return $this->roleService->findById($request,$id);
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
        return $this->roleService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        return $this->roleService->deleteById($request,$id);
//        return $this->roleService->deleteByIds($request,array($id));
    }
}
