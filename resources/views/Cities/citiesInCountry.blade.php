@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cities of {{$country_name}}</h2>
                <h2>Cities amount: {{$cities->total()}}</h2>
            </div>
            <div class="pull-right">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ action('CityController@index') }} " title="Go back"> Back to all citiest</a>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="{{ action('CountryController@index') }}">Back to all countries</a>
            </div>
            </div>
        </div>
    </div>
    @if (count($cities ?? '') > 0)
    <table class="table table-striped">
        <tr>
            <th style="width:10%">Name</th>
            <th style="width:10%">CountryCode</th>
            <th style="width:10%">Population</th>
        </tr>
        @foreach ($cities as $city)
        <tr><!---->
            <td>{{$city->Name}}</td>
            <td>
                <a href="{{ action('CountryController@show', $city->CountryCode)}}" title="show">{{$city->CountryCode}}</a>
            </td>
            <td>{{$city->Population}}</td>
        </tr>
        @endforeach
    </table>
    {!! $cities->links() !!}<!-- Это постраничная пагинация -->
    @else
    <p>Data no found</p>
    @endif
</div>
@endsection