import { isExternal, isEmpty, dropdownState } from '../util/helpers'

export default {
  init() {
    // JavaScript to be fired on all pages
    const anchors = document.querySelectorAll('a')
    const paragraphs = document.querySelectorAll('p')
    const hamburger = document.querySelector('.js-hamburger')
    const dropdowns = document.querySelectorAll('.menu-item-has-children')
    const hero = document.querySelector('.js-hero')
    const cards = document.querySelectorAll('.js-card')

    // Handle external urls
    anchors.forEach(anchor => {
      if (isExternal(anchor)) {
        // Define attributes to set
        const attributes = {
          target: '__blank',
          rel: 'noopener',
        }

        // Set attributes
        Object.keys(attributes).forEach(attribute => {
          anchor.setAttribute(attribute, attributes[attribute])
        })
      }
    })

    // Handle empty p tags
    paragraphs.forEach(isEmpty)

    // Handle hamburger toggle
    if (window.matchMedia('(max-width: 1199px)').matches) {
      if (hamburger) {
        hamburger.addEventListener('click', () => {
          document.body.classList.toggle('nav-is-open')
        })
      }
    }

    // Handle dropdowns visibility state
    if (window.matchMedia('(max-width: 1199px)').matches) {
      dropdowns.forEach(dropdown => {
        dropdown.setAttribute('data-state', 'closed')

        dropdown.addEventListener('click', dropdownState)
      })
    }

    // Handle hero background
    if (hero) {
      const mblHero = hero.dataset.mobile
      const dskHhero = hero.dataset.desktop

      if (mblHero && dskHhero) {
        if (window.matchMedia('(min-width: 1024px)').matches) {
          hero.style.backgroundImage = `url(${dskHhero})`
        } else {
          hero.style.backgroundImage = `url(${mblHero})`
        }
      }
    }

    // Handle portals & featured listings
    if (window.matchMedia('(max-width: 1023px)').matches) {
      if ($('.js-portals').length) {
        $('.js-portals').slick({
          accessibility: true,
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 5000,
          arrows: false,
          dots: true,
          fade: false,
          pauseOnFocus: false,
          pauseOnHover: false,
          speed: 1000,
          slidesToShow: 2,
          slidesToScroll: 2,
          responsive: [
            {
              breakpoint: 415,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        })
      }

      if ($('.js-listings').length) {
        $('.js-listings').slick({
          accessibility: true,
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 5000,
          arrows: false,
          dots: true,
          fade: false,
          pauseOnFocus: false,
          pauseOnHover: false,
          speed: 1000,
          slidesToShow: 2,
          slidesToScroll: 2,
          responsive: [
            {
              breakpoint: 415,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        })
      }
    }

    // Handle testimonials
    if ($('.js-testimonials').length) {
      $('.js-testimonials').slick({
        accessibility: true,
        adaptiveHeight: true,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        dots: true,
        fade: true,
        pauseOnFocus: false,
        pauseOnHover: false,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
      })
    }

    // Handle cards
    if (cards) {
      cards.forEach(card => {
        const mblCard = card.dataset.mobile
        const dskCard = card.dataset.desktop

        if (mblCard && dskCard) {
          if (window.matchMedia('(min-width: 1024px)').matches) {
            card.style.backgroundImage = `url(${dskCard})`
          } else {
            card.style.backgroundImage = `url(${mblCard})`
          }
        }
      })
    }

    // Handle listing carousel
    if ($('.js-carousel-gallery').length) {
      $('.js-carousel-gallery').slick({
        arrows: true,
        asNavFor: '.js-carousel-thumbs',
        dots: false,
        fade: true,
        prevArrow: '<button type="button" class="absolute top-half left-slick-arrow z-50 w-icon h-icon slick-prev" aria-labelledby="slick-prev"><span id="slick-prev" hidden>Previous</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="fill-white"><path d="M231.293 473.899l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L70.393 256 251.092 74.87c4.686-4.686 4.686-12.284 0-16.971L231.293 38.1c-4.686-4.686-12.284-4.686-16.971 0L4.908 247.515c-4.686 4.686-4.686 12.284 0 16.971L214.322 473.9c4.687 4.686 12.285 4.686 16.971-.001z"/></svg></button>',
        nextArrow: '<button type="button" class="absolute top-half right-slick-arrow z-50 w-icon h-icon slick-next" aria-labelledby="slick-next"><span id="slick-next" hidden>Next</span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="fill-white"><path d="M24.707 38.101L4.908 57.899c-4.686 4.686-4.686 12.284 0 16.971L185.607 256 4.908 437.13c-4.686 4.686-4.686 12.284 0 16.971L24.707 473.9c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L41.678 38.101c-4.687-4.687-12.285-4.687-16.971 0z"/></svg></button>',
        rows: 0,
        slidesToShow: 1,
        slidesToScroll: 1,
      })
    }

    // Handle listing thumbs
    if ($('.js-carousel-thumbs').length) {
      $('.js-carousel-thumbs').slick({
        arrows: false,
        asNavFor: '.js-carousel-gallery',
        autoplay: true,
        dots: false,
        focusOnSelect: true,
        rows: 0,
        slidesToShow: 5,
        slidesToScroll: 5,
      })
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
