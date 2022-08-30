<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MultiLanguageController extends Controller
{
    /**
     * Show greetings
     *
     * @param Request $request [description]
     * @return [type] [description]
     */
    public function index(Request $request)
    {
        $data = [
            'message' => trans('message.hello'),
        ];

        return response()->json($data, 200);
    }
}