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

@endsection
