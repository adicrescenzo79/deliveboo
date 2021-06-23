@extends('layouts.app')

@section('content')
<div id="home">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Crea Piatto</h3>
                <form action="{{route('admin.restaurants.dishes.store', ['restaurant' => $restaurant] )}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="name">Nome del Piatto</label>
                        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{old('name')}}" placeholder="Nome del Piatto">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="8" cols="80" name="description"> {{ old('description') }} </textarea>
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Prezzo</label>

                        <input step="0.10" class="form-control @error('price') is-invalid @enderror" id="price" type="number" name="price" value="{{old('price')}}" placeholder="Prezzo">
                        @error('price')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Imagine</label>
                        <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" name="image" value="{{old('image')}}">
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visibility" id="visible" value="1" checked>
                            <label class="form-check-label" for="visible">
                                Visibile
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visibility" id="invisible" value="0">
                            <label class="form-check-label" for="invisible">
                              Non Visibile
                            </label>
                        </div>

                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>



                    <input class="btn btn-primary" type="submit" name="" value="Crea">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection