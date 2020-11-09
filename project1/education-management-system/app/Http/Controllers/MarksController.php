<?php

namespace App\Http\Controllers;

use App\Product\Service\MarksService;
use Illuminate\Http\Request;
use App\Product\ProductTrait\Request\RequestContainsIds;
use App\Product\Service\UserService;

use App\Http\Requests;

class MarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use RequestContainsIds;

    private $markService;

    public function __construct(MarksService $marksService){
        $this->markService = $marksService;
        //
        $this->middleware('simpleCustomGETPOSTCache');
    }

    public function index(Request $request)
    {
        $_ids = $this->getValidIds($request);
        if(!empty($_ids)){
            return $this->markService->findByIds($request,$_ids);
        }

        //Returning All Users
        return $this->markService->findAll($request);
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
        return $this->markService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return $this->markService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        return $this->markService->deleteById($request,$id);
//        return $this->userService->deleteByIds($request,array($id));
    }
}
