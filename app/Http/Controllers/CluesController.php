<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Api\ApiClues;
use Illuminate\Support\Facades\Input;

class CluesController extends Controller
{
    public function index($category=null,$offset=null)
    {
        $offset= ($offset > 0)?$offset-1:$offset;
        $api = new ApiClues();
        $api->init(['offset'=>$offset-1,'category'=>$category]);
        $data['page'] = $offset;
        $data['data'] = $api->getData();
        $outputObject = new \App\ApiOutputObjects\ApiOutput();
        $outputObject->setAllData($data);
        return response()->json($outputObject->getAllData());
    }
}
