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
        if($this->fruitService->create($data->all())) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $data->all()
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails'),
            ]);
        }
        
    }

    public function update(Request $data)
    {
        if($this->fruitService->update($data->all())) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $data->all()
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails')
            ]);
        }
        
    }
    
    public function getAll()
    {
        if($data = $this->fruitService->getAll()) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails')
            ]);
        }
        
    }

    public function searchFruit(Request $data)
    {
        if($data = $this->fruitService->searchFruit($data['fruit_name'])) {
            
            return response()->json([
                'status' => __('message.success'),
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails')
            ]);
        }
    }

    public function getFruitFollowId($id)
    {
        if($data = $this->fruitService->getFruitFollowId($id)) {
            return response()->json([
                'status' => __('message.success'),
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails')
            ]);
        }
    }

    public function delete($id)
    {
        if($data = $this->fruitService->delete($id)) {
            return response()->json([
                'status' => __('message.success')
            ]);
        } else {
            return response()->json([
                'status' => __('message.fails')
            ]);
        }
        
    }
    
}