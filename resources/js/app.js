require('./bootstrap');

window.$ = require('jquery');

var Handlebars = require("handlebars");


function init() {

  getAutocompletePlaces();
  searchProperties();
}

// FUNZIONE PER PRENDERE LATITUDINE E LONGITUDINE

function getAutocompletePlaces() {

  var placesAutocomplete = places({
    appId: 'pl6JIIW6OD7S',
    apiKey: '7748a0e1bed4673c3861620b3abcc682',
    container: document.querySelector('#aa-search-input')
  });

  placesAutocomplete.on('change', function(e) {

    // console.log(e.suggestion);
    // console.log(e.suggestion.latlng.lng);
    // console.log(e.suggestion.latlng.lat);

    $('#aa-search-input').val(e.suggestion.value);
    $('#lat').val(e.suggestion.latlng.lat);
    $('#lng').val(e.suggestion.latlng.lng);

    // console.log("latitudine: ", $('#lat').val());
    // console.log("longitudine: ", $('#lng').val());
  });

  placesAutocomplete.on('clear', function() {
    $('#address').val('');
    $('#lat').val('');
    $('#lng').val('');
  });

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

$(document).ready(init)



// FUNZIONE ALGOLIA PER LA RICERCA PERSONALIZZATA

// function algoliaResearchTest() {
//
// const client = algoliasearch('pl2XLKD9B9UN', '896e1ed6fd58893fa84cd9cac2d60597');
// // const players = client.initIndex('BoolBnB');
//
// autocomplete(
//   '#aa-search-input',
//   {
//     debug: true,
//     templates: {
//       dropdownMenu:
//         '<div class="aa-dataset-player"></div>' +
//         '<div class="aa-dataset-team"></div>',
//     },
//   },
//   [
//     {
//       source: autocomplete.sources.hits(players, {hitsPerPage: 7}),
//       displayKey: 'city',
//       templates: {
//         header: '<div class="aa-suggestions-category"></div>',
//         suggestion({_highlightResult}) {
//           return `<span>${_highlightResult.city.value}</span>`;
//         },
//         empty: '<div class="aa-empty">No matching city</div>',
//       },
//     }
//   ]
// );
//
// }
