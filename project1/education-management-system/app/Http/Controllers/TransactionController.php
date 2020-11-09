<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product\ProductTrait\Request\RequestContainsIds;
use App\Product\Service\TransactionService;
use App\Http\Requests;

class TransactionController extends Controller
{
    use RequestContainsIds;

    private $transactionService;

    public function __construct(TransactionService $transactionService){
         $this->transactionService = $transactionService;
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
            return $this->transactionService->findByIds($request,$_ids);
        }

        //Returning All transactions
        return $this->transactionService->findAll($request);
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
        return $this->transactionService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        return $this->transactionService->findById($request,$id);
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
        return $this->transactionService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        return $this->transactionService->deleteById($request,$id);
    }
}
