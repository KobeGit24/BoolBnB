require('./bootstrap');

window.Vue = require('vue');
window.$ = require('jquery');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//
// const app = new Vue({
//     el: '#app',
// });

function init() {

  getAutocompletePlaces();
}

function getAutocompletePlaces() {

  var placesAutocomplete = places({
    appId: 'pl6JIIW6OD7S',
    apiKey: '7748a0e1bed4673c3861620b3abcc682',
    container: document.querySelector('#aa-search-input')
  });

  placesAutocomplete.on('change', function(e) {

    console.log(e.suggestion);
    console.log(e.suggestion.latlng.lng);
    console.log(e.suggestion.latlng.lat);

    var lat = e.suggestion.latlng.lng
    var lat = e.suggestion.latlng.lat
    var city = e.suggestion.name

    sessionStorage.setItem('long', e.suggestion.latlng.lng)
    sessionStorage.setItem('lat', e.suggestion.latlng.lat);
    sessionStorage.setItem('city', e.suggestion.name);
  });

}

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

$(document).ready(init)
