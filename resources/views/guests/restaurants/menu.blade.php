@extends('layouts.app')

@section('content')
  <div id="main_menu">
    {{-- Sezione dei piatti --}}
    <section id="dishes">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="content-dishes">
              <ul>
                <li v-for="dish in dishes">@{{dish.name}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
@endsection

@section('foot-script')
  <script src="{{asset('js/menu.js')}}" charset="utf-8"></script>
@endsection
