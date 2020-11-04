@extends('layouts.app')

@section('content')
  <div class="card-width">
    <div class="dashboard m-3 border-bottom border-dark">
      <a class="btn btn-primary align-self-center mr-2 p-2 btn-card" href="{{route('prop.create')}}">
        Aggiungi una proprietà
      </a>
      <a class="btn btn-success align-self-center ml-2 p-2 btn-card" href="{{route('upr.update')}}">
        Modifica dati account
      </a>
    </div>

      <h2 class="text-center font-weight-bold">
        I Miei Annunci
      </h2>
    <div id="upra-properties" class="d-flex justify-content-center flex-md-wrap card-property">
      @foreach ($properties as $d_p)
        <div class="card card-shadow m-3 card-prop p-2">
          <img class="card-img-top" src="{{asset('img_db/properties')}}/{{$d_p -> img}}" alt="property-image">
          <div class="card-body">
            <h5 class="card-title">{{ $d_p-> name }}</h5>
            <p class="card-text">{{ $d_p-> description }}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <strong>City: </strong>
              {{ $d_p-> city }}
            </li>
            <li class="list-group-item">
              <strong>Address: </strong>
              {{ $d_p-> address }}
            </li>
          </ul>
          <div class="card-body d-flex justify-content-around">
            <a href="{{ route('prop.show', $d_p -> id) }}" class="btn btn-info align-self-center p-3 btn-card">Info</a>
            <a href="{{ route('prop.destroy', $d_p -> id) }}" class="btn btn-danger align-self-center p-3 btn-card">Disable</a>
            <a href="{{ route('prop.edit', $d_p -> id) }}" class="btn btn-warning align-self-center p-3 btn-card">Edit</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
