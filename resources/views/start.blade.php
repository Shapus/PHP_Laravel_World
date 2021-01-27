@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <h2>Countries and cities database</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb mb-3">
            <p>Go to <a href="{{action('CountryController@index')}}">Countries</a> to see countries list</p>
            <p>Go to <a href="{{action('CountryController@index')}}">Cities</a> to see cities list</p>
            <form class="form-inline" action="{{ action('CountryController@search') }}" method="GET">
                <p class="form-group">Type into</p>
                <div class="form-group mx-sm-2">
                    <input class="form-control" type="text" name="request" placeholder="Enter text..." require>
                </div>
                <button class="btn btn-primary" type="submit">Search</button>
                <p class="form-group mx-sm-2">to find countries and cities</p>
            </form>
        </div>
        <div class="col-lg-12 margin-tb">
            <p>
                You can 
                <a href="{{ route('login') }}">{{ __('Login') }}</a>  
                @if (Route::has('register'))
                or 
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </p>
        </div>
    </div>
</div>
@endsection