<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\DailyForecast;
use Illuminate\Http\Request;
use App\Models\City;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::get();

        return $cities;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try {
            $city = City::where('id', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'City not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong, we will fix it as soon as possible'], 500);
        }

        return new CityResource($city);
    }

}
