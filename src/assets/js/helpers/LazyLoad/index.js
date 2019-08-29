class LazyLoad {
  constructor() {
    this.$ = {
      images: [],
    }
  }

  load(container) {
    this.$.images = container ? container.querySelectorAll('.lazy') : document.querySelectorAll('.lazy');
    for (let i = 0; i < this.$.images.length; i += 1) {
      const elm = this.$.images[i];
      const src = elm.getAttribute('data-src');
      const type = elm.getAttribute('data-type');
      const img = new Image();
      img.src = src;
      img.addEventListener('load', () => {
        if (type === 'bg') elm.style.backgroundImage = `url(${src})`;
        else if (type === 'img') elm.src = src;
        else console.error('There is no data-type specified on the lazy element');
        elm.classList.add('loaded');
      })
    }
  }
}

export default LazyLoad;
