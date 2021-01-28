<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Continent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(isset($_GET['continent'])){
            $cities = City::whereIn('CountryCode',function($query){
                $query->from('country')->select('Code')->where('ContinentId',$_GET['continent']);
            })
            ->orderBy('CountryCode', 'asc')->latest()->paginate(8)->appends(request()->query());
        }
        else{
            $cities = City::orderBy('CountryCode', 'asc')->latest()->paginate(8)->appends(request()->query());
        }
        $continents = Continent::orderBy('ContinentName')->get();
        $url = URL::current();

        return view('Cities.citiesList', ['cities'=>$cities, 'continents'=>$continents, 'url'=>$url])
                ->with('i', (request()->input('page',1)-1)*8);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show($CountryCode)
    {
        //
        $cities = City::where('CountryCode', $CountryCode)->paginate(8);
        $country_name = Country::where('Code', $CountryCode)->value('Name');
        return view('Cities.citiesInCountry', ['cities'=>$cities, 'country_name'=>$country_name])
                ->with('i', (request()->input('page',1)-1)*8);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
