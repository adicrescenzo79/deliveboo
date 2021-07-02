@extends('layouts.app')

@section('content')
<div id="main-admin-restaurants">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 d-flex justify-content-center mb-3">
        <a href="{{route('admin.restaurants.create')}}"><button class="my-btn-create" type="button" name="button">Crea</button></a>
      </div>

      @foreach ($restaurants as $restaurant)
        <div class="col-md-8">
          <div class="card">
            {{-- <div class="card-header"><h5>{{$restaurant->name}}</h5></div> --}}
            <div class="card-body row">

              <div class="card-img col-md-3 col-sm-12">
                <img src="{{$restaurant->logo}}" alt="">
              </div>

              <div class="col-md-5 col-sm-12">
                <ul>
                  <li class="pb-3"><strong>{{$restaurant->name}}</strong></li>
                  <li>{{$restaurant->address}}</li>
                  <li>P.IVA: {{$restaurant->p_iva}}</li>
                  <li>Telefono: {{$restaurant->telephone}}</li>
                </ul>
              </div>

              <div class="col-md-4 col-sm-12 container-buttons py-2">
                {{-- <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}"><button class="my-btn-card" type="button" name="button">Ristorante</button></a>
                <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}"><button class="my-btn-card" type="button" name="button">Statistiche</button></a> --}}
                <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}"><i class="fas fa-utensils" title="Ristorante"></i></a>
                <a href="{{ route('admin.restaurants.statistics.index', ['restaurant' => $restaurant->id]) }}"><i class="far fa-chart-bar" title="Statistiche"></i></a>
                <a href="{{route('admin.restaurants.edit', ['restaurant'=>$restaurant->id])}}"><i class="fas fa-edit" title="Modifica"></i></a>
                <form class="form-delete" action="{{route('admin.restaurants.destroy', ['restaurant'=>$restaurant->id])}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input class="fa trash-icon" type="submit" title="Cancella" name="" value="&#xf1f8;">
                </form>
              </div>

            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</div>
@endsection
