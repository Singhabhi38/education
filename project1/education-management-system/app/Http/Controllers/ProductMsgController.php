<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Support\Facades\Auth;
use App\Product\Service\ProductMsgService;
use Illuminate\Http\Request;

class ProductMsgController extends Controller
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */

    private  $productMsgService;

    public function __construct(ProductMsgService $pService)
    {
        $this->productMsgService = $pService;
        //middleware will be added later..
    }

    public function index(Request $request)
    {
        return $this->productMsgService->findAll($request);
    }
    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id, Request $request)
    {
        return $this->productMsgService->findById($request, $id);
    }
    /**
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = UserModel::where('id', '!=', Auth::id())->get();

        return view('partials.message-form', compact('users'));
    }
    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        return $this->productMsgService->create($request);
    }
    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id, Request $request)
    {
        return $this->productMsgService->update($request, $id);
    }
}