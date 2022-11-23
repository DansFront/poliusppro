new Glide(".relacionados", {
  type: 'carousel',
  gap: 40,
  perView: 3,
  width: 100,
  breakpoints: {
    1400: {
      perView: 3
    },
    992: {
      perView: 2,
    },
    768: {
      perView: 1,
    }
  }
}).mount()