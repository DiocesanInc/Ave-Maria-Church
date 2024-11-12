jQuery(document).ready(function ($) {
  document.onreadystatechange = function () {

  if (document.readyState == 'complete')
  {
      AOS.refresh();
  }
  }
  const phone = 576;
  const tablet = 768;
  const laptop = 1024;
  const desktop = 1200;

    /** Landing Slider */
  $(".page-template-landing .landingWrapper").slick({
  autoplay: false,
  arrows: true,
  autoplaySpeed: 5000,
  cssEase: "linear",
  dots: false,
  arrows: true,
  fade: true,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  asNavFor: '.page-template-landing .slideLinks'
  });
  $(".page-template-landing .slideLinks").slick({
    autoplay: false,
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    arrows: false,
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: '.page-template-landing .landingWrapper'
  });
    /** Hero Slider */
  $(".page-template-homepage .hero-slider").slick({
    autoplay: false,
    arrows: true,
    cssEase: "linear",
    dots: false,
    fade: true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.page-template-homepage .slideLinks, .slideTitleMobile'
  });
  $(".page-template-homepage .slideLinks").slick({
    autoplay: false,
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    arrows: false,
    slidesToShow: 6,
    slidesToScroll: 1,
    asNavFor: '.page-template-homepage .hero-slider, .slideTitleMobile'
  });
  $(".page-template-homepage .slideTitleMobile").slick({
    autoplay: false,
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.page-template-homepage .hero-slider, .slideLinks'
  });


  $(".page-template-homepage .parishScroll .testimonials-carousel").slick({
    autoplay: false,
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    arrows: true,
    vertical: true,
    verticalSwiping: true,
    swipeToSlide: true,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  /* The following two slick sliders are for the Parish Map Cluster */
  //Slider for Maps
  $(".page-template-homepage .parish-maps-wrapper").slick({
    autoplay: false,
    dots: false,
    centerMode: true,
    focusOnSelect: false,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    swipe: false,
    slide: '.parish-map',
    asNavFor: '.parish-map-slider'
  });
  //Slider for Parish Information
  $(".page-template-homepage .parish-map-slider").slick({
    autoplay: false,
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.parish-maps-wrapper'
  });
  jQuery('.parish-text-wrapper .slick-prev').on('click', function(){
    jQuery('.parish-maps').slick("slickPrev");
  });
  jQuery('.parish-text-wrapper .slick-next').on('click', function(){
    jQuery('.parish-maps').slick("slickNext");
  });

    $(".page-template-homepage .featured-buttons-wrapper").slick({
      autoplay: false,
      dots: false,
      arrows: true,
      cssEase: "linear",
      slidesToShow: 5,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1360,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 1025,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 426,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
      ]
    });

  /** Featured Content & News Slider */
  $(
    ".featured-content-container .featured-content-slider, .news-container .news-slider"
  ).slick({
    autoplay: false,
    arrows: true,
    dots: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
      {
        breakpoint: tablet,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: laptop,
        settings: {
          slidesToShow: 3,
        },
      },
    ],
  });

  /** Get Pagination Style (arrows or dots) for Image Slider */
  const paginationStyle = $(".image-slider-container").attr(
    "data-pagination-style"
  );

  /** set on slick init listener for Image Slider */
  $(".image-slider-container").on("init", function () {
    addAOS();

    /** Set Classes and data-attributes for Slides on sliding image */
    $(".image-slider-container").on("afterChange", function () {
      toggleAOS();
      AOS.refreshHard();
    });
  });

  function toggleAOS() {
    removeAOS();
    addAOS();
  }

  const $imageSliderQuote = $(
    ".page-template-homepage .image-slider-container[data-isanimated=true] .slick-slide.slick-current .teaser-content-wrapper"
  );

  function addAOS() {
    $imageSliderQuote.attr("data-aos", "fade-right");
  }

  function removeAOS() {
    $imageSliderQuote.removeAttr("data-aos");
  }

  /** Init Image Slider */
  $(".image-slider-container").slick({
    autoplay: false,
    arrows: paginationStyle === "arrows" ? true : false,
    dots: paginationStyle === "dots" ? true : false,
    infinite: paginationStyle === "arrows" ? true : false,
    slidesToScroll: 1,
    slidesToShow: 1,
  });

  const $sliderArrows = $(
    ".featured-content-container[data-isanimated=true] .slick-arrow, .image-slider-container[data-isanimated=true] .slick-arrow, .news-container[data-isanimated=true] .slick-arrow"
  );
  $sliderArrows.attr("data-aos", "fade-down");

  /** Ministry Slider */
  $(".ministries-container .ministry-slider .ministry-group").slick({
    autoplay: false,
    arrows: true,
    dots: false,
    infinite: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    slide: ".ministry-wrapper",
    responsive: [
      {
        breakpoint: tablet,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: laptop,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: desktop,
        settings: {
          slidesToShow: 4,
        },
      },
    ],
  });
});
