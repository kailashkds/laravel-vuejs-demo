<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api\ApiCategories;
use App\Api\ApiClues;
use Illuminate\Support\Facades\Input;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $offset = Input::get('page',1)-1;
        $count = 10;
        $api = new ApiCategories();
        $api->init(['offset'=>$offset,'count'=>$count]);
        $data['page'] = $offset;
        $data['data'] = $api->getData();
        $outputObject = new \App\ApiOutputObjects\ApiOutput();
        $outputObject->setAllData($data);
        return response()->json($outputObject->getAllData());
    }
    
}
