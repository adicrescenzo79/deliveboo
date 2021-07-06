@extends('layouts.app')

@section('content')
<div id="main-restaurants-edit">
  <div class="container pb-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
            <h3>Modifica Ristorante</h3>
            <form action="{{route('admin.restaurants.update', ['restaurant' => $restaurant->id])}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PATCH')

              <div class="form-group">
                <label for="name">Nome del Ristorante</label>
                <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name', $restaurant->name)}}" placeholder="Nome del ristorante">
                @error('name')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="address">Indirizzo</label>
                <input class="form-control @error('address') is-invalid @enderror" id="address"type="text" name="address" value="{{old('address', $restaurant->address)}}" placeholder="Indirizzo, n.civico, Città">
                  @error('address')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="form-group">
                <label for="telephone">Numero di telefono</label>
                <input class="form-control @error('telephone') is-invalid @enderror" id="telephone" type="text" name="telephone" value="{{old('telephone', $restaurant->telephone)}}" placeholder="Telefono">
                  @error('telephone')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="form-group">
                <label for="p_iva">Partita IVA</label>
                <input class="form-control @error('p_iva') is-invalid @enderror" id="p_iva" type="text" name="p_iva" value="{{old('p_iva', $restaurant->p_iva)}}" placeholder="Partita Iva">
                  @error('p_iva')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="form-group">

                <label for="logo">Logo</label>
                @if ($restaurant->logo)
                  <div class="">
                    <img style="width: 50px;" class="logo" src="{{asset($restaurant->logo)}}" alt="">
                    <small class="text-danger">Attuale</small>
                  </div>
                @endif
                <input class="form-control no-border @error('logo') is-invalid @enderror" id="logo" type="file" name="logo"  placeholder="Logo">
                  @error('logo')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="form-group">

                <label for="cover_image">Immagine di copertina</label>
                @if ($restaurant->cover_image)
                  <div class="">
                    <img style="width: 50px;" class="cover_image" src="{{asset($restaurant->cover_image)}}" alt="">
                    <small class="text-danger">Attuale</small>
                  </div>
                @endif
                <input class="form-control no-border @error('cover_image') is-invalid @enderror" id="cover_image" type="file" name="cover_image" value="{{old('cover_image', $restaurant->cover_image)}}" placeholder="Immagine Cover">
                  @error('cover_image')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
              </div>

              <div class="form-group">
                <label for="categories">Categorie</label> <br>
                  @foreach ($categories as $category)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input @error('category_ids') is-invalid @enderror" type="checkbox" name="category_ids[]" value="{{$category->id}}" id="{{$category->id}}" {{$restaurant->categories->contains($category) ? 'checked' : ''}} >
                      <label class="form-check-label" for="{{$category->id}}">
                        {{$category->name}}
                      </label>
                    </div>
                    @error('category_ids')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  @endforeach
              </div>

              <div class="d-flex justify-content-center py-5">
                <input class="my-btn-create" type="submit" name="" value="Salva le modifiche">
              </div>
            </form>
      </div>

    </div>
  </div>
</div>
@endsection
