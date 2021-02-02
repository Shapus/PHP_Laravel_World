<?php

namespace App\Http\Controllers;

use App\Country;
use App\City;
use App\Continent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

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
        if(isset($_GET['continent'])){
            $countries = Country::join('continent', 'country.ContinentId','=','continent.Id')->where('Id',$_GET['continent'])->orderBy('Code', 'asc')->latest()->paginate(8)->appends(request()->query());
        }
        else{
            $countries = Country::join('continent', 'country.ContinentId','=','continent.Id')->orderBy('Code', 'asc')->latest()->paginate(8)->appends(request()->query());
        }
        $continents = Continent::orderBy('ContinentName')->get();
        $url = URL::current();
        return view('Countries.countryList', ['countries' => $countries, 'continents'=>$continents, 'url' => $url])
                ->with('i', (request()->input('page',1)-1)*8)->with('j', (request()->input('continent',isset($_GET['continent']))?$_GET['continent']:null));
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
        $country = Country::join('continent', 'country.ContinentId','=','continent.Id')->where('Code', $code)->first();
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
        ->join('continent', 'country.ContinentId','=','continent.Id')
        ->where('Name', 'LIKE', "{$request}%")
        ->orWhere('ContinentName', 'LIKE', "{$request}%")
        ->orderBy('Name')->orderBy('ContinentName')
        ->get();

        $cities = City::query()
        ->where('Name', 'LIKE', "{$request}%")
        ->orderBy('Name')->orderBy('CountryCode')
        ->get();
        $continents = Continent::orderBy('ContinentName')->get();
        $url = URL::current();
        return view('countries.searchCountry', ['countries'=>$countries, 'cities'=>$cities,'request'=>$request, 'continents'=>$continents, 'url'=>$url]);
    }


     /**
     * 
     * Filter data
     *
     * 
     */
    public function countryFilter(Request $request){
        $continent = $request->input('continent');
        $government = $request->input('government');
        $minYear = $request->input('minIndepYear');
        $maxYear = $request->input('maxIndepYear');
        $countries = Country::where('ContinentId','=','{$continent}')
                            ->where('GovernmentForm','LIKE','{$government}%')
                            ->where('IndepYear','>=','{$minYear}')
                            ->where('IndepYear','<=','{$maxYear}')
                            ->latest()->paginate(8)->appends(request()->query());;
        $continents = Continent::get();
        $governments = Country::distinct()->get('GovernmentForm');
        $minIndepYear = Country::whereNotNull('IndepYear')->orderBy('IndepYear','asc')->first();
        $maxIndepYear = Country::whereNotNull('IndepYear')->orderBy('IndepYear','desc')->first();
        //$countries = Country::join('continent', 'country.ContinentId','=','continent.Id')->orderBy('Code', 'asc')->latest()->paginate(8)->appends(request()->query());
        return view('countries.countryFilter', ['continents'=>$continents, 'governments'=>$governments, 'minIndepYear'=>$minIndepYear, 'maxIndepYear'=>$maxIndepYear, 'countries'=>$countries]);
    }
    public function filterResult(){
        
        
    }
}
