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
    // public function list()
    // {
    //     echo "thai";
    // }

    public function create(CVRequest $request)
    {
        $this->cv->create($request->all());

    //   $user = Auth::user()->email;
        return response()->json([
            'status' => 'success',
            'data' => $request->all()
        ]);
    }

    public function list()
    {
        $data = $this->cv->list();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
 
    
}