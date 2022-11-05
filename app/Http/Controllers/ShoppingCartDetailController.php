<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ShoppingCartDetailService;

class ShoppingCartDetailController extends Controller
{
    protected $shoppingCartDetail;

    public function __construct(
        ShoppingCartDetailService $shoppingCartDetail
    )
    {
        $this->shoppingCartDetail = $shoppingCartDetail;
    }

    public function addFruitCart(Request $data)
    {
        $result = $this->shoppingCartDetail->addFruitCart($data->all());
        return response()->json([
            'status' => __('message.success'),
            'data' => $result
        ]);
    }
}