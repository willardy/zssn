<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Item;
use App\Resource;
use App\Survivor;

class TradersController extends Controller {
    public function tradeItems($survivorOftenId, $survivorAcepptId) {

        if ($survivorAcepptId == $survivorOftenId) {
            return response()->json(['erro' => 'Survivor are equals'], 409);
        }

        $survivorOften = Survivor::find($survivorOftenId);
        if (!$survivorOften) {
            return response()->json(['erro' => 'Survivor not found'], 404);
        } elseif ($survivorOften->infected == true) {
            return response()->json(['erro' => 'Survivor infected'], 400);
        }

        $survivorAceppt = Survivor::find($survivorAcepptId);
        if (!$survivorAceppt) {
            return response()->json(['erro' => 'Survivor not found'], 404);
        } elseif ($survivorAceppt->infected == true) {
            return response()->json(['erro' => 'Survivor infected'], 400);
        }

        $quantityPointSurvivorOften = self::countPoint($survivorOften->id);
        $quantityPointSurvivorAceppt = self::countPoint($survivorAceppt->id);

        if ($quantityPointSurvivorAceppt != $quantityPointSurvivorOften) {
            return response()->json(['erro' => 'Number of points are different'], 200);
        }

        $resourcesSurvivorOften = Resource::where('survivor_id', $survivorOften->id)->get();
        $resourcesSurvivorAceppt = Resource::where('survivor_id', $survivorAceppt->id)->get();

        Resource::where('survivor_id', $survivorOften->id)->delete();
        Resource::where('survivor_id', $survivorAceppt->id)->delete();

        foreach ($resourcesSurvivorOften as $resource) {
            $resourceSurvivorAcceptFinalTrade = new Resource();
            $resourceSurvivorAcceptFinalTrade->survivor_id = $survivorAceppt->id;
            $resourceSurvivorAcceptFinalTrade->item_id = $resource->item_id;
            $resourceSurvivorAcceptFinalTrade->quantity = $resource->quantity;
            $resourceSurvivorAcceptFinalTrade->save();
        }

        foreach ($resourcesSurvivorAceppt as $resource) {
            $resourceSurvivorOftenFinalTrade = new Resource();
            $resourceSurvivorOftenFinalTrade->survivor_id = $survivorOften->id;
            $resourceSurvivorOftenFinalTrade->item_id = $resource->item_id;
            $resourceSurvivorOftenFinalTrade->quantity = $resource->quantity;
            $resourceSurvivorOftenFinalTrade->save();
        }


        return response()->json(['msg' => 'Trade is done.']);
    }

    public static function countPoint($survivorInfectedId) {
        $countPointsSurvivor = 0;
        $countAllResources = Resource::where('survivor_id', $survivorInfectedId)->get();

        foreach ($countAllResources as $item) {
            $quantity = $item->quantity;
            $points = Item::find($item->item_id)->points;
            $result = $quantity * $points;

            $countPointsSurvivor += $result;
        }

        return $countPointsSurvivor;
    }
}
