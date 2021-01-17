(function($) {
  'use strict';
  if ($(".circle-progress").length) {
    $('.circle-progress').circleProgress({
      fill: {
        color: "#fff"
      }
    });
  }
  if ($(".yearly-progress").length) {
    $('.yearly-progress').circleProgress({
      value: 0.80,
      thickness: 13,
      startAngle: 45,
      fill: {
        color: "#03D751"
      }
    }).on('circle-animation-progress', function(event, progress) {
      $(this).find('.value').html(Math.round(80 * progress) + '<i>%</i>');
    });
  }
  if ($(".monthly-progress").length) {
    $('.monthly-progress').circleProgress({
      value: 0.45,
      thickness: 13,
      startAngle: 45,
      fill: {
        color: "#57008E"
      }
    }).on('circle-animation-progress', function(event, progress) {
      $(this).find('.value').html(Math.round(45 * progress) + '<i>%</i>');
    });
  }
})(jQuery);