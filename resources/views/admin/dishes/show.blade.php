@extends('layouts.app')

@section('content')
  <div id="home">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header"><h5>{{$dish->name}}</h5></div>
            <div class="card-body">
              @if($dish->image)
                <img src="{{asset($dish->image)}}" alt="{{$dish->image}}">
              @endif

              <h2>{{$dish->name}}</h2>

              @if ($dish->description)
                <p>{{$dish->description}}</p>
              @endif

              <p>{{number_format($dish->price, 2).'€'}}</p>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
