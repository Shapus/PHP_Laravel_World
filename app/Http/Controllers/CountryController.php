<?php

namespace App\Http\Controllers;

use App\Country;
use App\City;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Country::orderBy('Code', 'asc')->latest()->paginate(8);
        return view('Countries.countryList', compact('countries'))
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
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        //
        $country = Country::where('Code', $code)->first();
        return view('Countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }


    /**
     * 
     * Search country
     *
     * 
     */
    public function search()
    {
        $request = $_GET['request'];
        $countries = Country::query()
        ->where('Name', 'LIKE', "{$request}%")
        ->orWhere('Continent', 'LIKE', "%{request}%")
        ->orderBy('Name')->orderBy('Continent')
        ->get();

        $cities = City::query()
        ->where('Name', 'LIKE', "{$request}%")
        ->orderBy('Name')->orderBy('CountryCode')
        ->get();

        return view('countries.searchCountry', ['countries'=>$countries, 'cities'=>$cities,'request'=>$request]);
    }
}
