document.addEventListener('DOMContentLoaded', () => {
  document.querySelector('body').classList.add('js-active');
  const sr = ScrollReveal({ distance: '60px', duration: 1000, delay: 250 });

  NodeList.prototype.forEach = function(callback, thisArg) {
    thisArg = thisArg || window;
    for (var i = 0; i < this.length; i++) {
      callback.call(thisArg, this[i], i, this);
    }
  };

  /**
   * toggleMobileMenu.
   *
   * Toggle class names used for mobile menu styles
   */
  function toggleMobileMenu() {
    document.querySelector('html').classList.toggle('mobile-menu-open');
    document.querySelector('.hamburger').classList.toggle('is-active');
    document.querySelector('.header__toggle').classList.toggle('is-active');
    document.querySelector('.header').classList.toggle('is-active');
    document.querySelector('.js-search').classList.toggle('open');
    document.querySelector('nav').classList.toggle('is-active');
  }

  /**
   * toggleSubMenu.
   *
   * Calculate total height of submenu items and apply to submenu max-height
   */
  function toggleSubMenu() {
    const submenu = this.querySelector('.sub-menu');
    const children = submenu.children;
    let totalHeight = 0;

    if (window.innerWidth < 1025) {
      if (!submenu.classList.contains('open')) {
        for (let i = 0; i < children.length; i++) {
          let child = children[i];

          let height = child.offsetHeight;
          let style = getComputedStyle(child);
          totalHeight +=
            height +
            parseInt(style.marginTop, 10) +
            parseInt(style.marginBottom, 10);
        }
        submenu.classList.add('open');
      } else {
        submenu.classList.remove('open');
      }

      submenu.style.maxHeight = `${totalHeight}px`;
    }
  }

  /**
   * headerMonitor()
   *
   * Check user scroll distance to apply a 'scrolled' style to the header
   */
  function headerMonitor() {
    const scrollTop =
      window.pageYOffset !== undefined
        ? window.pageYOffset
        : (
            document.documentElement ||
            document.body.parentNode ||
            document.body
          ).scrollTop;

    // Test if user has scrolled more than px value of header height
    if (scrollTop > 100) {
      document.querySelector('#js-header').classList.add('scrolled');
    } else {
      document.querySelector('#js-header').classList.remove('scrolled');
    }
  }

  /**
   * toggleSearchState()
   *
   * Toggle .open class on search element
   */
  function toggleSearchState() {
    let search = document.querySelector('.js-search');

    if (search.classList.contains('open')) {
      search.classList.remove('open');
    } else {
      search.classList.add('open');
    }
  }

  /**
   * if .mobile-toggle exists, link toggleMobileMenu function to click event
   */
  if (document.querySelector('.js-search')) {
    document
      .querySelector('.js-search-toggle')
      .addEventListener('click', toggleSearchState, false);
  }

  /**
   * scrollEvents()
   *
   * Collection of functions + process to run when user scrolls
   */
  function scrollEvents() {
    headerMonitor();
  }

  /**
   * onFirstPaint()
   *
   * Functions to run when the page first loads
   */
  function onFirstPaint() {
    sr.reveal('.load-hidden');

    scrollEvents();
  }
  onFirstPaint();

  document.addEventListener('scroll', () => {
    scrollEvents();
  });

  // If mobile toggle element exists, run toggleMobileMenu() when clicked
  if (document.querySelector('#mobile-toggle')) {
    document
      .getElementById('mobile-toggle')
      .addEventListener('click', toggleMobileMenu, false);
  }

  // If submenu exists, run toggleSubMenu() when submenu parent item is clicked
  if (document.querySelector('.menu-item-has-children')) {
    document
      .querySelector('.menu-item-has-children')
      .addEventListener('click', toggleSubMenu, false);
  }
});
