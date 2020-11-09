<?php

namespace App\Http\Controllers;
use App\Product\ProductTrait\Request\RequestContainsCustomParameters;
use App\Product\ProductTrait\Request\RequestContainsIds;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product\Service\CourseService;


class CourseController extends Controller
{
    use RequestContainsIds;
    use RequestContainsCustomParameters;

    private $courseService;
    private $ASSIGN_COURSE_TO_USER_ACTION_STR = 'assignCourseToUser';

    public function __construct(CourseService $crsService){
        $this->courseService = $crsService;
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
            return $this->courseService->findByIds($request,$_ids);
        }

        //Returning All Course
        return $this->courseService->findAll($request);
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
            if($this->getActionFromCustomParameters($request) == $this->ASSIGN_COURSE_TO_USER_ACTION_STR){
                return $this->courseService->assignCourseToUser($request);
            }
        }

        return $this->courseService->create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        return $this->courseService->findById($request,$id);
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
        return $this->courseService->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        return $this->courseService->deleteById($request,$id);
    }
}
