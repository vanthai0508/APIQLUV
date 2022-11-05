<?php
namespace App\Service;
use App\Repositories\FruitRepositoryInterface;

class FruitService
{
    protected $fruitRepository;
    
    public function __construct(
        FruitRepositoryInterface $fruitRepository
    )
    {
        $this->fruitRepository = $fruitRepository;
    }

    public function create(array $data)
    {
        $file = $data['image_url'];

        $file->move('fruit', $file->getClientOriginalName());

        //  $request['id_user'] = Auth::user()->id;

        $link = $file->getClientOriginalName();

         $data['image_url'] = 'public/Fruit/'.$link;
        return $this->fruitRepository->create($data);
    }

    public function update(array $data)
    {
        return $this->fruitRepository->update($data['id'], $data);
    }

    public function getAll()
    {
        return $this->fruitRepository->getAll();
    }
}