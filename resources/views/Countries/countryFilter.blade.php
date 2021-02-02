@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb offset-lg-2">
            <div class="pull-left">
                <h2>Countries List </h2>
                <h2>Countries amount: {{$countries->total()}}</h2>
            </div>
        </div>
    </div>
    
    <div class="row">
        @include('countries.filter', ['continents' => $continents, 'governments' => $governments, 'minIndepYear' => $minIndepYear, 'maxIndepYear' => $maxIndepYear])
        @if (count($countries ?? '') > 0)
        <div class="col-md-8">
            <table class="table table-striped">
                <tr>
                    <th style="width:10%">Code</th>
                    <th style="width:10%">Country</th>
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
            {!! $countries->links() !!}<!-- Это постраничная пагинация -->
            @else
            <p>Data no found</p>
        </div>
        @endif
    </div>
</div>
@endsection