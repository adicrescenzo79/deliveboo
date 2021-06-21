@extends('layouts.app')

@section('content')
<div id="home">

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header"><h5>{{$restaurant->name}}</h5></div>
            <div class="card-body">
              @if($restaurant->logo)
              <img src="{{asset($restaurant->logo)}}" alt="{{$restaurant->logo}}">
              @endif
              @if($restaurant->cover_image)
              <img src="{{asset($restaurant->cover_image)}}" alt="{{$restaurant->cover_image}}">
              @endif


              {{--<a href="{{ route('restaurants.show', ['slug' => $restaurant->slug])}}">Read more</a>--}}
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
