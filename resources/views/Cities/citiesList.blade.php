@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb offset-lg-2">
            <div class="pull-left">
                <h2>Cities List</h2>
                <h2>Cities amount: {{$cities->total()}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        @include('continents.ContinentsNav', ['continents' => $continents, 'url' => $url])
        @if (count($cities ?? '') > 0)
        <div class="col-md-10">
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
            {!! $cities->links() !!}<!-- Это постраничная пагинация -->
            @else
            <p>Data no found</p>
        </div>
        @endif
    </div>
</div>
@endsection