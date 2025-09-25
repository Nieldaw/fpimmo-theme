jQuery(document).ready(function ($) {
  $(".galleryWrapper").magnificPopup({
    delegate: "div",
    type: "image",
  });

  if ($(".testimonials-slider").length) {
    $(".testimonials-flickity-wrapper").flickity({
      wrapAround: true,
      autoPlay: true,
      pageDots: false,
      cellAlign: "center",
      adaptiveHeight: true,
    });
  }
  if ($(".biens-slider").length) {
    $(".biens-flickity-wrapper").flickity({
      wrapAround: true,
      autoPlay: true,
      pageDots: false,
      cellAlign: "center",
      adaptiveHeight: true,
    });
  }
});
