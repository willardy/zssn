<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Survivor;

class SurvivorsController extends Controller {

    private $survivor;
    
    public function __construct(Survivor $survivor){
        $this->survivor = $survivor;
    }

    public function index() {
        $data = ['data' => $this->survivor->paginate(10)];
        return response()->json($data);
    }

    public function show(Survivor $id){
        $data = ['data' => $id];
        return response()->json($data);
    }
}
