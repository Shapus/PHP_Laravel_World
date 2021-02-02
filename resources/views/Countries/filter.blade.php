<div class="col-md-4">
    <form action="{{ action('CountryController@countryFilter') }}" method="GET">
        <div class="form-group">
            <label for="">Continent</label>
            <select class="form-control" name="continent" id="">
                <option value="" selected>Continent</option>
                @foreach($continents as $continent)
                    <option value="{{ $continent->Id }} ">{{ $continent->ContinentName }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Government form</label>
            <select class="form-control" name="government" id="">
                <option value="" selected>Government form</option>
                @foreach($governments as $government)
                    <option value="{{ $government->GovernmentForm }}">{{ $government->GovernmentForm }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Indep. year</label>
            from <input class="form-control" name="numberFrom" type="number" value="{{ $minIndepYear->IndepYear }}">
            to <input class="form-control" name="numberTo" type="number" value="{{ $maxIndepYear->IndepYear }}">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Filter</button>
        </div>
    </form>
</div>