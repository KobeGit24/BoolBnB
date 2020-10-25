@extends('layouts.app')
@section('content')

  <div style="margin-top: 200px;" class="d-flex flex-row">
    <form class="container" action="{{ route('search')}}" method="post">
      @csrf
      @method('GET')
      <div class="form-group d-flex flex-row align-items-center">
        <div class="aa-input-container" id="aa-input-container">
          <input  type="search" id="aa-search-input"
                  class="aa-input-search"
                  placeholder="Search for players or teams..."
                  name="search"
                  value="{{ $requestInput['search'] }}"
                  autocomplete="off" />
          <input  id="lat"
                  type="hidden"
                  name="lat"
                  value="{{ $requestInput['lat'] }}"
                  class="form-control">
          <input  id="lng"
                  type="hidden"
                  name="lng"
                  value="{{ $requestInput['lng'] }}"
                  class="form-control">
        </div>
        <div class="search-button">
          <button type="submit" class="btn btn-primary">
            CERCA
          </button>
        </div>
      </div>
    </form>
  </div>

  <div style="margin-top: 100px;" class="d-flex flex-row bg-light">

    <ul id="property-wall" class="list-group list-group-horizontal">

    </ul>

  </div>
  <script id="property-template" type="text/x-handlebars-template">
    <div class="card my-3" style="width: 18rem;">
      <div class="card-body d-flex flex-column">
        <h5 class="card-title text-center">@{{ name }}</h5>
        <p class="card-text">@{{ description }}</p>
        <p class="card-text">@{{ address }}</p>
        <a href="/property/@{{ id }}" class="btn btn-primary align-self-center">SCEGLI</a>
      </div>
    </div>
  </script>

@endsection
