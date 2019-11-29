<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Item;
use App\Resource;
use App\Survivor;
use Exception;

class ReportsController extends Controller {
    public function percentInfected() {
        try {
            $countAllSurvivors = Survivor::count();
            $countInfetedSurvivors = Survivor::where('infected', true)->count();

            $percentageInfected = ($countInfetedSurvivors / $countAllSurvivors) * 100;

            return response()->json(['msg' => $percentageInfected . '% of survivors are infected'], 200);
        } catch (Exception $exception) {
            return response()->json(['erro' => $exception->getMessage()], 200);
        }
    }

    public function percentNonInfected() {
        try {
            $countAllSurvivors = Survivor::count();
            $countInfetedSurvivors = Survivor::where('infected', false)->count();

            $percentageInfected = ($countInfetedSurvivors / $countAllSurvivors) * 100;

            return response()->json(['msg' => $percentageInfected . '% of survivors are not infected'], 200);
        } catch (Exception $exception) {
            return response()->json(['erro' => $exception->getMessage()], 200);
        }
    }

    public function averageAmount() {
        try {
            $countAllSurvivors = Survivor::count();

            $allItems = Item::get();

            $data = array();
            foreach ($allItems as $item) {
                $countAllItem = Resource::where('item_id', $item->id)->sum('quantity');
                $data[$item->description] = $countAllItem / $countAllSurvivors;
            }

            return response()->json(['data' => $data], 200);
        } catch (Exception $exception) {
            return response()->json(["error" => $exception->getMessage()]);
        }
    }

    public function pointsLost($survivor_infected_id) {
        try {
            $survivorInfected = Survivor::find($survivor_infected_id);
            if (!$survivorInfected) {
                return response()->json(['message' => 'Survivor not found'], 404);
            }

            if ($survivorInfected->infected == false) {
                return response()->json(['message' => 'Survivor not infected, not yet'], 400);
            }

            $countPointsSurvivorLost = 0;
            $countAllResources = Resource::where('survivor_id', $survivor_infected_id)->get();

            foreach ($countAllResources as $item) {
                $quantity = $item->quantity;
                $points = Item::find($item->item_id)->points;
                $result = $quantity * $points;

                $countPointsSurvivorLost += $result;
            }

            return response()->json(['pointsLost' => $countPointsSurvivorLost], 200);
        } catch (Exception $exception) {
            return response()->json(["error" => $exception->getMessage()]);
        }
    }
}
