(function($) {
  'use strict';
  var startSlider = document.getElementById('ui-slider');
  noUiSlider.create(startSlider, {
    start: [20],
    connect: [true, false],
    range: {
      'min': [0],
      'max': [100]
    }
  });

  var rangeSlider = document.getElementById('ui-range-slider');
  noUiSlider.create(rangeSlider, {
    start: [30, 40],
    connect: [false, true, false],
    range: {
      'min': [0],
      'max': [100]
    }
  });

  var connectSlider = document.getElementById('ui-slider-colored-1');
  noUiSlider.create(connectSlider, {
    start: 30,
    connect: [true, false],
    range: {
      'min': 0,
      'max': 100
    }
  });

  var connectSlider = document.getElementById('ui-slider-colored-2');
  noUiSlider.create(connectSlider, {
    start: 40,
    connect: [true, false],
    range: {
      'min': 0,
      'max': 100
    }
  });

  var connectSlider = document.getElementById('ui-slider-colored-3');
  noUiSlider.create(connectSlider, {
    start: 50,
    connect: [true, false],
    range: {
      'min': 0,
      'max': 100
    }
  });

  var connectSlider = document.getElementById('ui-slider-colored-4');
  noUiSlider.create(connectSlider, {
    start: 60,
    connect: [true, false],
    range: {
      'min': 0,
      'max': 100
    }
  });

  var slider = document.getElementById('ui-slider-multi-colored');
  noUiSlider.create(slider, {
    start: [4000, 8000, 12000, 16000],
    connect: [false, true, true, true, true],
    range: {
      'min': [2000],
      'max': [20000]
    }
  });
  var connect = slider.querySelectorAll('.noUi-connect');
  var classes = ['bg-warning', 'bg-success', 'bg-info', 'bg-danger'];
  for (var i = 0; i < connect.length; i++) {
    connect[i].classList.add(classes[i]);
  }

})(jQuery);