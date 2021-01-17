(function($) {
  'use strict';
  var tour = new Tour({
    steps: [{
        element: "#tourElement1",
        title: "Welcome",
        content: "This is an example of bootstrap tour"
      },
      {
        element: "#tourElement2",
        title: "Question",
        content: "Type your question here"
      },
      {
        element: "#tourElement3",
        title: "Ask",
        content: "Click this button to post the question"
      },
      {
        element: "#tourElement4",
        title: "Answer",
        content: "Click here to answer questions."
      }
    ],
    container: '.content-wrapper'
  });
  if (tour.ended()) {
    tour.restart();
  } else {
    tour.init();
    tour.start();
  }
})(jQuery);