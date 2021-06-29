@extends('layouts.app')

@section('content')
<div id="main-admin-restaurants">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <a href="{{route('admin.restaurants.create')}}"><button class="btn btn-primary" type="button" name="button">Crea</button></a>
      </div>
      @foreach ($restaurants as $restaurant)
        <div class="col-md-8">
          <div class="card">
            {{-- <div class="card-header"><h5>{{$restaurant->name}}</h5></div> --}}
            <div class="card-body row">

              <div class="card-img col-md-2">
                <img src="{{$restaurant->logo}}" alt="">
              </div>

              <div class="col-md-5">
                <ul>
                  <li><strong>{{$restaurant->name}}</strong></li>
                  <li>{{$restaurant->address}}</li>
                  <li>P.IVA: {{$restaurant->p_iva}}</li>
                  <li>Telefono: {{$restaurant->telephone}}</li>
                </ul>
              </div>

              <div class="col-md-3">
                <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}"><button class="my-btn-card" type="button" name="button">Ristorante</button></a>
                <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}"><button class="my-btn-card" type="button" name="button">Statistiche</button></a>
              </div>

              <div class="col-md-2">
                <a href="{{route('admin.restaurants.edit', ['restaurant'=>$restaurant->id])}}"><i class="fas fa-edit"></i></a>
                <form class="form-delete" action="{{route('admin.restaurants.destroy', ['restaurant'=>$restaurant->id])}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input class="fa trash-icon" type="submit" name="" value="&#xf1f8;">
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
