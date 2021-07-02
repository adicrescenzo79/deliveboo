@extends('layouts.app')

@section('content')
<div id="main-admin-restaurants">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 d-flex justify-content-between align-items-center pb-3">
                <h1>I tuoi ristoranti</h1>
                <a href="{{route('admin.restaurants.create')}}"><i class="fas fa-plus" title="Crea Ristorante"></i></a>

            </div>

            @foreach ($restaurants as $restaurant)
            <div class="col-md-8">
                <div class="card">
                <div class="card-body row">

                    <div class="card-img col-md-3 col-sm-12">
                        <img src="{{$restaurant->logo}}" alt="">
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <ul>
                            <li class="pb-3"><strong>{{$restaurant->name}}</strong></li>
                            <li><i class="fas fa-map-marker-alt pr-2"></i>{{$restaurant->address}}</li>
                            <li>P.IVA: {{$restaurant->p_iva}}</li>
                            <li>Telefono: {{$restaurant->telephone}}</li>
                        </ul>
                    </div>

                    <div class="col-md-3 col-sm-12 container-buttons py-2">
                        <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}"><i class="fas fa-store-alt" title="Ristorante"></i></a>
                        <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}"><i class="far fa-chart-bar" title="Statistiche"></i></a>
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
        <div class="col-md-12 d-flex justify-content-center mb-5 py-5">
            <a href="{{route('admin.restaurants.create')}}"><button class="my-btn-create" type="button" name="button">Crea</button></a>
        </div>

    </div>
</div>
</div>
@endsection
