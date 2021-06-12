export function detectAssets (el, attributeKey) {
  const assets = []

  if (el.querySelectorAll) {
    for (const element of el.querySelectorAll(`[${attributeKey}]`)) {
      for (const asset of element.getAttribute(attributeKey).split(',')) {
        if (asset.trim() && !assets.includes(asset)) {
          assets.push(asset)
        }
      }
    }
  }

  return assets
}

export function loadComponentAssets (asset) {
  if (window.tallkit && window.tallkit.assets) {
    return window.tallkit.assets.load(asset)
  }

  return Promise.resolve()
}

export function dispatch (eventName) {
  const event = document.createEvent('Events')

  event.initEvent(eventName, true, true)

  return dispatchInputEvent(document, event)
}

export function dispatchInputEvent (element, event = null) {
  if (!event) event = new window.Event('input')
  if (element) element.dispatchEvent(event)

  return event
}

export function updateInputValue (element, value) {
  element.value = value

  dispatchInputEvent(element)
}

export function toggleable () {
  return {
    openned: false,

    open () {
      this.openned = true
    },

    close () {
      this.openned = false
    },

    toggle () {
      this.openned = !this.openned
    }
  }
}
