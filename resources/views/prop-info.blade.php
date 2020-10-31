@extends('layouts.app')

<style>

  #prop-info{
    width: 70%;
    margin: 100px auto;
    display: flex;
    justify-content: space-around;
  }

  #messaggi,
  #statistics {
    width: 100%;
    text-align: center;
  }


</style>

@section('content')

  <div id="prop-info">

    <div id="messaggi">
      <h2>messaggi</h2>
      <ul>
        @foreach ($requests as $request)
          <li>
            {{ $request-> firstname }}<br>
            {{ $request-> lastname }}<br>
            {{ $request-> text }}
          </li>
        @endforeach
      </ul>


    </div>

    <div id="statistics">
      <h2>statistiche</h2>
      <canvas id="myChart"></canvas>
      <p>
        Total Views: <span id="views"> {{ $viewsNumber }} </span>
      </p>

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
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          pointBackgroundColor:'rgb(255, 99, 132)',
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
