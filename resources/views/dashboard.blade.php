@extends('layouts.app')

<style>

  #dashboard{
    width: 70%;
    margin-top: 100px;

    padding-left: 20%; 
  }

  .request{
    padding: 10px;
    border: 1px solid black;
    margin: 10px 0;
  }
</style>

@section('content')
  <div id="dashboard">

    <a class="btn btn-danger" href="{{ route('prop.create') }}">
      Aggiungi una casa
    </a>

    <h1> I miei annunci </h1>
    <div class="row justify-content-center justify-content-md-around">
      @foreach ($properties as $d_p)
        <div class="card-body d-flex flex-column">
          <h5 class="card-title text-center">{{ $d_p-> name }}</h5>
          <p class="card-text">{{ $d_p-> description }}</p>
          <p class="card-text">{{ $d_p-> address }}</p>
          <a href="{{ route('prop.show', $d_p -> id) }}" class="btn btn-primary align-self-center">Vedi annuncio</a> {{-- Porta alla pagina dell'annuncio --}}
          <a href="{{ route('prop.destroy', $d_p -> id) }}" class="btn btn-danger align-self-center">Disabilita</a> {{-- Disabilita la visualizzazione della casa --}}
          <a href="{{ route('prop.edit', $d_p -> id) }}" class="btn btn-warning align-self-center">Edit</a> {{-- Modifica i dati dell'annuncio --}}

        </div>
      @endforeach
    </div>

    

    <a class="btn btn-danger" href="{{ route('upr.update') }}">
      Modifica dati account
    </a>
  </div>
@endsection
