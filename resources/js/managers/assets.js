import { dispatch } from '../utils'

class Assets {
  constructor (items = {}) {
    this.items = {}
    this.loaded = []
    this.loading = []

    for (const item in items) {
      this.register(item, items[item])
    }
  }

  register (name, content = [], overwrite = true) {
    if (overwrite || !this.has(name)) {
      this.items[name] = content
    }
  }

  unregister (name) {
    if (this.has(name)) {
      delete this.items[name]
    }
  }

  has (name) {
    return Object.prototype.hasOwnProperty.call(this.items, name)
  }

  get (name) {
    if (!this.has(name)) {
      return []
    }

    const content = this.items[name]

    return Array.isArray(content) ? content : [content]
  }

  async load (asset) {
    if (this.loaded.includes(asset) || !this.has(asset)) {
      return Promise.resolve()
    }

    if (this.loading.includes(asset)) {
      return new Promise(resolve => window.addEventListener(`tallkit:asset.${asset}`, resolve))
    }

    this.loading.push(asset)

    const assets = this.get(asset)

    for (const content of assets) {
      if (content.endsWith('.css') || content.includes('.css?')) {
        await new Promise(resolve => {
          const link = document.createElement('link')
          link.setAttribute('rel', 'stylesheet')
          link.setAttribute('type', 'text/css')
          link.setAttribute('href', content)
          document.head.appendChild(link)
          link.addEventListener('load', resolve, false)
        })
      }

      if (content.endsWith('.js') || content.includes('.js?')) {
        await new Promise(resolve => {
          const script = document.createElement('script')
          script.setAttribute('src', content)
          document.body.appendChild(script)
          script.addEventListener('load', resolve, false)
        })
      }
    }

    this.loaded.push(asset)

    dispatch(`tallkit:asset.${asset}`, this)
  }
}

export default Assets
