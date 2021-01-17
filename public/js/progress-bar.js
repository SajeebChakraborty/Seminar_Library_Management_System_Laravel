(function($) {
  'use strict';
  // ProgressBar JS Starts Here

  if ($('#Progressbar-1').length) {
    var bar = new ProgressBar.Line('#Progressbar-1', {
      step: function(state, bar, attachment) {
        bar.path.setAttribute('stroke', state.color);
      }
    });
    var opts = {
      from: {
        width: 0.1,
        color: '#f5f5f5 '
      },
      to: {
        color: '#36af47'
      }
    };
    bar.animate(0.7, opts);
  }

  if ($('#Progressbar-2').length) {
    var bar = new ProgressBar.Line('#Progressbar-2', {
      step: function(state, bar, attachment) {
        bar.path.setAttribute('stroke', state.color);
      }
    });
    var opts = {
      from: {
        color: '#f5f5f5 '
      },
      to: {
        color: '#ed1c24'
      }
    };
    bar.animate(0.8, opts);
  }

  if ($('#Progressbar-3').length) {
    var bar = new ProgressBar.Line('#Progressbar-3', {
      step: function(state, bar, attachment) {
        bar.path.setAttribute('stroke', state.color);
      }
    });
    var opts = {
      from: {
        color: '#f5f5f5 '
      },
      to: {
        color: '#2ca0f7'
      }
    };
    bar.animate(0.66, opts);
  }

  if ($('#Progressbar-4').length) {
    var bar = new ProgressBar.Line('#Progressbar-4', {
      step: function(state, bar, attachment) {
        bar.path.setAttribute('stroke', state.color);
      }
    });
    var opts = {
      from: {
        color: '#f5f5f5 '
      },
      to: {
        color: '#f7981c'
      }
    };
    bar.animate(0.99, opts);
  }
  // ProgressBar JS Ends Here

})(jQuery);