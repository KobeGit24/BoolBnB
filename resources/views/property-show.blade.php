@extends('layouts.app')
<style>

    #central{
      width: 70%;
      margin: 100px auto;
    }
  
    #container-box{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .casella{
        margin: 5px;
        padding: 10px;
        text-align: center;
        border: 1px solid black;
    }
  </style>
@section('content')

  <div id="central">
      <h1> {{$prop -> name}} </h1>

      <h2> Dati sull'abitazione </h2>
      
  <img src="{{asset('img_db/properties')}}/{{$prop -> img}}">
      <div id="container-box"> 
            <div class="casella">
                <p> Città: </p>
                <p> {{$prop -> city}}</p>
            </div>

            <div class="casella">
                <p> Indirizzo: </p>
                <p> {{$prop -> address}}</p>
            </div>

            <div class="casella">
                <p> Descrizione: </p>
                <p> {{$prop -> description}}</p>
            </div>

            <div class="casella">
                <p> m2: </p>
                <p> {{$prop -> m2}}</p>
            </div>

            <div class="casella">
                <p> Piani: </p>
                <p> {{$prop -> floors}}</p>
            </div>

            <div class="casella">
                <p> letti: </p>
                <p> {{$prop -> beds}}</p>
            </div>
        </div>

        <h3> Servizi: </h3>

        @foreach ($services as $item)
            @if ($item -> property_id == $prop -> id)
               - {{$item -> service -> name}} -
            @endif
        @endforeach


        
        @if (!Auth::user())

            <h2> Fai un richiesta all'host </h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{route('store.request', $prop -> id)}}">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="user_email"> Email: </label>
                    <input type="email" name="user_email">
                </div>

                <div class="form-group">
                    <label for="firstname"> Firstname: </label>
                    <input type="text" name="firstname">
                </div>

                <div class="form-group">
                    <label for="lastname"> Lastname: </label>
                    <input type="text" name="lastname">
                </div>

                <div class="form-group">
                    <label for="number"> Phone Number: </label>
                    <input type="text" name="number">
                </div>

               <textarea name="text" rows="5" cols="50">
               </textarea>
                
               <div class="form-group">
                   <button type="submit" class="btn btn-danger"> Send </button>
               </div>
            </form>
        @endif
  </div>
@endsection
