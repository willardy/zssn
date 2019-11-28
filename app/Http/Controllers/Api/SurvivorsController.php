<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Item;
use App\Resource;
use App\Survivor;
use Exception;
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
        try {
            $data = ['data' => $this->survivor->all()];
            return response()->json($data);
        } catch (Exception $exception) {
            return response()->json(["error" => $exception->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $survivor = Survivor::find($id);

            if (!$survivor) {
                return response()->json(['erro' => 'Survivor not found'], 404);
            }

            $resources = Survivor::find($id)->resources;

            $arrayData = [];

            $count = 0;
            foreach ($resources as $resource) {
                $arrayData[$count]['description'] = Item::find($resource->item_id)->description;
                $arrayData[$count]['points'] = Item::find($resource->item_id)->points;
                $count++;
            }

            $data['survivor'] = $survivor;
            $data['survivor']['resources'] = $arrayData;

            return response()->json($data);
        } catch (Exception $exception) {
            return response()->json(["error" => $exception->getMessage()]);
        }

    }

    public function store(Request $request)
    {
        try {
            $survivorData = $request->all();
            $this->survivor->create($survivorData);
            return response()->json(["msg" => "Survivor created at success"], 201);
        } catch (Exception $exception) {
            if (config('app.debug')) {
                return response()->json(['Erro' => $exception->getMessage()], 404);
            }
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $latitude = $request->latitude;
            $longitude = $request->longitude;

            $survivor = $this->survivor->find($id);
            $survivor->latitude = $latitude;
            $survivor->longitude = $longitude;

            $survivor->update();

            $data = ["msg" => "Survivor updated at success"];

            return response()->json($data, 201);

//            return response()->json(["msg" => "Survivor updated at success"], 201);
        } catch (Exception $exception) {
            if (config('app.debug')) {
                return response()->json(['Erro' => $exception->getMessage()], 404);
            }
        }
    }

    private function getResourcesItems($id){

    }
}
