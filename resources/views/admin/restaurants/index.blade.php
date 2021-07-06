@extends('layouts.app')

@section('content')
  <div id="main-admin-restaurants">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 d-flex justify-content-between align-items-center pb-3">
          <h1>I tuoi ristoranti</h1>
          <a href="{{route('admin.restaurants.create')}}"><i class="fas fa-plus" title="Crea Ristorante"></i></a>
        </div>

        @foreach ($restaurants as $restaurant)
          <div class="col-md-8">
            <div class="card">
              <div class="card-body row">

                <div class="card-img col-sm-12 col-xl-3 ">
                  <img src="{{asset($restaurant->logo)}}" alt="">
                </div>

                <div class="col-sm-12 col-xl-6 pt-3">
                  <ul>
                    <li class="pb-4"><strong>{{$restaurant->name}}</strong></li>
                    <li><i class="fas fa-map-marker-alt pr-2"></i>{{$restaurant->address}}</li>
                    <li>P.IVA: {{$restaurant->p_iva}}</li>
                    <li>TEL: {{$restaurant->telephone}}</li>
                  </ul>
                </div>

                    <div class="col-12 col-sm-8 offset-sm-2 col-xl-3 offset-xl-0 container-buttons  py-2 ">
                        <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}"><i class="fas fa-store-alt" title="Ristorante"></i></a>
                        <a href="{{ route('admin.restaurants.dishes.index', ['restaurant' => $restaurant->id])}}"><i class="fas fa-utensils" title="Menu"></i></a>
                        <a href="{{ route('admin.restaurants.statistics.index', ['restaurant' => $restaurant->id])}}"><i class="far fa-chart-bar" title="Statistiche"></i></a>
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
        <div class="col-md-12 d-flex justify-content-center mb-5 py-5">
          <a href="{{route('admin.restaurants.create')}}"><button class="my-btn-create" type="button" name="button">Crea</button></a>
        </div>

      </div>
    </div>
  </div>
@endsection
