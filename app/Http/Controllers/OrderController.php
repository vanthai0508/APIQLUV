<?php

namespace App\Http\Controllers;

use App\Service\OrderService;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function update(Request $data)
    {
        $data['status'] = 1;
        if($result = $this->orderService->update($data->all())) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $result
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails'),
            ]);
        }
        
    }

    public function listOrder()
    {
        if($result = $this->orderService->listOrder()) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $result
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails'),
            ]);
        }
    }
}