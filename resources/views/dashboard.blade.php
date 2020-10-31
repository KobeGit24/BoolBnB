@extends('layouts.app')

@section('content')
  <div id="dashboard">

    <h1> I miei annunci </h1>
    <div class="container">
      <div id="upra-properties" class="row justify-content-sm-center">
        @foreach ($properties as $d_p)
          <div class="card card-shadow p-1" style="width: 20rem;">
            <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $d_p-> name }}</h5>
              <p class="card-text">{{ $d_p-> description }}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <strong>Città: </strong>
                {{ $d_p-> city }}
              </li>
              <li class="list-group-item">
                <strong>Indirizzo: </strong>
                {{ $d_p-> address }}
              </li>
            </ul>
            <div class="card-body d-flex justify-content-around">
              <a href="{{ route('prop.show', $d_p -> id) }}" class="btn btn-info align-self-center p-3 btn-card">Info</a>
              <a href="{{ route('prop.destroy', $d_p -> id) }}" class="btn btn-danger align-self-center p-3 btn-card">Disabilita</a>
              <a href="{{ route('prop.edit', $d_p -> id) }}" class="btn btn-warning align-self-center p-3 btn-card">Edit</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    {{-- <div class="card card-shadow" style="width: 18rem;">
      <img class="card-img-top" src=".../100px180/?text=Image cap" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build onthe card title and make up the bulk of the card's content.</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
      <div class="card-body">
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
        <a href="#" class="card-link">Another link</a>
      </div>
    </div> --}}



      {{-- @foreach ($properties as $d_p)
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-center">{{ $d_p-> name }}</h5>
          <p class="card-text">{{ $d_p-> description }}</p>
          <p class="card-text">{{ $d_p-> address }}</p>
          <a href="{{ route('prop.show', $d_p -> id) }}" class="btn btn-primary align-self-center">Vedi annuncio</a>
          <a href="{{ route('prop.destroy', $d_p -> id) }}" class="btn btn-danger align-self-center">Disabilita</a>
          <a href="{{ route('prop.edit', $d_p -> id) }}" class="btn btn-warning align-self-center">Edit</a>

        </div>
      @endforeach
      <a class="btn btn-danger" href="{{ route('prop.create') }}">
        Aggiungi una casa
      </a>
    </div> --}}



    {{-- <a class="btn btn-danger" href="{{ route('upr.update') }}">
      Modifica dati account
    </a> --}}

@endsection
