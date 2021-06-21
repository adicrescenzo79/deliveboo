@extends('layouts.app')

@section('content')
<div id="home">

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">{{$restaurant->name}}</div>
            <div class="card-body">
              <h3>Modifica Ristorante</h3>
              <form action="{{route('admin.restaurants.update', ['restaurant'=>$restaurant->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="text" name="name" value="{{$restaurant->name}}" placeholder="Nome">
                <input type="text" name="address" value="{{$restaurant->address}}" placeholder="Indirizzo">
                <input type="text" name="telephone" value="{{$restaurant->telephone}}" placeholder="Telefono">
                <input type="text" name="p_iva" value="{{$restaurant->p_iva}}" placeholder="Partita Iva">
                <input type="file" name="logo" value="{{$restaurant->logo}}" placeholder="Logo">
                <input type="file" name="cover_image" value="{{$restaurant->cover_image}}" placeholder="Immagine Cover">
                <input type="submit" name="" value="Aggiorna">
              </form>
              {{--<a href="{{ route('restaurants.show', ['slug' => $restaurant->slug])}}">Read more</a>--}}
            </div>
          </div>
        </div>
      <div class="col-md-6">
        <div class="card">

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
