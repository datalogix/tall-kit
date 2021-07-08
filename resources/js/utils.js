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
    lastOpenned: null,

    setup (openned = false) {
      this.openned = openned
    },

    open (storage = true) {
      this.openned = true
      if (storage) this.lastOpenned = this.openned
    },

    close (storage = true) {
      this.openned = false
      if (storage) this.lastOpenned = this.openned
    },

    toggle (storage = true) {
      if (this.openned) {
        this.close(storage)
        return
      }

      this.open(storage)
    },

    isOpened () {
      return this.openned === true
    },

    isClosed () {
      return this.openned === false
    }
  }
}

export function loadable () {
  return {
    loaded: false,

    start () {
      this.loaded = false
    },

    complete () {
      this.loaded = true
    },

    isLoading () {
      return this.loaded === false
    },

    isCompleted () {
      return this.loaded === true
    }
  }
}

export function loadImg (src, callback) {
  if (!src) return

  const img = new window.Image()

  if (callback) {
    img.onload = () => callback()
  }

  img.src = src
}
