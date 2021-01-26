@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>
            <div class="pull-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="/countries" title="Go back"> Back to all countries</a>
                </div>
                <div class="form-group">
                    <a class="btn btn-primary" href="{{ action('CityController@show', $country->Code)}}" title="show">Cities of country</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <strong>Code:</strong> - {{ $country->Code }}
            </div>
            <div class="form-group">
                <strong>Name</strong> - {{ $country->Name }}
            </div>
            <div class="form-group">
                <strong>Continent</strong> - {{$country->Continent}}
            </div>
            <div class="form-group">
                <strong>Region</strong> - {{$country->Region}}
            </div>
            <div class="form-group">
                <strong>IndepYear</strong> - {{$country->IndepYear}}
            </div>
            <div class="form-group">
                <strong>Population</strong> - {{$country->Population}}
            </div>
            <div class="form-group">
                <strong>GovernmentForm</strong> - {{ $country->GovernmentForm }}
            </div>
            <div class="form-group">
                <strong>HeadOfState</strong> - {{ $country->HeadOfState }}
            </div>
            <div class="form-group">
                <strong>Domain</strong> - {{ $country->Code2 }}
            </div>
        </div>
    </div>
    <iframe src="{{ $country->map_src }}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
@endsection