<?php
namespace App\service;
use App\Repositories\CVRepo;
class CVService 
{
    protected $repo;
    public function __construct(CVRepo $repo)
    {
        $this->repo = $repo;
    }

    public function create(array $request)
    {
       
            $file = $request['file'];

            $file->move('cv', $file->getClientOriginalName());

            $link = $file->getClientOriginalName();

            $request['file'] = 'public/cv/'.$link;

            
        $this->repo->create($request);          
    }   

    public function list()
    {
      return  $this->repo->list();
    }
}
?>