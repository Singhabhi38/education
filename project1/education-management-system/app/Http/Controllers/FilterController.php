<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product\Service\FilterService;

class FilterController extends Controller
{
    private $filterService;

    public function __construct(){
        $this->filterService = new FilterService();
        //
        $this->middleware('simpleCustomGETPOSTCache');
    }

    public function filter(Request $request){
        $filterRequest = $request->all();
        return $this->filterService->filterFromRequest($filterRequest);
    }
}
