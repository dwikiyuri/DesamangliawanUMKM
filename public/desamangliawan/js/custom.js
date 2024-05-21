jQuery(document).ready(function ($) {
  "use strict";

  $(".accordion > li:eq(0) a").addClass("active").next().slideDown();

  $(".accordion a").click(function (j) {
    var dropDown = $(this).closest("li").find(".content");

    $(this).closest(".accordion").find(".content").not(dropDown).slideUp();

    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
    } else {
      $(this).closest(".accordion").find("a.active").removeClass("active");
      $(this).addClass("active");
    }

    dropDown.stop(false, true).slideToggle();

    j.preventDefault();
  });
});
