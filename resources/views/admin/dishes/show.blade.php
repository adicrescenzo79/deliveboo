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

              <p>{{$dish->price.'€'}}</p>

              {{-- DA GESTIRE --}}
              <input type="checkbox" name="" value="" >
              Disponibile
            </div>
          </div>
          
          <a href="{{route('admin.dishes.edit', ['dish'=>$dish->id])}}"><button class="btn btn-primary" type="button" name="button">Modifica</button></a>

        </div>
    </div>
  </div>
</div>
@endsection
