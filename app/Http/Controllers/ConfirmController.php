<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service\ConfirmService;
use App\Http\Requests\ConfirmRequest;


class ConfirmController extends Controller
{
    protected $confirm;
    public function __construct(ConfirmService $confirm)
    {
        $this->confirm = $confirm;
    }


    // create confirm
    public function create(ConfirmRequest $request)
    {
        $this->confirm->create($request->all());

        return response()->json([
            'status' => 'success'
        ]);
   
    }

    public function list()
    {
        $data = $this->confirm->list();

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
}
