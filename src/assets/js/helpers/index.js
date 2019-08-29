import { TweenMax, Power2, Back } from 'gsap'

/**
 * doLineAnimation
 **/

const DEFAULT_LINE_PARAMS = {
  duration: 0.5,
  delay: 0.05,
  revert: false,
  y: 20
}

const doLineAnimation = (splitText, params = {}) => {
  const finalParams = { ...DEFAULT_LINE_PARAMS, ...params }
  if (params.direction = 'to') {
    return TweenMax.staggerFromTo(
      splitText.lines,
      finalParams.duration,
      { y: finalParams.y, opacity: 0 },
      { y: 0, opacity: 1, ease: Power2.easeOut },
      finalParams.delay,
      () => {
        if (finalParams.revert) {
          splitText.revert()
        }
      }
    )
  }
  return TweenMax.staggerFrom(
    splitText.lines,
    finalParams.duration,
    { y: finalParams.y, opacity: 0, ease: Power2.easeOut },
    finalParams.delay,
    () => {
      if (finalParams.revert) {
        splitText.revert()
      }
    }
  )
}

/**
 * reverseLineAnimation
 **/

const DEFAULT_REVERSE_LINE_PARAMS = {
  duration: 0.5,
  delay: 0.05,
  revert: false,
  y: 20
}

const reverseLineAnimation = (splitText, params = {}) => {
  const finalParams = { ...DEFAULT_REVERSE_LINE_PARAMS, ...params }
  return TweenMax.staggerTo(
    splitText.lines,
    finalParams.duration,
    { y: finalParams.y, opacity: 0, ease: Power2.easeOut },
    finalParams.delay,
    () => {
      if (finalParams.revert) {
        splitText.revert()
      }
    }
  )
}

/**
 * doCharAnimation
 **/

const DEFAULT_CHAR_PARAMS = {
  duration: 0.4,
  delay: 0.03,
  revert: false,
}

const doCharAnimation = (splitText, params = {}) => {
  const finalParams = { ...DEFAULT_CHAR_PARAMS, ...params }
  return TweenMax.staggerFromTo(
    splitText.chars,
    finalParams.duration,
    { scale: 0, rotation: '-20deg' },
    { scale: 1, rotation: 'Odeg', transformOrigin: '50% 50%' },
    finalParams.delay,
    () => {
      if (finalParams.revert) {
        splitText.revert()
      }
    }
  )
}

/**
 * doTranslateUp
 **/

const DEFAULT_TRANSLATE_PARAMS = {
  duration: 0.8,
  y: 25
}

const doTranslateUp = (selector, params = {}) => {
  const finalParams = { ...DEFAULT_TRANSLATE_PARAMS, ...params }
  return TweenMax.from(
    selector,
    finalParams.duration,
    { y: finalParams.y, ease: Power2.easeOut },
  )
}

/**
 * doFadeUp
 **/

const DEFAULT_FADE_PARAMS = {
  duration: 0.8,
  y: 25
}

const doFadeUp = (selector, params = {}) => {
  const finalParams = { ...DEFAULT_FADE_PARAMS, ...params }
  return TweenMax.from(
    selector,
    finalParams.duration,
    { y: finalParams.y, autoAlpha: 0, ease: Power2.easeOut },
  )
}

/**
 * splitText
 **/

const splitText = (selector, type) => {
  const finalType = type || 'lines, words, chars'
  return new SplitText(selector, {
    type: finalType,
    charsClass: 'splitTextChar'
  })
}

const getBodyClass = pageRawHTML => {
  let response = pageRawHTML.replace(
    /(<\/?)body( .+?)?>/gi,
    '$1notbody$2>',
    pageRawHTML
  )
  let pageDom = new DOMParser().parseFromString(response, 'text/html')
  return pageDom.querySelector('notbody').getAttribute('class')
}

const getParentAttribute = function (node, attr) {
  const parentAttribute = node.getAttribute(attr);
  if (parentAttribute) return parentAttribute;
  return getParentAttribute(node.parentNode, attr);
}

function lerp(v0, v1, t) {
  return v0*(1-t)+v1*t
}

function mapRange(value, low1, high1, low2, high2) {
  return low2 + (high2 - low2) * (value - low1) / (high1 - low1);
}

export {
  doCharAnimation,
  doFadeUp,
  doLineAnimation,
  doTranslateUp,
  getBodyClass,
  reverseLineAnimation,
  splitText,
  getParentAttribute,
  lerp,
  mapRange
}
