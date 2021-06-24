@extends('layouts.app')

@section('content')
  <div id="crud-restauran-show-main">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h5>{{$restaurant->name}}</h5>

          @if($restaurant->logo)
            <img src="{{asset($restaurant->logo)}}" alt="{{$restaurant->logo}}">
          @endif


          @foreach ($categories as $category)
            @if ($restaurant->categories->contains($category))
              <small>{{$category->name}}</small>
            @endif
          @endforeach

          @if($restaurant->cover_image)
            <img src="{{asset($restaurant->cover_image)}}" alt="{{$restaurant->cover_image}}">
          @endif


          <p>{{$restaurant->telephone}}</p>

          <p>{{$restaurant->address}}</p>

          <p>{{$restaurant->p_iva}}</p>

          <a href="{{route('admin.restaurants.edit', ['restaurant'=>$restaurant->id])}}"><button class="btn btn-primary" type="button" name="button">Modifica</button></a>

          <form class="form-delete" action="{{route('admin.restaurants.destroy', ['restaurant'=>$restaurant->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" name="" value="Cancella">
          </form>

          <a href="{{ route('admin.restaurants.dishes.index', ['restaurant' => $restaurant->id]) }}">Vedi i piatti disponibili</a>
        </div>
      </div>
    </div>
  </div>
@endsection
