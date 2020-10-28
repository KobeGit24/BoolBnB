require('./bootstrap');

window.$ = require('jquery');

var Handlebars = require("handlebars");


function init() {

  searchProperties();
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
  var rad = $( "select#radius option:checked" ).val();

  // console.log(lat);
  // console.log(lng);

  $.ajax({

    url: 'http://127.0.0.1:8000/api/search',
    method: 'GET',
    success: function (properties) {

      // console.log(properties);
      // console.log(properties.sponsored);
      // console.log(properties.normal);

      var sponsoredProp = properties.sponsored;
      var normalProp = properties.normal;

      // console.log(normalProp);

      var targetPromo = $('#property-wall-promo');
      targetPromo.html('');

      var templatePromo = $('#property-template').html();
      var compiled = Handlebars.compile(templatePromo);

      for (var i = 0; i < sponsoredProp.length; i++) {

        var propertySponsor = sponsoredProp[i];

        var latPropSponsor = propertySponsor.lat;
        var lngPropSponsor = propertySponsor.lng;

        var validDistance = getDistance(latInput,lngInput,latPropSponsor,lngPropSponsor) <= rad;

        var propertySponsorHTML = compiled(propertySponsor);

        if (validDistance) {

          targetPromo.append(propertyHTML);
        }
      }

      var target = $('#property-wall');
      target.html('');

      var template = $('#property-template').html();
      var compiled = Handlebars.compile(template);

      for (var i = 0; i < normalProp.length; i++) {

        var property = normalProp[i];

        var latProp = property.lat;
        var lngProp = property.lng;

        var validDistance = getDistance(latInput,lngInput,latProp,lngProp) <= rad;

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

$(document).ready(init)
