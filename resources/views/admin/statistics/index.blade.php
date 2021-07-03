@extends('layouts.app')

@section('content')
  <div id="statistics_index_main">
    <div class="container px-3">
      <div class="row justify-content-center">
        <div class="col-md-12 flex justify-content-center flex-column align-items-center">
          <div class="flex flex-row flex-wrap justify-content-center">
            <button class="my-btn-black mx-1 mt-2" v-for="(year, i) in years" @click="scelta(years[i])" type="button" name="button">@{{years[i]}}</button>
          </div>
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('foot-script')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="{{asset('js/statistics.js')}}" charset="utf-8"></script>
@endsection
