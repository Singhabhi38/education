<?php

namespace App\Http\Controllers;

use App\Product\ProductTrait\Request\RequestContainsIds;
use App\Product\Service\UserService;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    use RequestContainsIds;

    private $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;

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
            return $this->userService->findByIds($request,$_ids);
        }

        //Returning All Users
        return $this->userService->findAll($request);
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
        return $this->userService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        return $this->userService->findById($request,$id);
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
        return $this->userService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        return $this->userService->deleteById($request,$id);
//        return $this->userService->deleteByIds($request,array($id));
    }
}
