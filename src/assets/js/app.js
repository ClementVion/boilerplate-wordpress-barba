import barba from '@barba/core'
import { transitions, transitionsMobile } from './transitions'
import { getBodyClass } from './helpers'
import components from './components/index.js'

import './vendors/modernizr.custom.js';

class App {
  constructor() {
    this.initComponents()

    if (window.innerWidth > BP_MOBILE) {
      this.initBarba()
    } else {
      this.initBarbaMobile()
    }
  }

  initComponents() {

    this.components = {}

    components.forEach(component => {
      this.elems = [...document.querySelectorAll(component.selector)]
      if (this.elems.length > 0) {
        this.components[component.namespace] = []
        this.elems.forEach(elem => {
          this.components[component.namespace].push(new component.class(elem))
        })
      }
    })
  }

  destroyComponents() {
    let t = setInterval(null, 0)
    while (t--) {
      clearInterval(t)
    }

    for (var component in this.components) {
      if (this.components.hasOwnProperty(component)) {
        this.components[component].forEach(comp => {
          if (typeof comp.onDestroy == 'function') {
            comp.onDestroy()
          }
        })
        this.components[component].length = 0
        delete this.components[component]
      }
    }
  }

  initBarbaMobile() {
    barba.hooks.after(() => {
      this.destroyComponents()
      this.initComponents()
    })

    barba.hooks.beforeEnter((data) => {
      document.querySelector('body').scrollTop = 0;
      window.scrollTo(0, 0);
      document.body.setAttribute('class', `${getBodyClass(data.next.html)} js-loaded-once`)
    })

    barba.init({
      cacheIgnore: true,
      transitions: transitionsMobile
    })
  }

  initBarba() {
    barba.hooks.after(() => {
      this.destroyComponents()
      this.initComponents()
    })

    barba.hooks.beforeEnter((data) => {
      document.querySelector('body').scrollTop = 0;
      window.scrollTo(0, 0)
      document.body.setAttribute('class', `${getBodyClass(data.next.html)} js-loaded-once`)
    })

    barba.init({
      cacheIgnore: true,
      transitions: transitions,
      debug: true
    })
  }
}

new App();