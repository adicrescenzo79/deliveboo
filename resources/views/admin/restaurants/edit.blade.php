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
              @if ($errors->any())
              <div class="alert alert-danger">
                 <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              <form action="{{route('admin.restaurants.update', ['restaurant'=>$restaurant->id])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="text" name="name" value="{{$restaurant->name}}">
                <input type="text" name="address" value="{{$restaurant->address}}">
                <input type="text" name="telephone" value="{{$restaurant->telephone}}">
                <input type="text" name="p_iva" value="{{$restaurant->p_iva}}">
                <input type="file" name="logo" value="{{$restaurant->logo}}">
                @error('logo')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                <input type="file" name="cover_image" value="{{$restaurant->cover_image}}">
                @error('cover_image')
                <small class="text-danger">{{ $message }}</small>
                @enderror

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
