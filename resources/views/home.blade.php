@extends('layouts.home')

@section('content')
    <div id="gap-header"></div>
    <h1 class="text-primary">Dove ti piacerebbe andare?</h1>
    <section id="prop-sponsored" class="">
      <div class="sponsored">
        <div class="title text-center p-2">
          <h3>Appartamenti in evidenza</h3>
        </div>
        <div class="">
          <div class="d-flex flex-wrap justify-content-around">
            @foreach ($data_property as $d_p)
              <div class="property-sponsored d-flex flex-column justify-content-between index-sponsored card-shadow">
                <img id="img-prop-index"src="{{asset('img_db/properties')}}/{{$d_p -> img}}" alt="">
                <h5 class="align-self-center">{{ $d_p-> name }}</h5>
                <a href="{{ route('prop.show', $d_p -> id) }}" class="btn btn-primary align-self-center">SCOPRI</a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
