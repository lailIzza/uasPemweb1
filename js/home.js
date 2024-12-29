$(document).ready(() => {
  $("#hamburger-menu").click(() => {
    $("#hamburger-menu").toggleClass("active");
    $("#nav-menu").toggleClass("active");
  });

  let navText = [
    "<i class='bx bx-chevron-left'></i>",
    "<i class='bx bx-chevron-right'></i>",
  ];

  $("#hero-carousel").owlCarousel({
    items: 1,
    dots: false,
    loop: true,
    nav: true,
    navText: navText,
    autoplay: true,
    autoplayHoverPause: true,
  });

  $(".movies-slide").owlCarousel({
    items: 2,
    dots: false,
    nav: true,
    navText: navText,
    margin: 45,
    responsive: {
      500: {
        items: 4,
      },
      1280: {
        items: 4,
      },
      1600: {
        items: 6,
      },
    },
  });
});