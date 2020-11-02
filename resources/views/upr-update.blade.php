@extends('layouts.app')

@section('content')
  <div class="card-width mt-4">
    <div class="card card-shadow">
      <div class="card-header input-title-text text-center">{{ __('Modifica Profilo') }}
      </div>
      <div class="card-body">

        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif


        <form method="post" action="{{route('upr.store')}}" enctype="multipart/form-data">

          @csrf
          @method('POST')

          <div class="form-group d-flex flex-column align-items-center">
              <img src="{{asset('img_db/users')}}/{{auth() -> user() -> img}}">
              <div class="">
                <label class="input-text" for="image">{{ __('Cambia Immagine:') }}</label>

                <input type="file" name="image">
              </div>
          </div>

          <div class="form-group row">
            <label for="firstname" class="col-md-4 col-form-label text-md-right input-text">{{ __('Firstname') }}</label>
            <div class="col-md-6">

              <input class="form-control" type="text" name='firstname' value = "{{auth() -> user() -> firstname}}" required autocomplete="firstname" autofocus>
            </div>
          </div>

          <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right input-text">{{ __('Lastname') }}</label>
            <div class="col-md-6">

              <input class="form-control" type="text" name='lastname' value = "{{auth() -> user() -> lastname}}" required autocomplete="lastname" autofocus>
            </div>
          </div>

          <div class="form-group row">
            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right input-text">{{ __('Date of birth') }}</label>
            <div class="col-md-6">

              <input class="form-control" type="date" name='date' value = "{{auth() -> user() -> date_of_birth}}" required autocomplete="date_of_birth" autofocus>
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right input-text">{{ __('E-Mail Address') }}</label>
            <div class="col-md-6">

              <input class="form-control" type="email" name='email' value = "{{auth() -> user() -> email}}" required autocomplete="email">
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right input-text">{{ __('Password') }}</label>
            <div class="col-md-6">

              <input class="form-control" type="password" name='password' value = "" required autocomplete="password">
            </div>
          </div>
          <div class="d-flex justify-content-center">

            <button type="submit" class="btn btn-success align-self-center p-3 btn-card"> Update </button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
