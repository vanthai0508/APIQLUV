<?php
namespace App\Service;

use App\Repositories\Eloquent\ShoppingCartDetailRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\FruitRepositoryInterface;
use App\Repositories\OrderDetailRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class OrderDetailService
{
    protected $fruitRepository;
    protected $orderRepository;
    protected $orderDetailRepository;

    public function __construct(
        FruitRepositoryInterface $fruitRepository,
        OrderDetailRepositoryInterface $orderDetailRepository,
        OrderRepositoryInterface $orderRepository
    )
    {
        $this->fruitRepository = $fruitRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->orderRepository = $orderRepository;
    }

    public function create($data)
    {
        $fruit= $this->fruitRepository->find($data['fruit_id']);
        $order = $this->orderRepository->create([
            'user_id' => Auth::user()->id,
            'date' => date('y-m-d h:i:s'),
            'address' => $data['address'],
            'total_bill' => $fruit->price * $data['quantity'],
            'status' => 1
        ]);
        $orderDetail = $this->orderDetailRepository->create([
            'fruit_id' => $data['fruit_id'],
            'quantity' => $data['quantity'],
            'order_id' => $order->id
        ]);
        return $order;
    }
}