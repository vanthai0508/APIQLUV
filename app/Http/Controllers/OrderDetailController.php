<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Service\OrderDetailService;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    protected $orderDetailService;

    public function __construct(OrderDetailService $orderDetailService)
    {
        $this->orderDetailService = $orderDetailService;
    }

    public function create(Request $data)
    {
        if($result = $this->orderDetailService->create($data)) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $result
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails')
            ]);
        }
        
    }
}