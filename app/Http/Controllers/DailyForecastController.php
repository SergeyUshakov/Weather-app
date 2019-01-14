<?php

namespace App\Http\Controllers;

use App\Http\Resources\DailyForecastCollectionResource;
use App\Models\DailyForecast;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DailyForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $today = date('Y-m-d', strtotime("0 day"));
        $weekFromNow = date('Y-m-d', strtotime("7 day"));

        try {
            $forecasts = DailyForecast::byCity($id)->fromDay($today)->toDay($weekFromNow)->get();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'No forecasts found for specific city'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong, we will fix it as soon as possible' . $e->getMessage()], 500);
        }

        return new DailyForecastCollectionResource($forecasts);
    }
}
