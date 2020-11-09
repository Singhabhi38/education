<?php

namespace App\Http\Controllers;
use App\Product\Service\AddressService;
use Illuminate\Http\Request;
use App\Product\ProductTrait\Request\RequestContainsIds;
use App\Http\Requests;

class AddressController extends Controller
{
    use RequestContainsIds;
    private $addressService;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(AddressService $addressService){
        $this->addressService = $addressService;
        //
        $this->middleware('simpleCustomGETPOSTCache');
    }

    public function index(Request $request)
    {
        $_ids = $this->getValidIds($request);
        if(!empty($_ids)){
            return $this->addressService->findByIds($request,$_ids);
        }

        //Returning All Addresses
        return $this->addressService->findAll($request);
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
        return $this->addressService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        return $this->addressService->findById($request,$id);
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
        return $this->addressService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        return $this->addressService->deleteById($request,$id);
//        return $this->userService->deleteByIds($request,array($id));
    }
}
