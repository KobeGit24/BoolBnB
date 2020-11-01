@extends('layouts.app')

@section('content')

  <div class="card-width">
    <div class="card card-shadow m-3">
      <div class="card-header input-title-text text-center">
        {{ __('Statistiche') }}
      </div>
      <div class="card-body">
        <h5 class="card-title">
          Total Views: <span id="views"> {{ $viewsNumber }} </span>
        </h5>
        <p class="card-text">
          <canvas id="myChart"></canvas>
        </p>
      </div>
    </div>
    <div class="card card-shadow m-3">
      <div class="card-header input-title-text text-center">
        {{ __('Messaggi') }}
      </div>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text">
          <ul>
            @foreach ($requests as $request)
              <li>
                <strong>From: </strong>
                {{ $request-> firstname }} {{ $request-> lastname }}
                <br>
                <strong>Message: </strong>
                {{ $request-> text }}
              </li>
              <hr>
            @endforeach
          </ul>
        </p>
      </div>
    </div>
  </div>

  <script>

  var dayToday = moment().format('dddd');
  var dayYesterday = moment().hour(-24).format('dddd');
  var dayTwoDaysAgo = moment().hour(-48).format('dddd');
  var dayThreeDaysAgo = moment().hour(-72).format('dddd');
  var dayFoueDaysAgo = moment().hour(-96).format('dddd');
  var dayFiveDaysAgo = moment().hour(-120).format('dddd');
  var daySixDaysAgo = moment().hour(-144).format('dddd');

  var views = document.getElementById('views').textContent;
  var viewsNum = parseInt(views);

  var ctx = $('#myChart')[0].getContext('2d');
  var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
          daySixDaysAgo,
          dayFiveDaysAgo,
          dayFoueDaysAgo,
          dayThreeDaysAgo,
          dayTwoDaysAgo,
          dayYesterday,
          dayToday
        ],
        datasets: [{
          label: 'Apartament Views',
          backgroundColor: '#0066ff',
          borderColor: '#0066ff',
          pointBackgroundColor:'#0066ff',
          data: [
            0,
            5,
            10,
            15,
            20,
            25,
            viewsNum
          ]
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  </script>


@endsection
