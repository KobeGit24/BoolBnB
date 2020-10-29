require('./bootstrap');

window.$ = require('jquery');

var Handlebars = require("handlebars");


function init() {

  searchProperties();
  headerColor();
}

// FUNZIONE PER CALCOLO KM DI DISTANZA


function degreesToRadians(degrees) {
  return degrees * Math.PI / 180;
}

function getDistance(lat1, lon1, lat2, lon2) {
  var earthRadiusKm = 6371;

  var dLat = degreesToRadians(lat2-lat1);
  var dLon = degreesToRadians(lon2-lon1);

  lat1 = degreesToRadians(lat1);
  lat2 = degreesToRadians(lat2);

  var a =   Math.sin(dLat/2) * Math.sin(dLat/2) + Math.sin(dLon/2)
            * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2);

  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));

  return Math.ceil(earthRadiusKm * c);
}

// FUNZIONE PER CHIAMATA API DELLE CASE

function searchProperties() {

  var latInput = $('#lat').val();
  var lngInput = $('#lng').val();

  // console.log(lat);
  // console.log(lng);

  $.ajax({

    url: 'http://127.0.0.1:8000/api/reseach',
    method: 'GET',
    success: function (properties) {

      var target = $('#property-wall');
      target.html('');

      var template = $('#property-template').html();
      var compiled = Handlebars.compile(template);

      for (var i = 0; i < properties.length; i++) {

        var property = properties[i];

        var latProp = property.lat;
        var lngProp = property.lng;

        var validDistance = getDistance(latInput,lngInput,latProp,lngProp) <= 20;

        var propertyHTML = compiled(property);

        if (validDistance) {

          target.append(propertyHTML);
        }
      }


    },
    error: function (err) {

      console.log('error: ', err);
    }
  });
}

// Funzione per lo scroll dell'header

function headerColor() {

  $(window).scroll(function () {
    var $this = $(this),
    $head = $('.navbar-header');
    if ($this.scrollTop() > 20) {
      $head.addClass('scrolled');
    } else {
      $head.removeClass('scrolled');
    }
  });
}

$(document).ready(init)
