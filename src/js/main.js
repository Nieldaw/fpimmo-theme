jQuery(document).ready(function ($) {
  $(".galleryWrapper").magnificPopup({
    delegate: "div",
    type: "image",
  });

  if ($(".testimonials-slider").length) {
    $(".flickity-wrapper").flickity({
      wrapAround: true,
      autoPlay: true,
      pageDots: false,
      cellAlign: "center",
      adaptiveHeight: true,
    });
  }
});
