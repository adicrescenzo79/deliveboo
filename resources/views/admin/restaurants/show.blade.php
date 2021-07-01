@extends('layouts.app')

@section('content')
  <div id="main-restaurants-show">

    @if($restaurant->cover_image)
      <div class="jumbo-restaurants-show" style="background-image: url({{asset($restaurant->cover_image)}});">
      </div>
    @endif

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">


          <div class="card text-center">
            {{-- <div class="card-header">
            </div> --}}
            <div class="card-body">
              <div class="img-overflow">
                @if($restaurant->logo)
                  <img class="" src="{{asset($restaurant->logo)}}" alt="{{$restaurant->logo}}">
                @endif

              </div>

              <h1 class="card-title my-3">{{$restaurant->name}}</h1>
              @foreach ($categories as $category)
                @if ($restaurant->categories->contains($category))
                  <p class="card-text text-secondary">{{$category->name}}</p>
                @endif
              @endforeach

              <p class="card-text">{{$restaurant->address}}</p>
              <p class="card-text">Tel: {{$restaurant->telephone}}</p>
              <p class="card-text">Partita IVA: {{$restaurant->p_iva}}</p>
              <div class="container-icon d-flex justify-content-center">
                <a class="mx-4" href="{{route('admin.restaurants.edit', ['restaurant'=>$restaurant->id])}}"><i class="fas fa-edit" title="Modifica"></i></a>

                <form class="form-delete mx-4" action="{{route('admin.restaurants.destroy', ['restaurant'=>$restaurant->id])}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input class="fa trash-icon" title="Cancella" type="submit" name="" value="&#xf1f8;">
                </form>

              </div>

            </div>
            <div class="card-footer text-muted">
              <a href="{{ route('admin.restaurants.dishes.index', ['restaurant' => $restaurant->id]) }}">Gestisci il tuo menù</a>
            </div>
          </div>



          {{-- <h5>{{$restaurant->name}}</h5>

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

          <a href="{{ route('admin.restaurants.dishes.index', ['restaurant' => $restaurant->id]) }}">Vedi i piatti disponibili</a> --}}
        </div>
      </div>
    </div>
  </div>
@endsection
