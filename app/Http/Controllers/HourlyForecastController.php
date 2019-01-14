<?php

namespace App\Http\Controllers;

use App\Http\Resources\HourlyForecastCollectionResource;
use App\Models\HourlyForecast;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HourlyForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        try {
            $forecasts = HourlyForecast::byDailyForecast($id)->get();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'No forecasts found for specific city'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong, we will fix it as soon as possible' . $e->getMessage()], 500);
        }

        return new HourlyForecastCollectionResource($forecasts);
    }
}
