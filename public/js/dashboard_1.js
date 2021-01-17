(function($) {
  'use strict';

  if ($("#dashboard-card-chart-1").length) {
    var d1 = [];
    var options = {};
    $.plot($("#dashboard-card-chart-1"), [{
        data: d1 = [
          [0, 1],
          [1, 14],
          [2, 3],
          [3, 22],
          [4, 10],
          [5, 17],
          [6, 2],
          [7, 34],
          [8, 7]
        ],
        lines: {
          show: true,
          fill: 0.18
        },
        label: 'Product A',
        stack: false,
        color: '#9B61EE'
      }],
      options = {
        series: {
          shadowSize: 0,
          lines: {
            show: true,
          },
        },
        grid: false,
        xaxis: false,
        yaxis: false,
        legend: false
      });
  }

  if ($("#dashboard-card-chart-2").length) {
    var d1 = [];
    var options = {};
    $.plot($("#dashboard-card-chart-2"), [{
        data: d1 = [
          [0, 1],
          [1, 5],
          [2, 22],
          [3, 9],
          [4, 14],
          [5, 6],
          [6, 19],
          [7, 17],
          [8, 9]
        ],
        lines: {
          show: true,
          fill: 0.18
        },
        label: 'Product A',
        stack: false,
        color: '#70E400 '
      }],
      options = {
        series: {
          shadowSize: 0,
          lines: {
            show: true,
          },
        },
        grid: false,
        xaxis: false,
        yaxis: false,
        legend: false
      });
  }

  if ($("#dashboard-card-chart-3").length) {
    var d1 = [];
    var options = {};
    $.plot($("#dashboard-card-chart-3"), [{
        data: d1 = [
          [0, 1],
          [1, 20],
          [2, 18],
          [3, 4],
          [4, 8],
          [5, 1],
          [6, 16],
          [7, 18],
          [8, 10]
        ],
        lines: {
          show: true,
          fill: 0.18
        },
        label: 'Product A',
        stack: false,
        color: '#FFAF00'
      }],
      options = {
        series: {
          shadowSize: 0,
          lines: {
            show: true,
          },
        },
        grid: false,
        xaxis: false,
        yaxis: false,
        legend: false
      });
  }

  if ($("#dashboard-card-chart-4").length) {
    var d1 = [];
    var options = {};
    $.plot($("#dashboard-card-chart-4"), [{
        data: d1 = [
          [0, 1],
          [1, 17],
          [2, 8],
          [3, 22],
          [4, 19],
          [5, 9],
          [6, 22],
          [7, 16],
          [8, 14]
        ],
        lines: {
          show: true,
          fill: 0.18
        },
        label: 'Product A',
        stack: false,
        color: '#FF0028'
      }],
      options = {
        series: {
          shadowSize: 0,
          lines: {
            show: true,
          },
        },
        grid: false,
        xaxis: false,
        yaxis: false,
        legend: false
      });
  }

  if ($('#dashboard-chartist-simple').length) {
    var chart = new Chartist.Line('#dashboard-chartist-simple', {
      labels: ['1 Jan', '3 Feb', '2 Mar', '2 Apr', '1 May', '2 Jul', '2 Aug'],
      series: [{
          "name": "New users",
          "data": [1, 5, 2, 5, 4, 3, 6, 1]
        },
        {
          "name": "Existing Users",
          "data": [1, 3, 4, 8, 1, 3, 8, 4]
        }
      ]
    }, {
      fullWidth: true,
      showPoint: false,
      chartPadding: {
        right: 0,
        left: 0,
        top: 0,
        bottom: 0
      },
      axisX: {
        showLabel: false,
        showGrid: false
      },
      axisX: {
        showLabel: true,
        showGrid: false
      },
      plugins: [
        Chartist.plugins.legend()
      ]
    });

    chart.on('draw', function(data) {
      if (data.type === 'line' || data.type === 'area') {
        data.element.animate({
          d: {
            begin: 1000 * data.index,
            dur: 2000,
            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
            to: data.path.clone().stringify(),
            easing: Chartist.Svg.Easing.easeOutQuint
          }
        });
      }
    });
  }

  if ($("#sparkline-line-chart").length) {
    $("#sparkline-line-chart").sparkline([5, 9, 13, 2, 6, 1, 10, 2, 8, 12, 4], {
      type: 'line',
      width: '100%',
      height: '100%'
    });
  }

})(jQuery);