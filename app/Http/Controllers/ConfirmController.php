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
            'status' => __('message.success'),
        ]);
    }
    //list confirm
    public function list()
    {
        $data = $this->confirm->list();
        return response()->json([
            'status' => __('message.success'),
            'data' => $data
        ]);
    }

    // letter confirm from admin
    public function letterConfirm()
    {
        $data = $this->confirm->letterConfirm();

        return response()->json([
            'status' => __('message.success'),
            'data' => $data
        ]);
    }

    // confrim of user
    public function userConfirm()
    {

        $this->confirm->userConfirm();

        return response()->json([
            'status' => __('message.success'),
        ]);
    }

    // list user confirmed

    public function listUserParticipationInterview()
    {
        $data = $this->confirm->listUserParticipationInterview();

        return response()->json([
            'status' => __('message.success'),
            'data' => $data
        ]);
    }
}
