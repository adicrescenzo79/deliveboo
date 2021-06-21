@extends('layouts.app')

@section('content')
<div id="home">

  <div class="container">
    <div class="row justify-content-center">
      @foreach ($restaurants as $restaurant)
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">{{$restaurant->name}}</div>
            <div class="card-body">
              <a href="{{route('admin.restaurants.edit', ['restaurant'=>$restaurant->id])}}"><button class="btn btn-primary" type="button" name="button">Modifica</button></a>
              <form class="form-delete" action="{{route('admin.restaurants.destroy', ['restaurant'=>$restaurant->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="" value="Cancella">
              </form>
              <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}">Vedi Dettaglio</a>
            </div>
          </div>
        </div>
      @endforeach
      <a href="{{route('admin.restaurants.create')}}"><button class="btn btn-primary" type="button" name="button">Crea</button></a>

      <div class="col-md-6">
        <div class="card">

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
