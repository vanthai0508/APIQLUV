<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\service\CVService;
use App\Http\Requests\CVRequest;
use Illuminate\Support\Facades\Auth;


class CVController extends Controller
{

    private $cv;
    public function __construct(CVService $cv)
    {
        $this->cv = $cv;
    }
    

    //get user follow cv
    public function getUser($id)
    {
        $data = $this->cv->getUser($id);

        echo $data;
    }

    //create cv
    public function create(CVRequest $request)
    {
        
        $this->cv->create($request->all());

    
        return response()->json([
            'status' => 'success',
            'data' => $request->all()
        ]);
    }

    // list cv
    public function list()
    {
        $data = $this->cv->list();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    // find cv
    public function find($id)
    {
       $data = $this->cv->find($id);

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    
    }

    public function update($id)
    {
      //  $this->cv->update($request->all(), $id);
     //   $data = $this->list();

     //   return response()->json([
      //      'status' => 'success',
    //        'data' => $data
      //  ]);

      echo $id;
        
    }


    // change status
    public function done($id)
    {
        $this->cv->done($id);
        
        return response()->json([
            'status' => 'success'
        ]);
    }

    // Reject CV
    public function reject($id)
    {
        $this->cv->reject($id);

        return response()->json([
            'status' => 'success'
        ]);

    }

 
    
}