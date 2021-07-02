@extends('layouts.app')

@section('content')
  <div id="statistics_index_main">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
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
