@extends('layouts.app')

@section('content')
<div id="home">
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
              <h3>Crea Ristorante</h3>
              @if ($errors->any())
              <div class="alert alert-danger">
                 <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif

              <form action="{{route('admin.restaurants.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input type="text" name="name" value="" placeholder="Nome">
                <input type="text" name="address" value="" placeholder="Indirizzo">
                <input type="text" name="telephone" value="" placeholder="Telefono">
                <input type="text" name="p_iva" value="" placeholder="Partita Iva">
                <input type="file" name="logo" value="" placeholder="Logo">
                <input type="file" name="cover_image" value="" placeholder="Immagine Cover">
                <input type="submit" name="" value="Crea">
              </form>
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
