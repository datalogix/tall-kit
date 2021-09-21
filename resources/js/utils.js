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
  return new Promise((resolve, reject) => {
    if (!window.tallkit || !window.tallkit.assets) {
      reject(new Error('TALLKit is not defined.'))
    }

    window.tallkit.assets.load(asset)

    window.addEventListener(`tallkit:asset.${asset}`, resolve)
  })
}

export function dispatch (name, detail = {}) {
  // use $el for Alpine 2 https://github.com/alpinejs/alpine/blob/2.x/README.pt.md#el
  // use $root for Alpine 3 https://github.com/alpinejs/alpine/pull/2011
  const element = (detail.$root || detail.$el || document)

  const event = new window.CustomEvent(name, {
    detail,
    bubbles: true,
    composed: true,
    cancelable: true
  })

  element.dispatchEvent(event)
}

export function dispatchInputEvent (element) {
  element.dispatchEvent(new window.Event('input'))
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
      if (Number.isInteger(openned)) {
        return timeout(() => this.open(), openned)
      }

      this.openned = Boolean(openned)
    },

    open (storage = true) {
      this.openned = true
      if (storage) this.lastOpenned = this.openned

      dispatch('open', this)
    },

    close (storage = true) {
      this.openned = false
      if (storage) this.lastOpenned = this.openned

      dispatch('close', this)
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
    empty: null,
    loaded: null,
    error: null,

    reset () {
      this.empty = null
      this.loaded = null
      this.error = null

      dispatch('reset', this)
    },

    clear () {
      this.reset()
      this.empty = true

      dispatch('clear', this)
    },

    start () {
      this.reset()
      this.loaded = false

      dispatch('start', this)
    },

    complete () {
      this.reset()
      this.loaded = true

      dispatch('complete', this)
    },

    fail (error) {
      this.reset()
      this.error = error

      dispatch('fail', this)
    },

    isEmpty () {
      return this.empty === true
    },

    isLoading () {
      return this.loaded === false
    },

    isCompleted () {
      return this.loaded === true
    },

    isFailed () {
      return this.error !== null
    }
  }
}

export function loadImg (src, ref = null) {
  return new Promise((resolve, reject) => {
    const img = new window.Image()
    img.onload = (event) => {
      if (ref) ref.src = img.src
      resolve(event, img)
    }
    img.onerror = (error) => {
      reject(error, img)
    }
    img.src = src
  })
}

export function getWindowSize () {
  return window.innerWidth
}

export const getBreakpointSize = (breakpoint) => {
  const breakpoints = {
    sm: 640,
    md: 768,
    lg: 1024,
    xl: 1280,
    '2xl': 1536
  }

  if (Number.isInteger(breakpoint)) {
    return breakpoint
  }

  if (breakpoints[breakpoint] === undefined) {
    throw Error('Undefined breakpoint: ' + breakpoint)
  }

  return breakpoints[breakpoint]
}

export function screen (breakpoint) {
  return getBreakpointSize(breakpoint) <= getWindowSize()
}

export function storagable (storageName = null) {
  return {
    storageName,

    hasStorageName () {
      return !!this.storageName
    },

    getStorageName () {
      return this.storageName
    },

    setStorageName (name) {
      this.storageName = name
    },

    hasLocalStorage () {
      return !!window.localStorage
    },

    getLocalStorage () {
      if (!this.hasLocalStorage() || !this.hasStorageName()) {
        return null
      }

      return window.localStorage.getItem(this.getStorageName())
    },

    setLocalStorage (value) {
      if (!this.hasLocalStorage() || !this.hasStorageName()) {
        return
      }

      window.localStorage.setItem(this.getStorageName(), value)
    }
  }
}

export function timeout (callback, milliseconds = 500) {
  let timeoutId = null
  clearTimeout(timeoutId)

  timeoutId = setTimeout(callback, parseInt(milliseconds, 0))
  return timeoutId
}

export function interval (callback, milliseconds = 500) {
  let intervalId = null
  clearInterval(intervalId)

  intervalId = setInterval(callback, parseInt(milliseconds, 0))
  return intervalId
}

export function onLivewireEvent (eventName, callback) {
  if (!window.Livewire) {
    console.warn('Livewire not found! See https://laravel-livewire.com/docs/installation')
    return
  }

  window.Livewire.on(eventName, callback)
}

export function cookieable (cookieName = null, cookieExpires = null) {
  return {
    cookieName,
    cookieExpires,

    hasCookieName () {
      return !!this.cookieName
    },

    getCookieName () {
      return this.cookieName
    },

    setCookieName (name) {
      this.cookieName = name
    },

    getCookieExpires () {
      return parseInt(this.cookieExpires) || 1
    },

    setCookieExpires (expires) {
      this.cookieExpires = expires
    },

    hasCookie () {
      return !!document.cookie
    },

    getCookie () {
      if (!this.hasCookie() || !this.hasCookieName()) {
        return null
      }

      const name = this.getCookieName() + '='
      const ca = document.cookie.split(';')

      for (let i = 0; i < ca.length; i++) {
        let c = ca[i]
        while (c.charAt(0) === ' ') {
          c = c.substring(1)
        }
        if (c.indexOf(name) === 0) {
          return c.substring(name.length, c.length)
        }
      }

      return null
    },

    setCookie (value, days = null) {
      if (!this.hasCookie() || !this.hasCookieName()) {
        return
      }

      const expires = new Date()
      expires.setTime(expires.getTime() + ((days || this.getCookieExpires()) * 24 * 60 * 60 * 1000))
      document.cookie = `${this.getCookieName()}=${value};expires=${expires.toUTCString()};path=/`
    }
  }
}
