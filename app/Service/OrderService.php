<?php
namespace App\Service;

use App\Repositories\Eloquent\ShoppingCartDetailRepository;
use App\Repositories\OrderRepositoryInterface;
use Exception;
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
        try {
            // return $this->orderRepository->update($data['id'], $data);
            $user = Auth::user();
            $listOrder = $user->order;
            foreach($listOrder as $order) {
                if($order['status'] == 2){
                    $data['date'] = date('y-m-d h:i:s');
                    return $this->orderRepository->update($order['id'], $data);
                }
            }
            return null;
        } catch(Exception $e) {
            return null;
        }
    }

    public function listOrder()
    {
        try {
            $user = Auth::user();
            $listOrder = $user->order;
            return $listOrder;
        } catch(Exception $e) {
            return null;
        }
    }
}