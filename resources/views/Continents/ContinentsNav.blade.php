<div class="col-md-2">
    <div class="list-group">
        @foreach($continents as $continent)
        <a class="list-group-item list-group-item-action" href="{{$url}}?continent={{$continent->Id}}">{{$continent->ContinentName}}</a>
        @endforeach
    </div>
</div>