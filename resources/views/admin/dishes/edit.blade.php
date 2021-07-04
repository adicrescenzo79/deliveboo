@extends('layouts.app')

@section('content')
  <div id="main-admin-dishes-edit">
    <div class="container pb-5">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <h3>Modifica Piatto</h3>
          <h5>Ristorante {{$dish->restaurant->name}}</h5>
          <form action="{{route('admin.dishes.update', ['dish' => $dish->id] )}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
              <label for="name">Nome del Piatto</label>
              <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name', $dish->name)}}" placeholder="Nome del Piatto">
                @error('name')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="8" cols="80" name="description"> {{ old('description', $dish->description)}} </textarea>
                  @error('description')
                    <small class="text-danger">{{ $message }}</small>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="price">Prezzo</label>
                  <input step="0.10" class="form-control @error('price') is-invalid @enderror" id="price" type="number" name="price" value="{{old('price',  $dish->price)}}" placeholder="Prezzo">
                    @error('price')
                      <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="image">Immagine</label>
                    @if ($dish->image)
                      <div class="">
                        <img style="width: 50px;" class="image" src="{{ asset($dish->image) }}" alt="">
                        <small class="text-danger">Attuale</small>
                      </div>
                    @endif
                    <input class="form-control no-border @error('image') is-invalid @enderror" id="image" type="file" name="image" >
                      @error('image')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>

                    <div class="form-group">

                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="visibility" id="visible" value="1" {{ ($dish->visibility == 1) ? "checked" : "" }}>
                        <label class="form-check-label" for="visible">
                          Visibile
                        </label>
                      </div>

                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="visibility" id="invisible" value="0" {{ ($dish->visibility == 0) ? "checked" : "" }}>
                        <label class="form-check-label" for="invisible">
                          Non Visibile
                        </label>
                      </div>
                    </div>


                    <div class="d-flex justify-content-center py-5">
                      <input class="my-btn my-btn-create" type="submit" name="" value="Salva le modifiche">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endsection
