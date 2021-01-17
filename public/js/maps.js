(function($) {
  'use strict';
  if ($('#vmap').length) {
    jQuery('#vmap').vectorMap({
      map: 'world_en'
    });
  }
  if ($('#vmap-regions').length) {
    var activeNations = new Array("us", "de", "au", "gb", "ro", "br");

    jQuery('#vmap-regions').vectorMap({
      map: 'world_en',
      backgroundColor: 'transparent',
      borderOpacity: 0.01,
      borderWidth: 2,
      borderColor: '#000',
      color: '#e2e2e2',
      enableZoom: false,
      hoverColor: '#2796E9',
      hoverOpacity: null,
      normalizeFunction: 'linear',
      selectedColor: '#58D8A3',
      selectedRegions: activeNations,
      showTooltip: true,
      onRegionClick: function(element, code, region) {
        if (activeNations.indexOf(code) > -1) {
          // dom interaction outside the map
          // ...
        } else {
          element.preventDefault();
        }
      }
    });
  }
  if ($("#WorldMap").length) {
    var activeNations = new Array("us", "de", "au", "gb", "ro", "br");

    jQuery('#WorldMap').vectorMap({
      map: 'world_en',
      backgroundColor: 'transparent',
      borderOpacity: 0.01,
      borderWidth: 2,
      borderColor: '#000',
      color: '#e2e2e2',
      enableZoom: false,
      hoverColor: '#2796E9',
      hoverOpacity: null,
      normalizeFunction: 'linear',
      selectedColor: '#58D8A3',
      selectedRegions: activeNations,
      showTooltip: true,
      onRegionClick: function(element, code, region) {
        if (activeNations.indexOf(code) > -1) {
          // dom interaction outside the map
          // ...
        } else {
          element.preventDefault();
        }
      }
    });
  }
  if ($("#map-with-marker").length) {
    jQuery('#map-with-marker').vectorMap({
      map: 'world_en',
      backgroundColor: 'transparent',
      borderOpacity: 0.01,
      borderWidth: 2,
      borderColor: '#000',
      color: '#2796E9',
      enableZoom: true,
      hoverColor: '#2796E9',
      hoverOpacity: null,
      normalizeFunction: 'linear',
      selectedColor: '#58D8A3',
      showTooltip: true,
    });
  }
})(jQuery);

var map;
if ($('#map').length) {
  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: {
        lat: -34.397,
        lng: 150.644
      },
      zoom: 8
    });
  };
}