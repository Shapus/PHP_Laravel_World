@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cities List</h2>
                <h2>Cities amount: {{$cities->total()}}</h2>
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
    {!! $cities->links() !!}<!-- Это постраничная пагинация -->
    @else
    <p>Data no found</p>
    @endif
</div>
@endsection