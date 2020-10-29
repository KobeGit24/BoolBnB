@extends('layouts.app')

<style>

  #dashboard{
    width: 70%;
    margin: 100px auto;
  }


</style>

@section('content')

  <div id="messaggi">
    <h2>messaggi</h2>
  <ul>
    @foreach ($requests as $request)
        <li>
          {{ $request-> firstname }}<br>
          {{ $request-> lastname }}<br>
          {{ $request-> text }}
        </li>
    @endforeach
  </ul>


  </div>

  <div id="statistics">
    <h2>statistiche</h2>
  <ul>
    @foreach ($views as $view)
        <li>
          {{ $view-> date }}<br>
        </li>
    @endforeach
  </ul>


  </div>
@endsection
