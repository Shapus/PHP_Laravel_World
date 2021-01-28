@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Search request -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>"{{$request}}" search result:</h2>
            </div>
        </div>
    </div>
    <hr>
    <!-- End search request -->

    
    <!-- Countries -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h2>Countries amount: {{count($countries)}}</h2>
            </div>
        </div>
    </div>
    @if (count($countries ?? '') > 0)
    <table class="table table-striped ">
        <tr>
            <th style="width:10%">Code</th>
            <th style="width:10%">Country name</th>
            <th style="width:10%">IndepYear</th>
            <th style="width:20%">Continent</th>
            <th style="width:10%"></th>
            <th style="width:10%"></th>
        </tr>
        @foreach ($countries as $country)
        <tr><!---->
            <td>{{$country->Code}}</td>
            <td>{{$country->Name}}</td>
            <td>{{$country->IndepYear}}</td>
            <td>{{$country->ContinentName}}</td>
            <td>
                <a href="{{ action('CountryController@show', $country->Code)}}" title="show">Detail</a>
            </td>
            <td>
                <a href="{{ action('CityController@show', $country->Code)}}" title="show">Cities of country</a>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <p>Data no found</p>
    @endif
    <!-- End countries -->


    <!-- Cities -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cities amount: {{count($cities)}}</h2>
            </div>
        </div>
    </div>
    @if (count($cities ?? '') > 0)
    <table class="table table-striped">
        <tr>
            <th style="width:10%">Name</th>
            <th style="width:10%">CountryCode</th>
            <th style="width:10%">Population</th>
            <th style="width:10%"></th>
        </tr>
        @foreach ($cities as $city)
        <tr><!---->
            <td>{{$city->Name}}</td>
            <td>
                <a href="{{ action('CountryController@show', $city->CountryCode)}}" title="show">{{$city->CountryCode}}</a>
            </td>
            <td>{{$city->Population}}</td>
            <td>
                <a href="{{ action('CityController@show', $city->CountryCode)}}" title="show">All cities of country</a>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <p>Data no found</p>
    @endif
    <!-- End cities -->


</div>
@endsection