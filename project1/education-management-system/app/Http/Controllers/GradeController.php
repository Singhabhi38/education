<?php

namespace App\Http\Controllers;

use App\Product\ProductTrait\Request\RequestContainsCustomParameters;
use App\Product\Service\GradeService;
use Illuminate\Http\Request;
use App\Product\ProductTrait\Request\RequestContainsIds;

class GradeController extends Controller
{
    use RequestContainsIds;
    use RequestContainsCustomParameters;

    private $gradeService;
    private $ASSIGN_GRADE_TO_USER_ACTION_STR = 'assignGradeToUser';

    public function __construct(GradeService $gradeService){
        $this->gradeService = $gradeService;

        //
        $this->middleware('simpleCustomGETPOSTCache');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, GradeService $gradeService )
    {
        $_ids = $this->getValidIds($request);
        if(!empty($_ids)){
            return $this->gradeService->findByIds($request,$_ids);
        }
        //Returning All Users
        return $this->gradeService->findAll($request);
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
        if($this->requestHasCustomParameters($request)){
            if($this->getActionFromCustomParameters($request) == $this->ASSIGN_GRADE_TO_USER_ACTION_STR){
                return $this->gradeService->assignGradeToUser($request);
            }
        }
        return $this->gradeService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return $this->gradeService->findById($request,$id);
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
        return $this->gradeService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        return $this->gradeService->deleteById($request,$id);
    }
}
