<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Survivor;
use Illuminate\Http\Request;

class SurvivorsController extends Controller
{

    private $survivor;

    public function __construct(Survivor $survivor)
    {
        $this->survivor = $survivor;
    }

    public function index()
    {
        $data = ['data' => $this->survivor->all()];
        return response()->json($data);
    }

    public function show(Survivor $id)
    {
        $data = ['data' => $id];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            $survivorData = $request->all();
            $this->survivor->create($survivorData);
            return response()->json(["msg" => "Survivor created at success"], 201);
        } catch (\Exception $exception) {
            if(config('app.debug')){
                return response()->json(['Erro' => $exception->getMessage()],404);
            }
        }
    }

    public function update(Request $request, $id)
    {
        try {
//            return $request->get('name');
            $survivorData = $request->all();
            $survivor = $this->survivor->find($id);

            $survivor->update($survivorData);

            return response()->json(["msg" => "Survivor updated at success"], 201);
        } catch (\Exception $exception) {
            if(config('app.debug')){
                return response()->json(['Erro' => $exception->getMessage()],404);
            }
        }
    }
}
