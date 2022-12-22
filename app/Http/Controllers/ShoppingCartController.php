<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ShoppingCartService;

class ShoppingCartController extends Controller
{
    protected $shoppingCartService;

    public function __construct(
        ShoppingCartService $shoppingCartService
    )
    {
        $this->shoppingCartService = $shoppingCartService;
    }

    public function create(Request $data)
    {
        if($result = $this->shoppingCartService->create($data->all())) {
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

    public function listFruitOfCart()
    {
        if($result = $this->shoppingCartService->listFruitOfCart()) {
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