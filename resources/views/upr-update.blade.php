@extends('layouts.app')

<style>

  #dashboard{
    width: 70%;
    margin: 100px auto;
  }

  .request{
    padding: 10px;
    border: 1px solid black;
    margin: 10px 0;
  }
</style>

@section('content')
  <div id="dashboard">

    <h1> Update profile</h1>

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

        <div class="form-group">
            <img src="{{asset('img_db/users')}}/{{auth() -> user() -> img}}">
            <label for="image"> Change image profile: </label>
            <input type="file" name="image">
        </div>

        <div class="form-group">
            <label for="firstname"> Firstname: </label>
        <input type="text" name='firstname' value = "{{auth() -> user() -> firstname}}">
        </div>

        <div class="form-group">
            <label for="lastname"> Lastname: </label>
        <input type="text" name='lastname' value = "{{auth() -> user() -> lastname}}">
        </div>

        <div class="form-group">
            <label for="date_of_birth"> Date of birth: </label>
        <input type="date" name='date' value = "{{auth() -> user() -> date_of_birth}}">
        </div>

        {{-- <div class="form-group">
            <label for="email"> Email: </label>
        <input type="email" name='email' value = "{{auth() -> user() -> email}}">
        </div> --}}

        <div class="form-group">
            <label for="password"> Password: </label>
        <input type="password" name='password' value = "">
        </div>

        <button type="submit" class="btn btn-danger"> Update </button>

    </form>
  </div>
@endsection