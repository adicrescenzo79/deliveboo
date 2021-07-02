@extends('layouts.app')

@section('content')
<div id="home">

  <div class="container">
    <div class="row justify-content-center">
      @foreach ($dishes as $dish)
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">{{$dish->name}}</div>
            <div class="card-body">
              <a href="{{route('admin.dishes.edit', ['dish'=>$dish->id])}}"><button class="btn btn-primary" type="button" name="button">Modifica</button></a>
              <form class="form-delete" action="{{route('admin.dishes.destroy', ['dish'=>$dish->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="" value="Cancella">
              </form>
              <a href="{{ route('admin.dishes.show', ['dish' => $dish->id])}}">Vedi Dettaglio</a>
            </div>
          </div>
        </div>
      @endforeach
      <a href="{{route('admin.restaurants.dishes.create', ['restaurant' => $dish->restaurant_id])}}"><button class="btn btn-primary" type="button" name="button">Crea</button></a>

      <div class="col-md-6">
        <div class="card">

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
