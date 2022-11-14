<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\FruitService;
use App\Http\Requests\CreateFruitRequest;

class FruitController extends Controller
{
    protected $fruitService;

    public function __construct(FruitService $fruitService)
    {
        $this->fruitService = $fruitService;
    }

    public function create(Request $data)
    {
        $this->fruitService->create($data->all());
        return response()->json([
            'status' => __('message.success'),
            'data' => $data->all()
        ]);
    }

    public function update(Request $data)
    {
        $this->fruitService->update($data->all());
        return response()->json([
            'status' => __('message.success'),
            'data' => $data->all()
        ]);
    }
    
    public function getAll()
    {
        $data = $this->fruitService->getAll();
        return response()->json([
            'status' => __('message.success'),
            'data' => $data
        ]);
    }

    public function getFruitFollowId($id)
    {
        $data = $this->fruitService->getFruitFollowId($id);
        return response()->json([
            'status' => __('message.success'),
            'data' => $data
        ]);
    }
    
}