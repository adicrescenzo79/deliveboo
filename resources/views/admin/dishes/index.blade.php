@extends('layouts.app')

@section('content')
<div id="main-admin-dishes">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 d-flex justify-content-between align-items-center pb-3">
         <h1>I tuoi piatti in {{$actualRestaurant->name}}</h1>
        <a href="{{route('admin.restaurants.dishes.create', ['restaurant' => $actualRestaurant->id])}}"><i class="fas fa-plus" title="Crea piatto"></i></a>
      </div>

      @foreach ($dishes as $dish)
        <div class="col-md-8">
          <div class="card">
            {{-- <div class="card-header"><h5>{{$restaurant->name}}</h5></div> --}}
            <div class="card-body row align-items-center">

              <div class="card-img col-md-3 col-sm-12">
                <img src="{{asset($dish->image)}}" alt="">
              </div>

              <div class="col-md-5 col-sm-12">
                <ul>
                  <li class="pb-3"><strong>{{$dish->name}}</strong></li>
                  <li>{{$dish->description}}</li>
                  <li>€ {{$dish->price}}</li>
                </ul>
              </div>

              <div class="col-md-4 col-sm-12 container-buttons py-2">
                {{-- <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}"><button class="my-btn-card" type="button" name="button">Ristorante</button></a>
                <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}"><button class="my-btn-card" type="button" name="button">Statistiche</button></a> --}}
                <a href="{{route('admin.dishes.edit', ['dish'=>$dish->id])}}"><i class="fas fa-edit" title="Modifica"></i></a>
                <form class="form-delete" action="{{route('admin.dishes.destroy', ['dish'=>$dish->id])}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input class="fa trash-icon" type="submit" title="Cancella" name="" value="&#xf1f8;">
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
      <div class="col-md-12 d-flex justify-content-center  py-3">
        <a href="{{route('admin.restaurants.dishes.create', ['restaurant' => $dish->restaurant_id])}}"><button class="my-btn-create" type="button" name="button">Inserisci un nuovo piatto</button></a>

      </div>
      <div class="pb-5">
        <a class="green py-2" href="{{ route('admin.restaurants.index') }}"><i class="fas fa-arrow-left mr-1"></i> Torna ai tuoi ristoranti</a>
      </div>




    </div>
  </div>
</div>
@endsection
