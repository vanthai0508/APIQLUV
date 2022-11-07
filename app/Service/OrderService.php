<?php
namespace App\Service;

use App\Repositories\Eloquent\ShoppingCartDetailRepository;
use App\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    protected $orderRepository;


    public function __construct(
        OrderRepositoryInterface $orderRepository
    )
    {
        $this->orderRepository = $orderRepository;
    }
    
    public function update(array $data)
    {
        return $this->orderRepository->update($data['id'], $data);
    }
}