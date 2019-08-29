import { TweenMax, Power3, TimelineMax, Power4 } from 'gsap/all';

let transitions = []
let transitionsMobile = [];

const defaultTransition = {
  name: 'default',
  beforeLeave(data) {
    var done = this.async();
    const tl = new TimelineMax({
      paused: true,
      onComplete: done,
    });
    tl.to(data.current.container, 0.8, {
      opacity: 0,
      ease: Power4.easeInOut
    });
    tl.play();
  },
  afterEnter(data) {
    var done = this.async();
    const tl = new TimelineMax({
      paused: true,
      // onComplete: done,
    });
    data.current.container.style.display = 'none';
    data.next.container.style.opacity = '0';
    tl.to(data.next.container, 0.8, {
      opacity: 1,
      ease: Power4.easeInOut
    });
    tl.play();
    done();
  }
}

transitions = [
  defaultTransition,
]

transitionsMobile = [
  defaultTransition
]


export { transitions, transitionsMobile }